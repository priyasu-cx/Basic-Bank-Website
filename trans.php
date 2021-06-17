<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
      button{
        border:none;
			background: none;
      }
      button:hover{
        background-color:none;
        color: white;
      }

}
    </style>
</head>

<body>
  <?php
  include 'navbar.php';
  ?>
<?php
    include 'config.php';
    $sql = "SELECT * FROM TSF_bank";
    $result = mysqli_query($conn,$sql);
?>

<div id="table" class="container">
        <h2 class="text-center pt-4">Registered Users</h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-fixed table-sm table-hover table-striped table-condensed table-bordered">
                        <thead>
                            <tr class="table-dark">
                            <th scope="col" class="text-center py-2">Serial No.</th>
                            <th scope="col" class="text-center py-2">Account No.</th>
                            <th scope="col" class="text-center py-2">Name.</th>
                            <th scope="col" class="text-center py-2">E-Mail</th>
                            <th scope="col" class="text-center py-2">Registered Phone No.</th>
                            <th scope="col" class="text-center py-2">Bank Balance</th>
                            <th scope="col" class="text-center py-2">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($rows=mysqli_fetch_assoc($result)){
                        ?>
                    <tr>
                        <td class="py-2"><?php echo $rows['Serial_No'] ?></td>
                        <td class="py-2"><?php echo $rows['Acc_No']?></td>
                        <td class="py-2"><?php echo $rows['Name']?></td>
                        <td class="py-2"><?php echo $rows['Email']?></td>
                        <td class="py-2"><?php echo $rows['Contact_No']?></td>
                        <td class="py-2"><?php echo $rows['Bank_bal']?></td>
                        <td><a href="user.php?Acc_No= <?php echo $rows['Acc_No'] ;?>">
                          <!--button to select user-->
                          <button type="button" class="btn btn-success">Select User</button>
                    </tr>
                <?php
                    }
                ?>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
         </div>
         <?php
         include 'footer.php';
         ?>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
