<?php

App::uses('AppController', 'Controller');

/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 * @property SequirityComponent $Sequirity
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PostsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function isAuthorized($user) {
        // action配列の中に以下のアクションが含まれていたら
        if (in_array($this->action, ['index', 'view', 'add', 'delete'])) {
//            trueを返す(roleがadminでもuserでもそのactionにアクセスできる)
            return true;
        }
        //それ以外のactionの場合は､管理者adminだけがアクセスできる
        if ($user['role'] === 'admin') {
            return true;
        }

        return false;
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Post->recursive = 0;
        $this->set('posts', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Post->exists($id)) {
            throw new NotFoundException(__('Invalid post'));
        }
        $options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
        $this->set('post', $this->Post->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        //フォームが送信されたら
        if ($this->request->is('post')) {
            //空にして
            $this->Post->create();

            //正しくデータが保存されたら
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('お知らせが新規追加されました.');
                return $this->redirect(array('action' => 'index'));
            } else {
                //正しくデータが保存されなかったら
            }
            $this->Flash->danger('お知らせが正常に保存されませんでした､再度追加をしてください.');
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {

        //PostモデルのDBにそのidが存在しなかったら
        if (!$this->Post->exists($id)) {
            throw new NotFoundException(__('Invalid post'));
        }
        //PostモデルのDBにそのidが存在して
        //フォームがpostかputで送信されて
        if ($this->request->is(array('post', 'put'))) {
            //$idをidに代入します
            $this->Post->id = $id;

            //フォームからの送信データがDBに保存されたら
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('編集内容は正常に保存されました');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->danger('編集内容は保存されませんでした｡再度編集しなおしてください');
            }
            //GETで来たときは
        } else {
            $options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
            $this->request->data = $this->Post->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Post->delete()) {
            $this->Flash->success('お知らせが削除されました｡');
        } else {
            $this->Flash->danger(__('お知らせは削除されませんでした｡もう一度実行してください｡'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
