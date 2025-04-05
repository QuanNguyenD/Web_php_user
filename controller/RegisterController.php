<?php
require_once APPPATH.'/Core/Controller.php';
    class RegisterController extends Controller
    {
        public function process()
        {
            $this->view("register");
        }
    }
?>  