<?php
use voku\db\DB;


require_once 'vendor\autoload.php';
include("lib\DotEnv.php");

(new DotEnv(__DIR__ . '/.env'))->load();


  
  $connectionParams = [
      'dbname'   => getenv('DATABASE_NAME'),
      'user'     => getenv('DATABASE_USER'),
      'password' => getenv('DATABASE_PASSWORD'),
      'host'     => getenv('DATABASE_HOST'),
      'driver'   => getenv('DATABASE_DRIVER'), // 'pdo_mysql' || 'mysqli'
      'charset'  => getenv('DATABASE_CHARSET'),
  ];

$db = DB::getInstance(getenv('DATABASE_HOST'),getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'),getenv('DATABASE_NAME'));


  ?>