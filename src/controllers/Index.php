<?php
require_once "Controller.php";

class Index extends Controller {

    /**
     * @Override
     */
    protected function handle_post() {
        echo "I'm a Post Request";
    }

    /**
     * @Override
     */
    protected function handle_get() {
        echo "I'm a get Request";
    }
    /**
     * @Override
     */
    protected function handle_unhandled() {
        echo "I'm a unhandled exception";
    }
}