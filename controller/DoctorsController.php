<?php
require_once APPPATH.'/Core/Controller.php';
class DoctorsController extends Controller
{
    /**
     * Process
     */
    public function process()
    {   
        $this->view("doctors");
    }
}