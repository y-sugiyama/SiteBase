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
        //このアクションではfront.ctpのレイアウトを使います
        $this->layout = 'front';
    }

    public $components = array('Paginator'
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

        if ($this->request->is('post')) {

            $this->Contact->set($this->request->data);

            //フォームから受け取ったデータをバリデーション
            if ($this->Contact->validates()) {

                $this->Session->write('Contact', $this->request->data['Contact']);
                $this->redirect(array('action' => 'confirm'));
            }
            $this->Flash->danger('入力内容に不備があります。');
        }
    }

    public function confirm() {

        $contact = $this->Session->read('Contact');

        if ($this->request->is('post')) {
            //Sessionを渡す
            if ($this->sendContact($contact)) {
                $this->Flash->success('お問い合わせを受け付けました。');
                $this->redirect('/contact/finished');
                //sessionを破棄する
                $this->Session->delete('Contact');
            } else {
                $this->Flash->danger('エラーが発生しました。');
            }
        }
        $this->set('contact', $contact);
        //もしsessionがあればrequest->dataにsetする
        if(isset($contact)){
            $this->set($this->request->data[$contact]);
        }
    }

    public function finished() {
        
    }

    private function sendContact($content) {
        //オートローダがクラスを発見できるよう､場所を伝える
        App::uses('CakeEmail', 'Network/Email');
        //CakeEmailクラスでnewしてCakeEmailのコンストラクタでcontactを指定して設定をロード
        $email = new CakeEmail('contact');


        //CakeEmailは属性の代わりにセッターメソッドを使用する
        //すべてのセッターメソッドはクラスのインスタンスを返す
        return $email
                        ->from(array($content['email'] => $content['subject']))
                        //ビューで使う変数をセット
                        ->viewVars($content)
                        //メール分で以下のテンプレートを使用
                        ->template('contact', 'contact')
                        ->send();
    }

}
