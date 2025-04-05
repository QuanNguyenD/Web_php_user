<?php
require_once APPPATH.'/Core/Controller.php';
class AboutController extends Controller
{
    /**
     * Process
     */
    public function process()
    {   
        $this->view("about");
    }
}