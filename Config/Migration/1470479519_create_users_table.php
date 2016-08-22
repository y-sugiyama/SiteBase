<?php

App::uses('User', 'Model');

class CreateUsersTable extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     */
    public $description = 'create_users_table';

    /**
     * Actions to be performed
     *
     * @var array $migration
     */
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'users' => array(
                    'id' => array(
                        'type' => 'integer',
                        'null' => false,
                        'default' => null,
                        'length' => 36,
                        'key' => 'primary',
                    ),
                    'username' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => null
                    ),
                    'password' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => null
                    ),
                    'role' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => null
                    ),
                    'email' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => NULL,
                        'key' => 'index'
                    ),
                ),
            ),
            'create_table' => array(
                'posts' => array(
                    'id' => array(
                        'type' => 'integer',
                        'null' => false,
                        'default' => null,
                        'length' => 36,
                        'key' => 'primary',
                    ),
                    'title' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => null
                    ),
                    'body' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => null
                    ),
                    'created' => array(
                        'type' => 'datetime'
                    ),
                ),
            ),
        ),
        'down' => array(
            'drop_table' => array(
                'users',
            ),
            'drop_table' => array(
                'posts',
            ),
        ),
    );

    /**
     * Before migration callback
     *
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function before($direction) {
        return true;
    }

    /**
     * After migration callback
     * userテーブルがcreateされたあとに､upだったら
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function after($direction) {
        if ($direction === 'up') {
            $user = new User();
            $user->save([
                'username' => 'admin',
                'password' => 'admin',
                'role' => 'admin',
            ]);
        }
        return true;
    }

}
