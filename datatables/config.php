<?php if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.

// Enable error reporting for debugging (remove for production)
//error_reporting(E_ALL);
ini_set('display_errors', '0');

(new DotEnv(dirname(dirname(__FILE__)) . '/.env'))->load();
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */
$sql_details = array(
	"type" => "Mysql",     // Database type: "Mysql", "Postgres", "Sqlserver", "Sqlite" or "Oracle"
	"user" => getenv('DATABASE_USER'),          // Database user name
	"pass" => getenv('DATABASE_PASSWORD'),          // Database password
	"host" => getenv('DATABASE_HOST'), // Database host
	"port" => "",          // Database connection port (can be left empty for default)
	"db"   => getenv('DATABASE_NAME'),          // Database name
	"dsn"  => "charset=utf8mb4",          // PHP DSN extra information. Set as `charset=utf8mb4` if you are using MySQL
	"pdoAttr" => array()   // PHP PDO attributes array. See the PHP documentation for all options
);


// This is included for the development and deploy environment used on the DataTables
// server. You can delete this block - it just includes my own user/pass without making 
// them public!
// if ( is_file($_SERVER['DOCUMENT_ROOT']."/datatables/pdo.php") ) {
// 	include( $_SERVER['DOCUMENT_ROOT']."/datatables/pdo.php" );
// }
// /End development include

