<?php

function ResponseJson($data){
    header('Content-Type: application/json');
    echo json_encode($data);
}

function Content($layout = 'layout'){
    global $route;

    if($route == '/') $route = '/index';
    $path = 'pages'.$route.'.php';    
    if(file_exists($path)){
        include $path;
    } else {
        include '404.php';
    }
}

function Layout($layout = 'layout'){
    global $route;

    $path = 'layouts/'.$layout.'.php';    
    include $path;
}

function IsActiveUrl($url){
    global $route;

    if($url === '/' && strlen($route)>1){
        return false;
    }
    else if (strpos($route, $url) === 0) {
        return true;    
    } 
    
    return false;
}

function __dump($var){
	highlight_string("<?php\n" . var_export($var, true) . ";\n?>");
}

function lower($text){
    return mb_strtolower($text);
}