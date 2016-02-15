 <?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

 return array(
     'doctrine' => array(
         'connection' => array(
             'orm_default' => array(
                 'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
                 'params' => array(
                     'host' => 'localhost',
                     'port' => '3306',
                     'user' => 'root',
                     'password' => '',
                     'dbname' => 'zendblog',
//                     'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock',
                     'unix_socket' => 'C:/xampp/mysql/mysql.sock',
                     'charset' => 'utf8',
                     'driverOptions' => array(1002=>'SET NAMES utf8')
                     )
             )
         )
     ),
 );