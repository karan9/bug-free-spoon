<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/definations.php";
require_once INCLUDE_PATH . 'Error' . PATH_DELIMITER . 'ErrorFactory' . EXTN_PHP;

/**
 * 
 * this class acts as a very loose wrapper for mysqli class
 * acts as a intial abstraction for classes to utlilize it
 **/
class Database {

    /**
     * @const: various databases 
     * for our various features
     * 
     * divided in following category
     * 
     * - talk (handles our Q and A)
     * - profile (handles user profiles)
     * - colleges (handles various colleges)
     * - default (dummy database to test our wrapper) 
     */
    const DB_TALK = "gmc_talk_db";
    const DB_PROFILE = "gmc_profile_db";
    const DB_COLLEGES = "gmc_colleges_db";
    const DB_DEFAULT = "gmc_base_db";

    /**
     * $conn @instanceof mysqli
     * ------------------------
     * conn variable is public as to provide
     * classes that uses this wrapper have base
     * functionality available to them for things 
     * that are outside scope of this class and
     * want direct interaction with mysqli functions
     */
    public $conn = null;

    /**
     * @constructor
     * ------------
     * this constructor initalises our $conn 
     * setting up our wrapper for functionality
     */
    public function __construct($DB_NAME = false) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        if ($DB_NAME) {
          $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, $DB_NAME);  
        } else {
          $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, self::DB_DEFAULT);  
        }
    }


    /**
     * @method: exec_query
     *
     * @enforced
     * @param : $fetch: boolean => check wether to return a assoc_array or not
     *
     * @param: $sql: string => SQL query string
     * @param: $params: array => any needed parameters for SQL
     * @param: $types => specified types for SQL params
     */
    public function exec_query($fetch = false, $sql, $params = [], $types = NULL) {

        // if no params available directly execute the query
        if (!$params) {
            return $this->conn->query($sql);
        }

        // use s as default types if no types are given
        if (!$types) {
            $types = str_repeat("s", count($params));
        }
        
        // prepare the query
        $stmt = $this->conn->prepare($sql);
        
        if (!$stmt) {
          ErrorFactory::log(__METHOD__, "Unable to prepare query");
          return false;
        }

        // bind the params types and queries
        if (!$stmt->bind_param($types, ...$params)) {
          ErrorFactory::log(__METHOD__, "Unable to bind params");
          return false;
        }

        // execute it!
        if (!$stmt->execute()) {
          ErrorFactory::log(__METHOD__, "Unable to execute query");
          return false;
        }

        // return on basis of $fetch
        return ($fetch) ? $stmt->get_result()->fetch_assoc() : true;
    }
}