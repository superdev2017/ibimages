<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('File');
        $this->loadComponent('Option');
        $this->loadComponent('Util');
        $this->loadComponent('Paginator');
        $this->loadComponent('Fileupload');
        $this->loadComponent('JpegMetaReader');


        \Cake\I18n\Time::setJsonEncodeFormat('yyyy-MM-dd HH:mm:ss');  // For any mutable DateTime
        \Cake\I18n\FrozenTime::setJsonEncodeFormat('yyyy-MM-dd HH:mm:ss');  // For any immutable DateTime
        \Cake\I18n\Date::setJsonEncodeFormat('yyyy-MM-dd HH:mm:ss');  // For any mutable Date
        \Cake\I18n\FrozenDate::setJsonEncodeFormat('yyyy-MM-dd HH:mm:ss');  // For any immutable Date

        $this->loadComponent('Auth', [
            'loginAction' => '/',
            'logoutRedirect' => ['controller' => 'Auth', 'action' => 'login'],
            'authorize' => ['Controller'],
            'checkAuthIn' => 'Controller.initialize'
        ]);

        $this->Auth->setConfig('authenticate', [
            'Form'
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    public function isAuthorized($user) {

        // Here is where we should verify the role and give access based on role
        if($user)
            return true;
        return true;
    }


    public function uploadImage($upload_name, $form_name, $uploadPath, $baseUrl) {
        $fuConfig['upload_path']    = $uploadPath;
        $fuConfig['allowed_types']  = ['jpg', 'png', 'jpeg'];
        $fuConfig['max_size']       = 0;
        $this->Fileupload->init($fuConfig);


        // Default Upload images
        if(!empty($this->getRequest()->data[$upload_name]['name'])) {
            if (!$this->Fileupload->upload($upload_name)){
                $fError = $this->Fileupload->errors();
                if($fError[0] == 'upload_invalid_filetype'){
                    $this->getRequest()->data[$upload_name] = ['_error'=>'ExtNotAllowed'];
                } else {
                    $this->getRequest()->data[$upload_name] = ['_error'=>'FileNotUpload'];
                }

            } else {
                $this->getRequest()->data[$form_name] = $baseUrl . '/' . $this->Fileupload->output('file_name');
            }
        } else {
            unset($this->getRequest()->data[$upload_name]);
        }
    }

}
