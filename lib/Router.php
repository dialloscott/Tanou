<?php

class Router{

	private $page;

	public function __construct($page){

		$this->page = $page;
	}
	public function dispatch(){
        $request = $this->page;

        $request   = trim($request,'/');
        $parts = explode('/',$request);
        $controller = isset($parts[0]) && $parts[0] != '' ? $parts[0] : 'post';
        $method = isset($parts[1])  ? $parts[1] : 'index';
        $method =  str_replace('?'.$_SERVER['QUERY_STRING'],'',$method);
        $params = isset($parts[2])  ? [$parts[2]] : [] ;
        $file = BASE_PATH.'/app/controllers/'.ucfirst($controller).'Controller.php';
        if(file_exists($file)){
        require $file;
        $controllers = ucfirst($controller).'Controller';
        $controller = new  $controllers();
        return call_user_func_array([$controller,$method],$params);

		}
		return $this->notFound();
	
	    }
	    public function notFound(){
	    	$html = '<h3>Erreur 404  page invalide</h3>';
	    	echo $html;  
	    }

}

