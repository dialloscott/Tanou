<?php 

class CategoryController extends Controller{


	public function index(){
		return $this->views('categories/index');
	}

}