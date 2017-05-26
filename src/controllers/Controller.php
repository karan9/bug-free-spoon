<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/definations.php";
require_once INCLUDE_PATH . 'Response' . PATH_DELIMITER . 'Response' . EXTN_PHP;
require_once INCLUDE_PATH . 'Error' . PATH_DELIMITER . 'ErrorFactory' . EXTN_PHP;

/**
 * @abstract: controller
 * @description: 
 *   - this class acts as a base class for all the controllers 
 *   - for every controller it is necessary to extend this class
 *   
 * @method: Init();
 * @description: init function kick starts the controller
 *     - enables us to plant the information we need to kick off at
 *     - the said controller
 */
abstract class Controller {
  
  /**
   * @method: handle_post()
   * @description: Hook for handling post requests in our
   *               controller class
   **/
  abstract protected function handle_post();

  /**
   * @method: handle_post()
   * @description: Hook for handling get requests in our
   *               controller class
   **/
  abstract protected function handle_get();


  /**
   * @method: handle_post()
   * @description: Hook for handling unhandled requests in our
   *               controller class
   **/
  abstract protected function handle_unhandled();

  /**
   * @method: init()
   * @description:  kickstart function for controllers
   * this function checks and kickstarts things based on object
   * of specified class
   **/
  public function init() {
    switch($_SERVER['REQUEST_METHOD']) {
      case HTTP_GET:
        $this->handle_get();
        break;
      case HTTP_POST:
        $this->handle_post();
        break;
      default:
        $this->handle_unhandled();
    }
  }

  public function init_action($action) {
    switch($_SERVER['REQUEST_METHOD']) {
      case HTTP_GET:
        $this->handle_get($action);
        break;
      case HTTP_POST:
        $this->handle_post($action);
        break;
      default:
        $this->handle_unhandled($action);
    }
  }

  public function init_id($id) {
    switch($_SERVER['REQUEST_METHOD']) {
      case HTTP_GET:
        $this->handle_get($id);
        break;
      case HTTP_POST:
        $this->handle_post($id);
        break;
      default:
        $this->handle_unhandled($id);
    }
  }
  
}