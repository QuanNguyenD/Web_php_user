<?php
/**
 * Logout Controller
 */
class LogoutController extends Controller
{
    /**
     * Process
     */
    public function process()
    {
        $this->logout();
    }

    /**
     * Logout
     * @return void 
     */
    private function logout()
    {
        $AuthUser = $this->getVariable("AuthUser");

        // Fire user.signout event
        Event::trigger("user.signout", $AuthUser);

        // Hủy session
        session_start();
        session_destroy();

        // Xóa accessToken khỏi Cookies
        if (isset($_COOKIE['accessToken'])) {
            setcookie("accessToken", "", time() - 3600, "/", "", true, true); // Secure + HttpOnly
        }

        header("Location: ".APPURL."/login");
        exit;
    }
}
