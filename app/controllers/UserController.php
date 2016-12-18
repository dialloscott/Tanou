<?php

class UserController extends Controller
{

    public function index()
    {

        return $this->views('users/login');
    }

    public function login()
    {
        return $this->views('users/login');
    }

    public function check()
    {
     if(!empty($_POST) && $_POST['email'] != '' && $_POST['password']){
         extract($_POST);
         $user = $this->loadModel('user')->check('email',$email);
         if($user && password_verify($password,$user->password)){
             $authenticate = new AuthenticateUser();
             $authenticate->auth($user);
             header('location:http://local.dev/admin/index');
         }else{
             header('location:'.$_SERVER['HTTP_REFERER']);
             exit();
         }
     }else{
         header('location:'.$_SERVER['HTTP_REFERER']);
         exit();
     }
    }
    public function logout(){
        $_SESSION = [];
        header('location:http://local.dev/user/login');
    }

}
