<?php
    include("connection.php");
	
	$cmd = $_REQUEST['cmd'];
	
	switch($cmd){
		case "add":
		    $sql = "INSERT into  users (first_name,last_name)
			        VALUES('".$_REQUEST['first_name']."',
			                '".$_REQUEST['last_name']."')";
			$result = $conn->query($sql);
			if($result)
			{
			    //insert id of users table
				$users_id = $conn->insert_id;
				
				
				 $sql = "INSERT into  address (users_id,address,city,cell)
			        VALUES('".$users_id."',
			                '".$_REQUEST['address']."','".$_REQUEST['city']."',
							'".$_REQUEST['cell']."')";
			     $result = $conn->query($sql);
					
				$message = "Data has been saved";
			}
			else
			{
				$message = "Error Occured";
			}
		    include("form.php");
		   break;
		default:
		    include("form.php");
	}


?>