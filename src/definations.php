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
define('INCLUDE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/include/');


/**
 * @const: 'CONTROLLER_PATH'
 * @description: 'path to include our controllers'
 */
define('CONTROLLER_PATH', $_SERVER['DOCUMENT_ROOT'] . '/controllers/');