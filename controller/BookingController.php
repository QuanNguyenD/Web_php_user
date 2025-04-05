<?php
require_once APPPATH.'/Core/Controller.php';
class BookingController extends Controller
{
    /**
     * Process
     */
    public function process()
    {   
        $this->view("booking");
    }
}