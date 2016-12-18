<?php


class AuthenticateUser
{
    public $middleware = ['auth' => 1, 'guest' => 2];
    public $credentials = [];

    public function check($middleware)
    {
        if (!array_key_exists($middleware, $this->middleware)) {
            throw new Exception('the middleware ' . $middleware . ' dos not exist ');
        } else {
          if($this->middleware[$middleware] == 1){
             if(!isset($_SESSION['auth'])){
                 header('Location:http://local.dev/user/login');
                 exit();
             }else{
                 return true;
             }
          }elseif ($this->middleware[$middleware] == 2){
             if(!isset($_SESSION['auth'])){
                 return true;
             }
          }
        }
    }
    public
function auth($credential){
         $_SESSION['auth'] = $credential;
        $this->credentials = $_SESSION['auth'];
    }

}