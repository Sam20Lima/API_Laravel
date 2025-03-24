<?php

namespace App\Http\Controllers\Person;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Person\Header;

class PersonController extends Controller{

    function allData(){
        $data = include __DIR__ . '/data.php';
        echo Header::json( 200, 'success', $data);
    }
    function allNames(){
        $data = include __DIR__ . '/data.php';
        $names = [];
        foreach($data as $item){
            $names[] = $item['name'];
        }
        echo header::json( 200, 'success', $names);
    }
    function allRecords(){
        $data = include __DIR__ . '/data.php';
        echo header::json( 200, 'success', ['total_records' => count($data)]);

    }
    function emailDomains(){
        $data = include __DIR__ . '/data.php';
        $email_domains = [];

        foreach($data as $person){
            if(filter_var($person['email'], FILTER_VALIDATE_EMAIL)){
                $email_domain = explode('@', $person['email'])[1];
                if(!in_array($email_domain, $email_domains)){
                    $email_domains[] = $email_domain;
                }
            }
        }
        echo header::json( 200, 'success', $email_domains);
    }
    function personData(){
        $data = include __DIR__ . '/data.php';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }else{
            echo header::json(400, 'error', 'Missing id parameter');
            exit;
        }
        if($id < 0 || $id > count($data) - 1){
            echo header::json(400, 'error', 'Person not found');
            exit;
        }
        
        echo header::json(200, 'success', $data[$id]);
    }
    function status(){
        echo header::json( 200, 'API is running!');
    }
}