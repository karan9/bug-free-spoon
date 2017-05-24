<?php
/**
 * User: Karan
 * Date: 22/5/17
 * Time: 1:32 PM
 **/
require_once 'definations.php';
require_once INCLUDE_PATH . 'AltoRouter.php';
//@TODO: add response handler



/**
 * @topic: init router
 * @description:
 *        - instantiate AltoRouter Library
 *        - setBasePath to ` '' `
 **/
$app = new AltoRouter();
$app->setBasePath('');
/**
 * @topic: route mapping
 * @class: AltoRouter @as $app
 * @method: map
 * @params: [method, route, target];
 */

$app->map('GET|POST', '/', 'Index#init');

/**
 * @class: AltoRouter
 * @method: match
 */
$match = $app->match();
/**
 * @topic:
 */
if($match) {
    // divide on basis of our delimiter
    list($controller, $action) = explode(ACTION_DELIMITER, $match['target']);
    if(is_callable($controller, $action)) {
        // require the needed controller
        // and call it 
        require_once(CONTROLLER_PATH . $controller . EXTN_PHP);
        $obj = new $controller();
        call_user_func_array(array($obj, $action), $match['params']);
    } else {
        //@TODO: handle magic routes 
    }
} else {
    // @TODO: handle response routes
    echo "Error: 404";
}
