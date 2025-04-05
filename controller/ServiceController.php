<?php
require_once APPPATH.'/Core/Controller.php';
class ServiceController extends Controller
{
    /**
     * Process
     */
    public function process()
    {   
        $this->view("service");
    }
}