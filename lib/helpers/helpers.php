<?php



function url($path){
	return BASE_URL.$path;
}

function yields($content){
	echo  $content;
}
function route($route){
   return 'http://local.dev/'.$route;
}