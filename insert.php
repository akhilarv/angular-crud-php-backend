<?php
    
    require 'dbconnection.php';

    header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
    
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body);
	//echo $data;
    $name = $data->name;
    $mobile = $data->mobile;
    $designation = $data->job;
	$salary = $data->salary;
    
    echo json_encode($request_body);
    if(isset($data)){
        
    $sql = "INSERT INTO tbl_backend (name, mobile, designation, salary)
        VALUES ('$name','$mobile','$designation','$salary')";
    $result = mysqli_query($conn,$sql);
    
    }
?>