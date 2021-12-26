<?php 

    namespace Classes\Controllers;

use Classes\Helpers\UserRedirect;
use Classes\Models\UserRepository;

class UserController extends Controller{

    private $userRepository;

    public function profile(){
        UserRedirect::redirectIfNotLogged($this->session);

    }

    public function quizes(){
        UserRedirect::redirectIfNotLogged($this->session);

    }
}