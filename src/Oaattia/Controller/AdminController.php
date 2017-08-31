<?php

namespace Oaattia\Controller;


use Oaattia\Database\MySqlConnection;
use Oaattia\Renderer\View;
use Oaattia\Repositories\UserRepository;


class AdminController extends BaseController
{
    /**
     * @var UserRepository
     */
    protected $userRepo;
    
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->userRepo = new UserRepository(new MySqlConnection());
    }
    
    
    /**
     * Login
     */
    public function login()
    {
        View::get('login');
    }
    
    /**
     * Login the current user
     */
    public function postLogin()
    {
        if ($_SESSION['is_logged_in']) {
            header('Location:'.'/');
        }
        
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $user = $this->userRepo->findBy('email', $_POST['email']);
            
            if ( ! empty($user)) {
                if (password_verify($_POST['password'], $user->password)) {
                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['user_id']      = $user->id;
                }
            }
        }
        
        // redirect back to the home page
        header('Location:'.'/');
        exit();
    }
    
    
    /**
     *
     */
    public function logout()
    {
        if ( ! empty($_SESSION)) {
            $_SESSION['is_logged_in'] = false;
        }
        // Redirect to the homepage
        header('Location:'.'/');
        exit;
    }
}