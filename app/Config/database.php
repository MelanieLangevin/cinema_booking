<?php

/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Database configuration class.
 *
 * You can specify multiple configurations for production, development and testing.
 *
 * datasource => The name of a supported datasource; valid options are as follows:
 *  Database/Mysql - MySQL 4 & 5,
 *  Database/Sqlite - SQLite (PHP5 only),
 *  Database/Postgres - PostgreSQL 7 and higher,
 *  Database/Sqlserver - Microsoft SQL Server 2005 and higher
 *
 * You can add custom database datasources (or override existing datasources) by adding the
 * appropriate file to app/Model/Datasource/Database. Datasources should be named 'MyDatasource.php',
 *
 *
 * persistent => true / false
 * Determines whether or not the database should use a persistent connection
 *
 * host =>
 * the host you connect to the database. To add a socket or port number, use 'port' => #
 *
 * prefix =>
 * Uses the given prefix for all the tables in this database. This setting can be overridden
 * on a per-table basis with the Model::$tablePrefix property.
 *
 * schema =>
 * For Postgres/Sqlserver specifies which schema you would like to use the tables in.
 * Postgres defaults to 'public'. For Sqlserver, it defaults to empty and use
 * the connected user's default schema (typically 'dbo').
 *
 * encoding =>
 * For MySQL, Postgres specifies the character encoding to use when connecting to the
 * database. Uses database default not specified.
 *
 * sslmode =>
 * For Postgres specifies whether to 'disable', 'allow', 'prefer', or 'require' SSL for the 
 * connection. The default value is 'allow'.
 *
 * unix_socket =>
 * For MySQL to connect via socket specify the `unix_socket` parameter instead of `host` and `port`
 *
 * settings =>
 * Array of key/value pairs, on connection it executes SET statements for each pair
 * For MySQL : http://dev.mysql.com/doc/refman/5.6/en/set-statement.html
 * For Postgres : http://www.postgresql.org/docs/9.2/static/sql-set.html
 * For Sql Server : http://msdn.microsoft.com/en-us/library/ms190356.aspx
 *
 * flags =>
 * A key/value array of driver specific connection options.
 */
define('DEFAULT_DB', APP.'sqlite'.DS.'default.sqlite');
define('TEST_DB', APP.DS.'sqlite'.DS.'test.sqlite');
class DATABASE_CONFIG {

//    public $default = array(
//        'datasource' => 'Database/Mysql',
//        'persistent' => false,
//        'host' => 'localhost',
//        'login' => '',
//        'password' => '',
//        'database' => '',
//        'prefix' => '',
//            //'encoding' => 'utf8',
//    );
    
//     public $default = array(
//        'datasource' => 'Database/Sqlite',
//        'persistent' => false,
//        'database' => DEFAULT_DB,
//        'prefix' => '',
//        //'encoding' =&gt; 'utf8',
//    );
//     public $test = array(
//        'datasource' => 'Database/Sqlite',
//        'persistent' => false,
//        'database' => TEST_DB,
//        'prefix' => '',
//        //'encoding' =&gt; 'utf8',
//        );
//    public $test = array(
//        'datasource' => 'Database/Mysql',
//        'persistent' => false,
//        'host' => 'localhost',
//        'login' => 'root',
//        'password' => 'mysql',
//        'database' => 'cinema_booking_test',
//        'prefix' => '',
//            //'encoding' => 'utf8',
//    );
//     public $default = array(
//        'datasource' => 'Database/Sqlite',
//        'persistent' => false,
//        'prefix' => '',
//        'database' => DEFAULT_DB
//    );
    public function __construct() {
               if (getenv("OPENSHIFT_MYSQL_DB_HOST")):
	           $this->default['host']       = getenv("OPENSHIFT_MYSQL_DB_HOST");
	           $this->default['port']       = getenv("OPENSHIFT_MYSQL_DB_PORT");
	           $this->default['login']      = getenv("OPENSHIFT_MYSQL_DB_USERNAME");
	           $this->default['password']   = getenv("OPENSHIFT_MYSQL_DB_PASSWORD");
	           $this->default['database']   = getenv("OPENSHIFT_APP_NAME");
////	           $this->default['datasource'] = 'Database/Mysql';
////	           $this->test['datasource']    = 'Database/Mysql';
                   $this->default['datasource'] = 'Database/Sqlite';
                   $this->default['database']   = DEFAULT_DB;
	           $this->test['datasource']    = 'Database/Sqlite';
                   $this->test['database']    = TEST_DB;
                   //$this->default['database'] = get_env('OPENSHIFT_DATA_DIR').'/database.sqlite';
	       else:
	           $this->default['host']       = "localhost";
	           //$this->default['port']       = getenv("OPENSHIFT_POSTGRESQL_DB_PORT");
	           //$this->default['login']      = "root";
	           //$this->default['password']   = "mysql";
                   $this->default['prefix']     = '';
                   $this->default['persistent'] = false;
	           $this->default['database']   = DEFAULT_DB;
	           $this->default['datasource'] = 'Database/Sqlite';
	           $this->test['datasource']    = 'Database/Sqlite';
                   $this->test['database']   = TEST_DB;
	       endif;
	}
        
//             public $default = array(
//        'datasource' => 'Database/Sqlite',
//        'persistent' => false,
//        'database' => DEFAULT_DB,
//        'prefix' => '',
//        //'encoding' =&gt; 'utf8',
//    );

}
