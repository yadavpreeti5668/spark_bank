<?php
        $name = $_POST['name'];
        $email = $_POST['email'];
        $amt = $_POST['amt'];
        $id = $_POST['id'];
       
        //database connection
        
        $conn=new mysqli('localhost','root','','bank');

        if($conn->connect_error)
        {
            die('connection failed:'.$conn->connect_error);
        }
        else
        {
            $stmt=$conn->prepare("insert into user (id,name,email,amt) value(?,?,?,?)");
            $stmt->bind_param("issi",$id,$name,$email,$amt);
            $stmt->execute();

            $stmt->close();
            $conn->close();
        }
        
    ?>
        <html>
        <link rel="stylesheet" href="index.css">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="view.php">View Customer</a></li>
            <li><a href="add.html">Add Customer</a></li>
            <li><a href="history.php">History</a></li>
            
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <div class="hh2">
        <h3>Details added succesfully.<br>Thank you!</h3>
        </div>
        
        </html>