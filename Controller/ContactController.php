<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class ContactController extends AppController {

    /**
     * Components
     *
     * @var array
     */
     public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    
    public $components = array('Paginator', 'Session',

      
    );


    

    public function isAuthorized($user) {
        // action配列の中に以下のアクションが含まれていたら
        if (in_array($this->action, ['contact', 'sendContact'])) {
//            trueを返す(roleがadminでもuserでもそのactionにアクセスできる)
            return true;
        }
        //それ以外のactionの場合は､管理者adminだけがアクセスできる
        if ($user['role'] === 'admin') {
            return true;
        }

        return false;
    }

    public function contact() {
        echo'check';
        exit;
        if (!$this->request->is('post') || !$this->request->data) {
            return;
        }

        $this->Contact->set($this->request->data);

        //フォームから受け取ったデータをバリデーション
        if (!$this->Contact->validates()) {
            $this->Flash->danger('入力内容に不備があります。');
            return;
        }

        switch ($this->request->data['confirm']) {
            case 'confirm':
                $this->render('contact_confirm');
                break;
            case 'send':
                if ($this->sendContact($this->request->data['Contact'])) {
                    $this->Flash->success('お問い合わせを受け付けました。');
                    $this->redirect('/');
                } else {
                    $this->Flash->danger('エラーが発生しました。');
                }
                break;
        }
    }

    private function sendContact($content) {
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('contact');

        return $email
                        ->from(array($content['email'] => $content['subject']))
                        ->viewVars($content)
                        ->template('contact', 'contact')
                        ->send();
    }

}
