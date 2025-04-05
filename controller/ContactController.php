<?php
require_once APPPATH.'/Core/Controller.php';
class ContactController extends Controller
{
    /**
     * Process
     */
    public function process()
    {   
        $this->view("contact");
    }
}