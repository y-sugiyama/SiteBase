<?php

App::uses('AppModel', 'Model');

/**
 * Post Model
 *
 */
class Post extends AppModel {

    public $validate = array(
        //フィールド名
        'title' => array(
            //バリデーションの名前
            'Blank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                //データ配列にkey(この場合はtitle)が存在することを必要とする
                'required' => 'true',
                'message' => 'タイトルが入力されていません',
            ),
        ),
        //フィールド名
        'body' => array(
            //バリデーションの名前
            'notBlank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                'required' => 'true',
                'message' => '内容が入力されていません',
            ),
        ),
    );

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';

}
