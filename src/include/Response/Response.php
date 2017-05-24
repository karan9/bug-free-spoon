<?php
/**
 * @author: Karan Srivastava <karan.srivastava@protonmail.com>
 * Response Class acts as main response wrapper
 * to handle all output from our API
 * this enables us to streamline how we send data
 * 
 * 
 * @usage:
 *  there are two ways one can use this Class
 * 
 * 1. Via Constructor:
 *    - create construtor and pass
 *    - all the specific params for it
 *    - then call `send_response()`
 * 
 * 2. Via Factory Setup
 *    - create a instance
 *    - use exposed functions to set data 
 *      accordingly
 * 
 *    @method: set_response_code => 
 *              see it's defination to know more
 * 
 *    @method: set_response_data =>
 *             see it's defination to know more
 * 
 *    @method: set_response_message =>
 *            see it's defination to know more
 * 
 *   - after that call `send_response()`
 */
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
   * @todo: Actually Implement it via a custom error handler
   */
  private function throw_error($message) {
    echo $message;
  }

  /**
   * @method constructor 
   * @param @enforced: $code => response code
   * @param: $data => any data to be sent in response
   * @param: $message => any custom message to accompany 
   * your response
   */
  public function __construct($code = false, $data = false, $message = false) {
    (empty($code)) ? false : $this->set_response_code($code);
    (empty($data)) ? false : $this->set_response_data($data);
    (empty($message)) ? false : $this->set_response_message($message);
  }


  /**
   * @method: Exposes functionality to set
   * http response code for the said response
   * @return void
   * @param: integer => must be a valid HTTP Response Code
   */
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

  /**
   * @method: Exposes functionality to set
   * data for the said response
   * @return void
   * @param: array => must be a valid associative array
   */
  public function set_response_data($data) {
    if (empty($data)) {
      $this->res_data = false;
    } else {
      $this->res_data = $data;
    }
  }


  /**
   * @method: Exposes functionality to set
   * message for the said response
   * @return void
   * @param: String => must be a valid php string
   */
  public function set_response_message($message) {
    if (empty($message)) {
      $this->res_message = false;
    } else {
      $this->res_message = $message;
    }
  }

  /**
   * @method: as name states SEND DEH RESPONSE!
   * @return void
   */
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