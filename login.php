<?php

    require 'dbconnection.php';

    header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
    
   $request_body = file_get_contents('php://input');
    $data = json_decode($request_body);
	//echo $data;
    $username = $data->username;
    $password = $data->password;
	$sql = "SELECT * FROM tbl_login WHERE username='$username' AND password='$password'";
	if($result = mysqli_query($conn,$sql))
	{
		$rows = array();
		while($row = mysqli_fetch_assoc($result))
		{
		$rows[] = $row;
		}
		echo json_encode($rows);
	}
	else
	{
	http_response_code(404);
	}
	


?>