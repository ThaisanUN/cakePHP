<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Controller\Controller;
use Cake\View\Helper\SessionHelper;
use Cake\Utility\Security;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\I18n\I18n;

class AppController extends Controller
{

   
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $lang=$this->getRequest()->getSession()->read('Users.language');

        if(isset($lang)){
            I18n::setLocale($lang);
        }
    }

    public function changeLanguage($language=null){
       
        if($language != null && in_array($language, ['en_US','km_KH','zh_HK'])){
            $proces = TableRegistry::get('Process')->find()->toArray();
            if ($this->request->is(['patch', 'post', 'put'])) {
                $proces = $this->Process->patchEntity($proces, $this->request->getData());
          
            if($language == 'en_US'){
                $proces->process_language_id = 1;
            }elseif ($language == "km_KH") {
                $proces->process_language_id = 3;
            }else {
                $proces->process_language_id = 2;
            }
            if ($this->Process->save($proces)) {
                    $this->Flash->success(__('The proces has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
        $this->request->session()->write('Config.language',$language); 
        //     dump($this->request->session()->write('Config.language',$language));
        // exit();
            return $this->redirect($this->referer());
        }else{
            $this->request->session()->write('Config.language',I18n::locale());
            return $this->redirect($this->referer());
        }
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


    function translate($chk){
        $lang=$this->getRequest()->getSession()->read('Users.language');


        if($lang !== 'en_us'){
            $name ='name_'.strtolower($lang);
            if($chk->$name !== null){
                $chk->name= $chk->$name;
            }else if($chk->name == null ){

               foreach ($chk as $key =>$value){
                   if($chk[$key] !== null){
                       $chk->name = $value;
                   }
               }
            }
        }else if($lang === 'en_us'){
            $chk->name = $chk->name;
        }else{
            if($chk->name_zh_hk !=null){
                $chk->name = $chk->name_zh_hk;
            }else if($chk->name_kh_KH !=null){
                $chk->name = $chk->name_kh_KH;
            }
        }
        return $chk->name;
    }
    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
}
