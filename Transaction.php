<!DOCTYPE html>
<html lang="en">
<head>
	<title>GFG- Store Data</title>
</head>
<body>
	<center>
        <?php
            $AccountNo= $_REQUEST['AccountNo'];
            $mysqli = new mysqli("localhost:3307", "root", "", "bank");
            if($conn === false){
                die("ERROR: Could not connect. "
                    . mysqli_connect_error());
            }
            $sql = " SELECT * FROM customers WHERE AccountNo='$AccountNo' ";
            $result = $mysqli->query($sql);
            if (mysqli_num_rows($result) > 0) {
                $rows=$result->fetch_assoc();
                $FirstName=$rows["FirstName"];
                $LastName=$rows["LastName"];
                $EMail=$rows["EMail"];
                $Balance=$rows["Balance"];
                $City=$rows["City"];

            } else {
                echo "0 results";
            }
              
         ?>
		<h1>Storing Form data in Database</h1>
		<form action="TransactionInsert.php" method="post">
			
<p>
            <label for="AccountNo">Account No:</label>
			<input type="text" name="AccountNo" id="AccountNo" value="<?php echo $AccountNo;?>">
			</p>

			
<p>
			<label for="FirstName">First Name:</label>
			<input type="text" name="FirstName" id="FirstName" value="<?php echo $FirstName;?>">
			</p>

			
<p>
			<label for="LastName"> Last Name</label>
			<input type="text" name="LastName" id="LastName" value="<?php echo $LastName;?>">
			</p>

			
<p>
			<label for="EMail">Email Address:</label>
			<input type="text" name="EMail" id="EMail" value="<?php echo $EMail;?>">
			</p>

			
<p>
			<label for="Balance">Balance:</label>
			<input type="text" name="Balance" id="Balance" value="<?php echo $Balance;?>">
			</p>

<p>
			<label for="City">City:</label>
			<input type="text" name="City" id="City" value="<?php echo $City;?>">
			</p>  

<p>
			<label for="TransferToAccountNo">Transfer To AccountNo:</label>
			<input type="text" name="TransferToAccountNo" id="TransferToAccountNo">
			</p>  

<p>
			<label for="TransferAmmount">Transfer Ammount:</label>
			<input type="text" name="TransferAmmount" id="TransferAmmount">
			</p>  


			<input type="submit" value="Submit">
		</form>
	</center>
</body>
</html>
