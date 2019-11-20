<?php
/*
 * 	Auto-load the DB and Route classes.
 */
spl_autoload_register(function ($class_name){
	if(file_exists('./includes/classes/' . $class_name . '.php')){
		require_once './includes/classes/' . $class_name . '.php';
	}else if(file_exists('./Controller/' . $class_name . '.php')){
		require_once './Controller/' . $class_name . '.php';
	}
});
// Load Router file
require_once('Routes.php');

?>