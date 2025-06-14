<?php
class Auth {

    private $db;

    public function __construct(Database $database){
        $this->db = $database->getConnection();
    }

    public function login($email, $password){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['surname'] = $user['surname'];
                return true;
            } 
        }
        return false;
    }
    public function logout(){
        $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
        session_destroy();
    }
    
    public function isLoggedIn(){
        return isset($_SESSION['user_id']);
    }

    public function getUserRole(){
        return $_SESSION['role'] ?? null;
    }

    public function requireLogin() {
        if (!$this->isLoggedIn()) {
            header("Location: login.php");
            exit;
        }
    }
    public function getUserId() {
        if (isset($_SESSION['user_id'])) {
            return $_SESSION['user_id'];
        } else {
            return false;
        }
    }
}
?>