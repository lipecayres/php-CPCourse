<?php
    //$_POST as connection type to get HTML form entries
    if(isset($_POST['submit']))
    {
        //define the fields 
        //The square brackets contain the values of the name attribute in the 
        //input labels of the HTML code.
        $fname = $_POST['fname']; //Fagun
        $lname = $_POST['lname'];
        $email = $_POST['email'];
    }
	// database details
    // specify the permissions of the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    // creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

    // using sql to create a data entry query
    // we add the values that we received from the HTML form.
    $sql = "INSERT INTO student (fname, lname, email) VALUES ('$fname', '$lname', '$email')";
  
    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        echo "Entries added!";
    }
	else{
		echo "Failed to insert data";
	}
    // close connection once the entry is inserted
    mysqli_close($con);

	?>