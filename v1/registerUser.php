<?php

require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(
        isset($_POST['username']) and
        isset($_POST['email']) and
        isset($_POST['password'])
    ){
        // operate the data further
        
        $db = new DbOperations();
        if($db->createUser($_POST['username'],$_POST['password'],$_POST['email'])){
            $response['error'] = false;
            $response['message'] = "User Registered Successfully";
        }else{
            $response['error'] = true;
            $response['message'] = "Some Error Occurred Please Try Again";
        }
    }else{
        $response['error'] = true;
        $response['message'] = "Required fields are missing";
    }
}else{
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}

echo json_encode($response);
?>