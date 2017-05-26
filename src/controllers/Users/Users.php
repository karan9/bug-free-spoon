<?php

require(CONTROLLER_PATH . "Controller" . EXTN_PHP);

class Users extends Controller {
  
  /**
   * @var const => string: allowed action in this class {signup}
   */
   const ACTION_SIGNUP = 'signup';

  /**
   * @var const => string: allowed action in this class {signin}
   */
   const ACTION_SIGNIN = 'signin';

  /**
   * @Override
   */
    protected function handle_post($action = false) {
        switch($action) {
          case self::ACTION_SIGNIN:
            $this->signin();
            break;
          case self::ACTION_SIGNUP:
            $this->signup();
            break;
          default:
            ErrorFactory::log(__METHOD__, "testing the logs");
            Response::send_response_not_found();
            break;
        }
    }

    /**
     * @Override
     */
    protected function handle_get($action = false) {
        if ($action) {
          echo "your action is $action";
        }
    }
    /**
     * @Override
     */
    protected function handle_unhandled($action = false) {
        if ($action) {
          echo "your action is $action";
        }
    }

    private function signin() {
      echo "I'm signing in";
    }

    private function signup() {
      echo "i'm signing up";
    }
}

