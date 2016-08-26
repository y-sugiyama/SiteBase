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
        
        //再編集で戻ってきたとき(getできた時)
        //Sessionを読み込んで変数contactにいれる
        $contact = $this->Session->read('Contact');
        //変数contactがNULLでなければ
        if($contact!==NULL){
            //変数contactの値をフォームに代入する
            $this->request->data['Contact'] = $contact;
        }

        //postでフォームが送信されたら
        if ($this->request->is('post')) {
            
            //フォームに入力された値をセットして
            $this->Contact->set($this->request->data);

            //フォームから受け取ったデータをバリデーション
            if ($this->Contact->validates()) {
                  
                //検証がOkならSessionへフォームに入力されたデータを書き込む
                $this->Session->write('Contact', $this->request->data['Contact']);
                $this->redirect(array('action' => 'confirm'));
            }
            $this->Flash->danger('入力内容に不備があります。');
        }
    }

    public function confirm() {
          
        //Sessionを読み込んで変数contactにいれる(getできた時)
        $contact = $this->Session->read('Contact');
        //getできたら値を$contactにセットする
        $this->set('contact', $contact);
      

        if ($this->request->is('post')) {
            //Sessionを渡す
            if ($this->sendContact($contact)) {
                $this->Flash->success('お問い合わせを受け付けました。');
                    //sessionを破棄する
                $this->Session->delete('Contact');
                //それからリダイレクトする
                $this->redirect(array('action' => 'finished'));
            
            } else {
               
                $this->Flash->danger('エラーが発生しました。');
            }
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
