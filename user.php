<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['Acc_No'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from TSF_bank where Acc_No=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from TSF_bank where Acc_No=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check insufficient balance.
    else if($amount > $sql1['Bank_bal'])
    {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {

                // deducting amount from sender's account
                $newbalance = $sql1['Bank_bal'] - $amount;
                $sql = "UPDATE TSF_bank set Bank_bal=$newbalance where Acc_No=$from";
                mysqli_query($conn,$sql);


                // adding amount to reciever's account
                $newbalance = $sql2['Bank_bal'] + $amount;
                $sql = "UPDATE TSF_bank set Bank_bal=$newbalance where Acc_No=$to";
                mysqli_query($conn,$sql);

                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='trans.php';
                           </script>";

                }

                $newbalance= 0;
                $amount =0;
        }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="google" content="notranslate">
    <meta http-equiv="Content-Language" content="en">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Transaction</title>
    <style type="text/css">
    body{
      background: url("user.jpg");
      background-repeat: no-repeat;
    }
    header {
    	background: url('http://www.autodatz.com/wp-content/uploads/2017/05/Old-Car-Wallpapers-Hd-36-with-Old-Car-Wallpapers-Hd.jpg');
    	text-align: center;
    	width: 100%;
    	height: auto;
    	background-size: cover;
    	background-attachment: fixed;
    	position: relative;
    	overflow: hidden;
    	border-radius: 0 0 50% 50%/ 30%;
    }
    header .overlay{
    	width: 100%;
    	height: 100%;
    	padding: 50px;
    	color: #FFF;
    	text-shadow: 1px 1px 3px #333;
      background-image: linear-gradient( 360deg, #9f05ff69 10%, #fd5e086b 100%);

    }

    h1 {
    	font-family: 'Dancing Script', cursive;
    	font-size: 80px;
    	margin-bottom: 30px;
    }
    #button{
      background-color: #ffff00;
      border-radius: 50%;
      padding-top: 30px;
      padding-bottom: 30px;
    }

  </style>
</head>

<body>
  <header>
    <div class="overlay">
      <h1>Transaction</h1>
    </div>
  </header>
	<div class="container">
            <?php
                include 'config.php';
                $sid=$_GET['Acc_No'];
                $sql = "SELECT * FROM  TSF_bank where Acc_No=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div class="container">
            <table class="table table-striped table-dark">
                <tr>

                  <th scope="col" class="text-center py-2">Account No.</th>
                  <th scope="col" class="text-center py-2">Name.</th>
                  <th scope="col" class="text-center py-2">E-Mail</th>
                  <th scope="col" class="text-center py-2">Registered Phone No.</th>
                  <th scope="col" class="text-center py-2">Bank Balance</th>
                </tr>
                <tr>

                  <td class="py-2"><?php echo $rows['Acc_No']?></td>
                  <td class="py-2"><?php echo $rows['Name']?></td>
                  <td class="py-2"><?php echo $rows['Email']?></td>
                  <td class="py-2"><?php echo $rows['Contact_No']?></td>
                  <td class="py-2"><?php echo $rows['Bank_bal']?></td>
                </tr>
            </table>
        </div>
        <br>
        <div class="container" style="padding: 0px 30px;">
        <label><h3 style="font-family: "Lucida Console", "Courier New", monospace;">Transfer To:</h3></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['Acc_No'];
                $sql = "SELECT * FROM TSF_bank where Acc_No!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['Acc_No'];?>" >

                    <?php echo $rows['Name'] ;?> (Balance:
                    <?php echo $rows['Bank_bal'] ;?> )

                </option>
            <?php
                }
            ?>
            <div>
        </select>
        <br>
            <label><h3 style="font-family: "Lucida Console", "Courier New", monospace;">Amount:</h3></label>
            <input type="number" class="form-control" name="amount" required>
            <br><br>
                <div class="text-center px-3" id="button">
            <button class="btn btn-success px-5" name="submit" type="submit" id="myBtn">Transfer</button>&emsp;&emsp;&emsp;
            <a class="btn btn-danger px-5" href="trans.php" role="button">Cancel</a>
                </div>
            </form>
        </div></div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
