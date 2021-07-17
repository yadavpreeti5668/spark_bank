<?php

$conn=new mysqli('localhost','root','','bank');

if($conn->connect_error)
{
    die('connection failed:'.$conn->connect_error);
}

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $deduct = $_POST['deduct'];

    $sql = "SELECT * from user where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from user where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    

    // constraint to check input of negative value by user
    if (($deduct)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($deduct > $sql1['amt']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Sorry, Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($deduct == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
       
                // deducting amount from sender's account
                $newbalance = $sql1['amt'] - $deduct;
                $sql = "UPDATE user set amt=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['amt'] + $deduct;
                $sql = "UPDATE user set amt=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$deduct')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Completed');
                                     window.location='history.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Transact</title>
    </head>
    <body>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="view.php">View Customer</a></li>
            <li><a href="add.html">Add Customer</a></li>
            <li><a href="history.php">History</a></li>
            
            <li><a href="contact.html">Contact</a></li>
        </ul> 

        
            <h1 class="hh2">Transact Money</h1><br><br>
            <h2 class="hh1">Selected user details</h2>
            <div class="table-responsive-sm" style="overflow-x:auto;">
                <table >
                <thead style="color : black;">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Amount</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php
                            $conn = mysqli_connect('localhost','root','','bank');

                            $uid = $_GET['id'];

                            $query = "Select * FROM `user` WHERE id = {$uid}";
                            $result = mysqli_query($conn,$query);

                             while($row = mysqli_fetch_array($result)){
                        ?>
                                <tr style="color : black;">
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['amt']; ?></td>
                                  
                                </tr>
                            
                        <?php       
                                
                            }
                        ?>
                        </tbody>
                    </table>
                
            </div>

        </div>

        <form method="post" name="tcredit" class="containert" ><br>
        

        <label style="color : black;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
               
                $uid=$_GET['id'];
                $sql = "SELECT * FROM user where id!=$uid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['amt'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
           
        </select>
        <br>
        <br>
            <label style="color : black;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="deduct" required>   
            <br><br>
            
            <button class="sub" name="submit" type="submit"  >Transfer</button>
            
        </form>
    
                       
    </body>
</html>
    

