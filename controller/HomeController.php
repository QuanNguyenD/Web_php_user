<?php
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    class HomeController extends Controller
    {
        public function process()
        {
            // //s$AuthUser = $this->getVariable("AuthUser");
            // $accessToken = $_COOKIE['accessToken'] ?? $_SERVER['HTTP_AUTHORIZATION'] ?? null;
            // if (!$accessToken) {
            //     // Nếu không có token, chuyển hướng về trang login
            //     header("Location: " . APPURL . "/login");
            //     exit;
            // }
            // try {
            //     // Giải mã token
            //     $decoded = JWT::decode($accessToken, new Key(EC_SALT, 'HS256'));
            //     $AuthUser = (array) $decoded;

            //     // Kiểm tra tính hợp lệ của người dùng
            //     if (!$AuthUser || empty($AuthUser['id'])) {
            //         throw new Exception("Unauthorized");
            //     }

            //     $this->setVariable("AuthUser", $AuthUser); // Gán biến cho session hiện tại
            // } catch (\Exception $e) {
            //     // Token không hợp lệ hoặc hết hạn
            //     header("Location: ".APPURL."/login");
            //     exit;
            // }
            // if (!$AuthUser){
            //     header("Location: ".APPURL."/login");
            //     exit;
            // }
            $this->view("home");
        }
    }
?>