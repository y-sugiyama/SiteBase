<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Contact extends AppModel
{
    public $useTable = false;    
    public $_schema = array(
        'name' => array('type' => 'string', 'length' => 255),
        'email' => array('type' => 'string', 'length' => 255),
        'subject' => array('type' => 'string', 'length' => 255),
        'body' => array('type' => 'text'),
    );
 
    public $validate = array(
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        'email' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'メールアドレス以外が入力されています。',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        'subject' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        'body' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 3000),
                'message' => '3000文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
    );
}

