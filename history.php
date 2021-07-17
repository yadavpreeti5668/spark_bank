<!DOCTYPE html>
<html>
    <head>
        <title>History</title>
       
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

        <div class="">
        <h2 class="hh2" style="color : black;"><b><u>Transaction History</u></b></h2>
</div>
        <br>
        <div class="">
       <div class="table-responsive-sm" style="overflow-x:auto;">
        <table >
        <thead style="color : black;">
            <tr>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount tansferred</th>
                
            </tr>
        </thead>
        <tbody>
        <?php

            $conn=new mysqli('localhost','root','','bank');

            if($conn->connect_error)
            {
                die('connection failed:'.$conn->connect_error);
            }


            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr style="color : black;">
            
            <td style="color : black;"><?php echo $rows['sender']; ?></td>
            <td style="color : black;"><?php echo $rows['receiver']; ?></td>
            <td style="color : black;"><?php echo $rows['balance']; ?> </td>
            
                
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
    </body>
</html>