<?php

require_once APPPATH.'/Core/Input.php';
require_once APPPATH.'/Core/Controller.php';
class LoginController extends Controller
{
    /**
     * Process
     */
    public function process()
    {
        $AuthUser = $this->getVariable("AuthUser");
        if ($AuthUser) {
            header("Location: ".APPURL);
            exit;
        }
        

        if (Input::post("action") == "login") {
            $this->login();
        }
        $this->view("login");
    }



    private function login()
    {
        $email = Input::post("phone");
        $password = Input::post("password");
        //$password ="rrrrr";
        //$password = $data['password'] ?? null;
        $remember = Input::post("remember");
        // $input = file_get_contents('php://input');
        // $inputdata = json_decode($input, true);
        
        // $type = $data['type']?? null;
        //$password = $data['password'] ?? null;
        if ($email && $password) 
        {
            try {
                $client = new GuzzleHttp\Client();

                $resp = $client->request('POST', API_URL."/login",  [
                    'form_params' => [
                        'phone' => $email,
                        'password' => $password,
                        'type' => "patient"
                        // 'email' =>"admindoc@rrr.com",
                        // 'password'=>"gicungduoc1"
                    ]
                ]);
                $data = json_decode($resp->getBody(), true);                
                // echo($email);
                // echo($password);
                
                if(isset($data['result']) && $data['result'] == 1){

                    
                    //$accessToken = $resp->accessToken;
                    $accessToken = $data['accessToken'];
                    $exp = $remember ? time()+86400*30 : 0;

                    setcookie("accessToken", $accessToken, $exp, "/");
                    if($remember) {
                        setcookie("mplrmm", "1", $exp, "/");
                    } else {
                        setcookie("mplrmm", "1", time() - 30*86400, "/");
                    }
                    
                    header("Location: ".APPURL."/home");
                    exit;
                }else {
                    // In thông báo lỗi nếu đăng nhập không thành công
                    //echo "Error: " . ($data['msg'] ?? 'Unknown error');
                }
            } catch (Exception $e) {
                print_r($e->getMessage());
            }
        }
        return $this;
    }


    
}