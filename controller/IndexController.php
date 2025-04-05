<?php
require_once APPPATH.'/Core/Controller.php';
class IndexController extends Controller
{
    /**
     * Process
     */
    
    public function process()
    {   
        // $accessToken = $_COOKIE['accessToken'] ?? $_SERVER['HTTP_AUTHORIZATION'] ?? null;
        // if (!$accessToken) {
        //     // Nếu không có token, chuyển hướng về trang login
        //     header("Location: " . APPURL . "/login");
        //     exit;
        // }
        
        $this->view("index");
    }
}