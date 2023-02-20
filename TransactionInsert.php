<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost:3307", "root", "", "bank");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$AccountNo = $_REQUEST['AccountNo'];
		$TransferToAccountNo = $_REQUEST['TransferToAccountNo'];
		$TransferAmmount = $_REQUEST['TransferAmmount'];
        $myDate = date("Y-m-d H:i:s");
		
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO transaction (FromAccountNo, ToAccountNo, amount, TransactionDate) VALUES ('$AccountNo',
			'$TransferToAccountNo','$TransferAmmount', '$myDate')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";

			echo nl2br("\n$AccountNo\n $TransferToAccountNo\n "
				. "$TransferAmmount");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}

        $sqlupdate = "UPDATE customers SET Balance = Balance-$TransferAmmount WHERE AccountNo ='$AccountNo'";        
		if(mysqli_query($conn, $sqlupdate))
        {
            echo "<h3>Amount subtracted in the database successfully.";
        }
        else{
            echo "ERROR: Hush! Sorry $sqlupdate. "
				. mysqli_error($conn);
        }
        $sqlupdate2 = "UPDATE customers SET Balance=Balance+$TransferAmmount WHERE AccountNo='$TransferToAccountNo'";        
		if(mysqli_query($conn, $sqlupdate2))
        {
            echo "<h3>Amount added in the database successfully.";
        }
        else{
            echo "ERROR: Hush! Sorry $sqlupdate2. "
				. mysqli_error($conn);
        }
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
