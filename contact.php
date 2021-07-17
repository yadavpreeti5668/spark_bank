<?php
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $countryname = $_POST['countryname'];
        $mail = $_POST['mail'];
        $subject = $_POST['subject'];

       
        //database connection
        
        $conn=new mysqli('localhost','root','','bank');

        if($conn->connect_error)
        {
            die('connection failed:'.$conn->connect_error);
        }
        else
        {
            $stmt=$conn->prepare("insert into contact (firstname,lastname,countryname,mail,subject) value(?,?,?,?,?)");
            $stmt->bind_param("sssss",$firstname,$lastname,$countryname,$mail,$subject);
            $stmt->execute();

            $stmt->close();
            $conn->close();
        }
        
    ?>
        <html>
        <link rel="stylesheet" href="index.css">
        <ul>
            <li><a  href="index.html">Home</a></li>
            <li><a href="view.html">View Customer</a></li>
            <li><a href="history.php">History</a></li>
           
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <div class="hh2">
        <h3>Details added succesfully.<br>Thank you!</h3>
        </div>
        
        </html>