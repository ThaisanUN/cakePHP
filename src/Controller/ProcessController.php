<?php
namespace App\Controller;
use Cake\Utility\Security;
use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Datasource\EntityInterface;
use Cake\Core\Configure;
use Cake\I18n\I18n;
use Cake\Controller\Controller;
use Cake\View\Helper\SessionHelper;
use Cake\Event\Event;

class ProcessController extends AppController
{
    public function index()
{   
    $process = $this->paginate($this->Process);
$this->set(compact('process'));
}
public function view($id = null)
{
    $proces = $this->Process->get($id);
    $DescriptionsTable = TableRegistry::get('Descriptions');
                        $data = $DescriptionsTable->find()->toArray();
                    //    dump($data);
                    // exit();
                        $this->set(compact('data'));
    $this->set('proces', $proces);
}
public function add()
{
    $proces = $this->Process->newEntity();
        if ($this->request->is('post')) {
        $proces = $this->Process->patchEntity($proces, $this->request->data); 
    if ($this->Process->save($proces)) {
    $this->Flash->success(__('The proces has been saved and Please add more information.'));
        return $this->redirect(['controller'=>"Descriptions",'action' => 'add']);
}
    $this->Flash->error(__('The proces could not be saved. Please, try again.'));
 }
 $position = TableRegistry::get('Position')->find()->toArray();
$position_id = [];
foreach($position as $positions){
    $position_id[]=['value'=>$positions->id,'text'=>$positions->name];
}
 $lang = TableRegistry::get('UserLanguage')->find()->toArray();
$descriptions = $this->Process->Descriptions->find('list', ['limit' => 200]);
 $option = [];
 foreach($lang as $langs){
     $option[] = ['value'=> $langs->id, 'text'=>$langs->label." > ".$langs->id];
 }
 $this->set(compact('proces','option'));
 $this->set(compact('description','position_id'));
}
public function edit($id = null)
{
    $proces = $this->Process->get($id, [
    'contain' => []
    ]);
   
    if ($this->request->is(['patch', 'post', 'put'])) {
        $proces = $this->Process->patchEntity($proces, $this->request->getData());
        //  dump($proces);
        //  exit();
    if ($this->Process->save($proces)) {
        
    $this->Flash->success(__('The proces has been saved.'));
    return $this->redirect(['controller'=>"Descriptions",'action' => 'index']);
}
$this->Flash->error(__('The proces could not be saved. Please, try again.'));
}
$lang = TableRegistry::get('UserLanguage')->find()->toArray();
$option = [];
 foreach($lang as $langs){
     $option[] = ['value'=> $langs->id, 'text'=>$langs->label." > ".$langs->id];
 }
$this->set(compact('proces'));
$this->set(compact('proces','option'));
}
    //delete
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $proces = $this->Process->get($id);

        if ($this->Process->delete($proces)) {
        $this->Flash->success(__('The proces has been deleted.'));
    } else {
        $this->Flash->error(__('The proces could not be deleted. Please, try again.'));
    }
    return $this->redirect($this->referer());
}
    //download file
    public function download($id){
            $proces = $this->Process->get($id);
            $path = $proces->file;
                        return $this->redirect('/'.$path);
            return $this->response->withDownload($proces->process_name);
    }
    public function Language($id=null){
        $proces = $this->Process->get($id, [
            'contain' => []
            ]);
           
            if ($this->request->is(['patch', 'post', 'put'])) {
                $proces = $this->Process->patchEntity($proces, $this->request->getData());
                $language  = $_POST["process_language_id"];
                // dump($language);
                // exit();
                if($language != null && in_array($language, ['en_US','km_KH','zh_HK'])){
                    if($language == 'en_US'){
                        $proces->process_language_id = 1;
                    }elseif ($language == "zh_HK") {
                        $proces->process_language_id = 2;
                    }else {
                        $proces->process_language_id = 3;
                   }
            if ($this->Process->save($proces)) { 
            $this->request->session()->write('Config.language',$language);
            $this->Flash->success(__('The proces has been saved.'));
            return $this->redirect($this->referer());
        }else{
        $this->Flash->error(__('The proces could not be saved. Please, try again.'));
    }
        }else{
                    $this->request->session()->write('Config.language',I18n::locale());
                    return $this->redirect($this->referer());
        }
        }
        $this->set(compact('proces'));
    }
public function beforeFilter(Event $event){
    if ( $this->request->session()->check('Config.language')) {
        I18n::setLocale($this ->request->session()->read('Config.language'));
    }else{
        $this->request->session()->write('Config.language',I18n::locale());
    }
}
    function language_db_field(){
        $lang=$this->getRequest()->getSession()->read('Users.language');
        if ($lang !== 'en_us'){
            $entity = 'name_'.strtolower($lang);
        }else{
            $entity = 'name';
        }
        return $entity;
    }

    public function exportdata(){
        $DescriptionTable = TableRegistry::get('Descriptions');
        $description = $DescriptionTable->find()->toArray() ;

      
        // dump($description);
        // exit();
        $datas = ' ';
        
        $proces = $this->Process->find('all')->toArray();
        $i = 1;
        foreach ($proces as $process) {
            $datas .= '<table cellspacing = "1" cellpadding = "4" style = "border:1px;text-align:center;"border ="1" width = "100%">';
            $datas .= '<tr>
            <th></th>
                        <th style = "text-align:center;">'.__('S.NO').' </th>
                        <th style = "text-align:center;">'.__('Main Process').' </th>
                        <th style = "text-align:center;">'.__('Sub Process').'</th>
                        <th style = "text-align:center;">'.__('Sub Sub Process').'</th>
                        </tr>';  
            $process_name = $process['process_name'];
            $sub_name = $process['sub_name']; 
            $subsub_name = $process['subsub_name'];
            $datas .= '<tr>
            <td></td>
            <td style = "text-align:center;">'.$i++.'</td>
            <td style = "text-align:center;">'.$process_name.' </td>
            <td style = "text-align:center;">'.$sub_name.' </td>
            <td style = "text-align:center;">'.$subsub_name.'</td>
            </tr>';
            $datas .='</table>';
                 $datas .= '<table>';
            foreach ($description as $descriptions){
                $k  = 1;
            $name = $descriptions['name'];
            $name_zh_hk = $descriptions["name_zh_hk"];
            $name_km_kh = $descriptions["name_km_kh"];
            $title = $descriptions['title'];
            $create_date= $descriptions['create_date'];
            $subject= $descriptions['subjects'];
            $tool= $descriptions['tools'];
            $staff= $descriptions['staffs_id'];
      
            if ($descriptions->process_id  == $process->id){
            $datas .= '<tr>
            <td style = "text-align:center;">'.($i-1).".".($k+1).'</td>
            <td style = "text-align:center;">'.$title.'</td>
            <td style = "text-align:center;">'.$subject.'</td>
            <td style = "text-align:center;">'.$tool.'</td>
            <td style = "text-align:center;">'.$staff.'</td>
            <td style = "text-align:center;">'.$name.'</td>
            <td style = "text-align:center;">'.$name_km_kh.'</td>
            <td style = "text-align:center;">'.$name_zh_hk.'</td>
            <td style = "text-align:center;">'.$create_date.'</td>
            </tr>';
            }
        } 
        // dump($staff);
        // exit();
    } $datas .= '</table>';
        header('Content-Type : application/force-dowload');
        header('Content-disposition:attachment;filename = report.xls');
        header('Pragma : ');
        header('Cache-Control: ');
        echo $datas;
        die;
    }
}
