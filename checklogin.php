<?php
$email=filter_input(INPUT_POST, 'email');
$password=filter_input(INPUT_POST, 'password');


if(!empty($email))
{
	if(!empty($password)){
		$host='localhost';
		$dbemail="root";
		$dbpassword="";
		$dbname="people";

		//create connection
		$conn=new mysqli ($host,$dbemail,$dbpassword,$dbname);
		if(mysqli_connect_error())
		{
			die('Connect Error('.
		    mysqli_connect_errno().')'.
		    mysqli_connect_error());
		}
		else
		{
            $sql="INSERT INTO reg(email,password)values('$email','$password')";
            if($conn->query($sql))
            {
              Print '<script>window.location.assign("homepage.html");</script>';
            }
            else
            {
            	echo "Error: ".$sql."<br>".$conn->error;
            }
            $conn->close();
		}
	}
	else
	{
		echo "Password should not be empty";
		die();
	}
}
else
{
	echo "Email should not be empty";
	die();
}
?>