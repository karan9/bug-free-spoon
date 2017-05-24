<?php
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
   * @method: init()
   * @description:  kickstart function for controllers
   **/
  abstract public function init();

}