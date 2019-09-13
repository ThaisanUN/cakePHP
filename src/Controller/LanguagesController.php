<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Controller\Controller;
use Cake\View\Helper\SessionHelper;
use Cake\Utility\Security;
use Cake\Core\Configure;
use Cake\Event\Event;
use AppControlller;
use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time;
use Cake\Datasource\EntityInterface;
use Cake\I18n\I18n;
class LanguagesController extends AppController
{
    public function index()
    {   
        $language = $this->paginate($this->Languages);
    $this->set(compact('language'));
    }
public function Language($id=null){
    $language = $this->Languages->get($id, [
        'contain' => []
        ]);
                        if ($this->request->is(['patch', 'post', 'put'])) {
                            $language = $this->Languages->patchEntity($language, $this->request->getData());
                            $lang  = $_POST["language"];
                            if($lang != null && in_array($lang, ['en_US','km_KH','zh_HK'])){
                                
                                if($lang == 'en_US'){
                                    $language->language_id = 1;
                                }elseif ($lang == "zh_HK") {
                                    $language->language_id = 2;
                                }else {
                                    $language->language_id = 3;
                               }
                        if ($this->Languages->save($language)) { 
                        $this->request->session()->write('Config.language',$lang);
                        $this->Flash->success(__('The language has been saved.'));
                        return $this->redirect($this->referer());
                    }else{
                    $this->Flash->error(__('The language could not be saved. Please, try again.'));
                }
                    }else{
                                $this->request->session()->write('Config.language',I18n::locale());
                                return $this->redirect($this->referer());
                    }
                    }
                    $this->set(compact('language'));
                    $this->set(compact('language',[
                        "controller"=>"Description","action"=>"add"
                    ]));
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
}
