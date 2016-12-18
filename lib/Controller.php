<?php


class Controller{

	protected $template = 'default';
	protected $views =  BASE_PATH.'/app/views/';


	protected function views($views,$variables = []){
	
		extract($variables);
		ob_start();
		require  $this->views.$views.'.php';
		$content = ob_get_clean();
		require BASE_PATH.'/app/views/templates/'.$this->template.'.php';

	}
	protected function loadModel($model){

		$models = BASE_PATH.'/app/models/'.ucfirst($model).'.php';
        if(file_exists($models)) {
            require $models;
            $model = ucfirst($model);
            $model_name = new $model();
            return 	$model_name;
        }
        throw new Exception('Model ' . $models . ' dos not exist');
    }
		public function middleware($middleware){
          $auth = new AuthenticateUser();
            $auth->check($middleware);
            $auth->check($middleware);
            return true;
        }



}