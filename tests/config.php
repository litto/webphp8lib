<?php
ob_start();
session_start();
use voku\db\DB;
require_once '..\vendor\autoload.php';
include("..\libs\DotEnv.php");
require_once 'autoload.php';

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

require_once '..\vendor\phpauth\phpauth\Config.php';
require_once '..\vendor\phpauth\phpauth\Auth.php';
$constr='mysql:host='.getenv('DATABASE_HOST').';dbname='.getenv('DATABASE_NAME');
//database-connection-object
$dbh = new PDO($constr,getenv('DATABASE_USER'),getenv('DATABASE_PASSWORD'));
//creating a config-object is enough at this point
  ?>