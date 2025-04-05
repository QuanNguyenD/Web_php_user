<?php
require_once APPPATH.'/Core/Controller.php';
class ServiceDetailController extends Controller
{
    /**
     * Process
     */
    
    public function process($id)
    {   
        $this->view("service_detail");
    }
}