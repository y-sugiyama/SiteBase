<?php

App::uses('Post', 'Model');

class CreatePostsTable extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     */
    public $description = 'create_posts_table';

    /**
     * Actions to be performed
     *
     * @var array $migration
     */
    public $migration = array(
        'up' => array(
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
                        'type' => 'text',
                        'null' => false,
                        'default' => null
                    ),
                    'created' => array(
                        'type' => 'datetime'
                    ),
                    'modified' => array(
                        'type' => 'datetime'
                    ),
                    'tableParameters' => array(
                        'engine' => 'InnoDB',
                        'charset' => 'utf8',
                        'collate' => 'utf8_general_ci'
                    ),
                ),
            ),
        ),
        'down' => array(
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
     *
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function after($direction) {

        if ($direction === 'up') {

            $datas = [
                [
                    'title' => 'サイトをリニューアルしました',
                    'body' => '弊社サイトに◯◯機能を追加しました｡一部△△となっていますが､◯日からご利用いただけます｡',
                    'created' => '2016-08-27'
                ],
                [
                    'title' => '人材募集を開始しました',
                    'body' => '弊社システム開発部にてエンジニアの募集を開始しました｡◯◯からご応募いただけます｡',
                    'created' => '2016-08-28'
                ],
                [
                    'title' => 'イベントを開催します',
                    'body' => '△月△日､◯◯にて◯◯イベントを開催します｡詳細は◯◯から御覧ください｡',
                    'created' => '2016-08-29'
                ]
            ];
            foreach ($datas as $data) {
                $post = new Post();
                $post->save($data);
            }
        }
        return true;
    }

}
