<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/definations.php";

class ErrorFactory {
  /**
   * @var $error_count = count of errors
   */
  private static $error_count = 0;

  /**
   * @const file name 
   */
  const ERROR_FILE = 'error_log.log';

  /**
   * @method: log
   * @param: $str: contains our log message
   */
  public static function log($method, $str) {
    // add a newline in logs
    $str += "\n";
    // error_counter
    $error_count += 1;
    // actually post log
    error_log("$error_count: $method => $str", 3, LOG_PATH . PATH_DELIMITER . ERROR_FILE);
  }
}