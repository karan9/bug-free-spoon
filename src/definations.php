<?php

/**
 * @const: 'EXTN_PHP'
 * @description: 'extension for php files'
 **/
define('EXTN_PHP', '.php');

 /**
  * @const: 'PATH_DELIMITER'
  * @description: 'delimiter defination for paths'
  **/ 
define('PATH_DELIMITER', '/');

/**
 * @const: 'ACTION_DELIMITER'
 * @description: 'delimiter for defined actions on controllers'
 **/
define('ACTION_DELIMITER', "#");

/**
 * @const: 'SITE_ROOT'
 * @description: 'path to declare our site root'
 */
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PATH_DELIMITER);


/**
 * @const: 'INCLUDE_PATH'
 * @description: 'path to includes our necessities'
 */
define('INCLUDE_PATH', SITE_ROOT . 'include/');


/**
 * @const: 'CONTROLLER_PATH'
 * @description: 'path to include our controllers'
 */
define('CONTROLLER_PATH', SITE_ROOT . 'controllers/');

/**
 * @const: 'LOG_PATH'
 * @description: 'path to our logs'
 */
define('LOG_PATH', SITE_ROOT . 'logs/');

/**
 * @const: 'HTTP_POST'
 * @description: 'defines following request is POST'
 */
define('HTTP_POST', 'POST');

/**
 * @const: 'HTTP_GET'
 * @description: 'defines following request is GET'
 */
define('HTTP_GET', 'GET');

/**
 * @const: 'DB_HOST'
 * @description: determines the name for database to be selected
 */
define('DB_HOST', 'localhost');

/**
 * @const: 'DB_USERNAME'
 * @description: determines the name for database to be selected
 */
define('DB_USERNAME', 'root');

/**
 * @const: 'DB_PASSWORD'
 * @description: determines the name for database to be selected
 */
define('DB_PASSWORD', 'docker');
