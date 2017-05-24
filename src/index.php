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
 * @class: AltoRouter @obj $app
 * @method: map
 * @params: [method, route, target];
 */

$app->map('GET|POST', '/', 'Index#init');
$app->map('POST', '/users/[a:action]', 'Users#init_action');

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
        /**
         * @var string => denotes path to require/import
         */
        $path = CONTROLLER_PATH . $controller . PATH_DELIMITER . $controller . EXTN_PHP;
        // check and require the needed controller
        // and call it
        if (!file_exists($path)) {
            $path = CONTROLLER_PATH . $controller . EXTN_PHP;
        }

        require_once($path);
        $obj = new $controller();
        call_user_func_array(array($obj, $action), $match['params']);
    } else {
        //@TODO: handle magic routes 
    }
} else {
    // @TODO: handle response routes
    echo "Error: 404";
}
