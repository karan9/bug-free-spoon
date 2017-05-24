<?php

class Response {

  /**
   * @var constant: File Not Found
   */
  const RES_OK = 200;

  /**
   * @var constant: File Not Found
   */
  const RES_NOT_FOUND = 404;

  /**
   * @var constant: Server Error
   */
  const RES_SERVER_ERROR = 500;

  /**
   * @var response: Response Code
   */
  private $res_code = NULL;

  /**
   * @var response: Response data
   */
  private $res_data = NULL;

  /**
   * @var boolean: is_res_error
   */
  private $is_res_error = true; 

  /**
   * @var response: Response Message
   */
  private $res_message = NULL;

  /**
   * @var __response: Response data
   */
  private $__response = array();


  /**
   * @method
   * @return : void
   */
  private function throw_error($message) {
    echo $message;
  }

  /**
   * @method constructor 
   */
  public function __construct($code = false, $data = false, $message = false) {
    (empty($code)) ? false : $this->set_response_code($code);
    (empty($data)) ? false : $this->set_response_data($data);
    (empty($message)) ? false : $this->set_response_message($message);
  }

  public function set_response_code($code) {
    if (empty($code)) {
      return;
    }
    // set $res_code
    $this->res_code = $code;

    // modify response on behalf of it
    // unless explicitly stated consider
    // an error occured
    switch($code) {
      case RES_OK:
        $this->is_res_error = false;
        break;
      case RES_NOT_FOUND:
      case RES_SERVER_ERROR:
      default:
        $this->is_res_error = true;
        break;
    }
  }

  public function set_response_data($data) {
    if (empty($data)) {
      $this->res_data = false;
    } else {
      $this->res_data = $data;
    }
  }

  public function set_response_message($message) {
    if (empty($message)) {
      $this->res_message = false;
    } else {
      $this->res_message = $message;
    }
  }

  public function send_response() {
    
    // setup reponse code
    if (empty($this->res_code)) {
      $this->throw_error("Response code not found");
      return;
    } else {
      http_response_code($this->res_code);
    }
    // compile our response
    
    // setup error
    (empty($this->is_res_error)) 
    ?  $__response["error"] = false 
    :  $__response["error"] = true;

    // setup message
    (empty($this->res_message))
    ?  $__response["message"] = false
    :  $__response["message"] = $this->res_message;

    // setup data;
    (empty($this->res_data)) 
    ?  $__response["data"] = false
    :  $__response["data"] = $this->res_data;

    // send the response
    echo json_encode($__response);
  }
}