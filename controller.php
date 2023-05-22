<?php
include "config.php";
include LIB_PATH . "functions.php";

$option = get('option','current');

switch ($option) {
    case 'current':
        include MODEL_PATH . "list.php";
        include VIEW_PATH . 'current.phtml';
        break;
    case 'completed':{
        include MODEL_PATH . 'list.php';
        include VIEW_PATH . 'completed.phtml';
        break;
    }
    case 'upload':{
        include MODEL_PATH . 'upload.php';
        include VIEW_PATH . 'upload.phtml';
        break;
    }
    default:
        # code...
        break;
}

// echo show_source(__FILE__);


