<?php
/**
 * @author: Karan Srivastava <karan.srivastava@protonmail.com>
 * Database:
 *  - this class aims to create a wrapper around
 */
class Database {

  /**
   * @var @static : to store our
   * base instance of class
   */
  private static $instance;
  private static $db;

  /**
   * @static
   * @return: instance of Database Class
   */
  public static function get_instance() {
    if (is_null(static::$instance)) {
      static::$instance = new static();
    }
    return static::$instance;
  }

  /**
   * Make constructor private, so nobody can call "new Class".
   */
  private function __construct() {
    $this->db = new mysqli(
        DB_HOST,
        DB_USERNAME,
        DB_PASSWORD,
        DB_NAME
    );
  }

  /**
   * Make clone magic method private, so nobody can clone instance.
   */
  private function __clone() {}

  /**
   * Make sleep magic method private, so nobody can serialize instance.
   */
  private function __sleep() {}

  /**
   * Make wakeup magic method private, so nobody can unserialize instance.
   */
  private function __wakeup() {}

}