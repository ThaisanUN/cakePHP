<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\Utility\Security;
use Cake\ORM\Table;
use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Datasource\EntityInterface;
use Cake\Core\Configure;
use Cake\I18n\I18n;
use Cake\Utility\Text;

class DescriptionsController extends AppController
{
    public function index()
        {  
            $description = $this->paginate($this->Descriptions);
            $ProcessTable = TableRegistry::get('Process');
            $data = $ProcessTable->find();
            foreach ($data->toArray() as $datas){
                $datas->sub_process;
    }
    $language = TableRegistry::get('Languages')->find()->toArray();
    $language_id = [];
    foreach ($language as $languages) {
                    $language_id = $languages->language_id;
    }
    $PositionTable = TableRegistry::get('Position');
    $position   =$PositionTable->find()->toArray();
    $this->set(compact('description','position'));
    $this->set(compact('description','language_id'));
    $this->set(compact('data'));
    $this->set(compact('description'));
}
    public function view($id = null)
    {
         $description = $this->Descriptions->get($id);
         $this->set('description', $description);
    }
public function add(){
       $description = $this->Descriptions->newEntity(); 
    if ($this->request->is('post')) {
         $description = $this->Descriptions->patchEntity($description, $this->request->getData()); 
        if ($this->Descriptions->save($description)) {
            $this->Flash->success(__('The content has been saved.'));
            return $this->redirect(['action' => 'index']);
}
$this->Flash->error(__('The content could not be saved. Please, try again.'));
}
 $position = TableRegistry::get('Position')->find()->toArray();
 $position_id = [];
 foreach($position as $positions){
         $position_id[]=['id'=>$positions->id,'name'=>$positions->name];
 }
$proces = TableRegistry::get('Process')->find()->toArray();
$process_id = [];
foreach($proces as $process){
     $process_id[] = ['value'=> $process->id, 'text'=>$process->process_name.' ->'.$process->sub_name.' -> '.$process->subsub_name];
 }
 $language = TableRegistry::get('Languages');
 $lang =$language->find()->toArray();
$language_id = [];
foreach ($lang as $languages) {
    $language_id = $languages->language_id;
} 
$profile = TableRegistry::get('UserProfiles')->find()->toArray();
 $user_profiles = [];
 foreach($profile as $profiles){
         $user_profiles[]=['value'=>$profiles->id,'text'=>$profiles->name];
 }
 $this->set(compact('description','position_id'));
 $this->set(compact('description','process_id'));
 $this->set(compact('description','user_profiles'));
 $this->set(compact('description','language_id'));
}
public function edit($id = null)
{
    $description = $this->Descriptions->get($id,['contain' => []]);
    if ($this->request->is(['patch', 'post', 'put'])) {
        $description = $this->Descriptions->patchEntity($description, $this->request->getData()); 
    if ($this->Descriptions->save($description)) {
    $this->Flash->success(__('The content has been saved.'));
    return $this->redirect(['action' => 'index']);
}
$this->Flash->error(__('The content could not be saved. Please, try again.'));
}
$position = TableRegistry::get('Position')->find()->toArray();
$position_id = [];
foreach($position as $positions){
        $position_id[]=['value'=>$positions->id,'text'=>$positions->name];
}
$proces = TableRegistry::get('Process')->find()->toArray();
$process_id = [];
foreach($proces as $process){
         $process_id[] = ['value'=> $process->id, 'text'=>$process->process_name.'  > '.$process->sub_name.'  >  '.$process->subsub_name.'  >  '.$process->id];
 }
 $language = TableRegistry::get('Languages')->find()->toArray();
$language_id = [];
foreach ($language as $languages) {
    $language_id = $languages->language_id;
}
$this->set(compact('description','language_id'));
 $this->set(compact('description','process_id'));
 $this->set(compact('description','position_id'));
}
public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $description = $this->Descriptions->get($id);
        if ($this->Descriptions->delete($description)) {
            $this->Flash->success(__('The proces has been deleted.'));
    } else {
        $this->Flash->error(__('The proces could not be deleted. Please, try again.'));
}
   return $this->redirect(['action' => 'index']);
}
// public function exportdata(){
//                     $datas = ' ';
//                     $datas = '<table cellspacing = "2" cellpadding = "5" style = "border:2px;text-align:center;"border ="1" width = "60%"';
//                     $datas .= '<tr>
//                                     <th style = "text-align:center;">S.NO </th>
//                                     <th style = "text-align:center;">Main Process </th>
//                                     <th style = "text-align:center;">Sub Process</th>
//                                     <th style = "text-align:center;">Sub Sub Process</th>
//                                     <th style = "text-align:center;">Titile</th>
//                                     <th style = "text-align:center;">Subject</th>
//                                     <th style = "text-align:center;">Create Date</th>
//                                     </tr>';
//                     $description = $this->Descriptions->find('all')->toArray();
                   
//                     $i = 1;
//                     foreach ($description as $descriptions) {
//                         $descriptions_name = $descriptions['name'];
//                         $sub_name = $descriptions['sub_name'];
//                         $title = $descriptions['title'];
//                         $subsub_name = $descriptions['subsub_name'];
//                         $create_date= $descriptions['create_date'];
//                         $subject= $descriptions['subject'];
//                         $datas .= '<tr>
//                         <td style = "text-align:center;">'.$i++.' </td>
//                         <td style = "text-align:center;">'.$descriptions_name.' </td>
//                         <td style = "text-align:center;">'.$sub_name.' </td>
//                         <td style = "text-align:center;">'.$subsub_name.'</td>
//                         <td style = "text-align:center;">'.$title.'</td>
//                         <td style = "text-align:center;">'.$subject.'</td>
//                         <td style = "text-align:center;">'.$create_date.'</td>
//                         </tr>';
//                     }  $datas .= '</table>';
                    
//                     header('Content-Type : application/force-dowload');
//                     header('Content-disposition:attachment;filename = report.xls');
//                     header('Pragma : ');
//                     header('Cache-Control: ');
//                     echo $datas;
//                     die;
//                 }
}
