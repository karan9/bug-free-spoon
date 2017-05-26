<?php
require_once "Controller.php";
 
class Index extends Controller {

    /**
     * @var object response
     **/
    private $response;
    /**
     * @Override
     **/
    public function __construct() {
        // hook up on init
        $this->response = new Response();
    }

    /**
     * @Override
     */
    protected function handle_post() {
        $this->response->set_response_code(Response::RES_OK);
        $this->response->set_response_message("I'm a Post Request");
        $this->response->send_response();
    }

    /**
     * @Override
     */
    protected function handle_get() {
    }
    /**
     * @Override
     */
    protected function handle_unhandled() {
        echo "I'm a unhandled exception";
    }
}