<?php

    chdir(dirname(__FILE__));
    
    function __autoload($class_name) {
	    if (is_file('../libs/'.$class_name.'.php'))  {
		    require_once '../libs/'.$class_name.'.php';
	    } elseif (is_file('../actions/'.$class_name.'.php')) {
		    require_once '../actions/'.$class_name.'.php';
	    } elseif (is_file('../views/'.$class_name.'.php')) {
		    require_once '../views/'.$class_name.'.php';
	    }
    }
