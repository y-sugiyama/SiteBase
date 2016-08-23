# SiteBase

## 概要
コーポレートサイトの雛形サイトです。
CakePHP 2.8 で作成してます。

![概要](https://raw.githubusercontent.com/y-sugiyama/SiteBase/master/webroot/img/sitebase.png)

## 要件

- PHP 5.6 以上
- MySQL 5 以上

## インストール方法

```
$ git clone https://github.com/y-sugiyama/SiteBase.git
$ cd SiteBase
$ composer install
```

## データベースのセットアップ

※事前に MySQL 内にデータベースを作成しておいてください。

database.php ファイルを作成

```
$ cp Config/database.php.default Config/database.php
```

database.php ファイルを編集

```
<?php
// Config/database.php

class DATABASE_CONFIG {

	public $default = array(
		'datasource'  => 'Database/Mysql',
		'persistent'  => false,
		'host'        => 'YOURE_HOSTNAME',
		'login'       => 'YOURE_USERID',
		'password'    => 'YOURE_PASSWORD',
		'database'    => 'YOURE_DATABASE',
		'prefix'      => '',
		'encoding'    => 'utf8',
	);

	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host'        => 'YOURE_HOSTNAME',
		'login'       => 'YOURE_USERID',
		'password'    => 'YOURE_PASSWORD',
		'database'    => 'YOURE_DATABASE',
		'prefix'     => '',
		'encoding' => 'utf8',
	);
}
```

データベースのテーブルを作成（マイグレーションの実行）
```
$ Console/cake Migrations.migration run all
```

## アプリケーションの起動

※ 事前にデータベースを起動しておいてください。

```
$ Console/cake server -p 8000
...
...
built-in server is running in http://localhost:8000/
```
