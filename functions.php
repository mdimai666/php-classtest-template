<?php

require_once './inc/Core.php';
require_once './inc/SomeClass.php';
require_once './inc/NConfig.php';



$route = mb_strtolower(strtok($_SERVER["REQUEST_URI"], '?'));
$action = isset($_GET['action'])?mb_strtolower($_GET['action']):false;


if($route == '/get_test'){

    ResponseJson([
        'status' => 'OK'
    ]);

    exit();

} 
else if($route == '/someclass'){//use lowercase
    try {
    
        if(!$action){
            ResponseJson([
                'Result' => 'SomeClass class',
                'Hint' => 'set ?action for call method',
            ]);
            exit;
        }
        
        $host = 'http://localhost:1880/';
        $login = 'login';
        $pass = 'pass';
        $instance = new SomeClass($host, $login, $pass);
        
        
        if($action == lower('GetPostData')){
            $data = $instance->GetPostData();
            ResponseJson($data);
        }
        else if($action == lower('Test')){
            $data = $instance->Test();
            ResponseJson($data);
        }
        else if($action == lower('ConfigValue')){
            $data = $instance->ConfigValue();
            ResponseJson($data);
        }
        else if($action == lower('Increment')){
            $data = $instance->Increment();
            ResponseJson($data);
        }
        else if($action == lower('Decrement')){
            $data = $instance->Decrement();
            ResponseJson($data);
        }
        else {
            http_response_code(501);
            ResponseJson([
                'Error' => 'Action not found'
            ]);
        }

    } catch (\Throwable $th) {
        http_response_code(500);
        // echo $th;
        ResponseJson($th);
    }

    exit();
}