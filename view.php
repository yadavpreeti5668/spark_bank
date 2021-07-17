<!DOCTYPE html>
<html>
    <head>
        <title>View Customer</title>
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
        
        
            <h1 class="hh2">Customer Details</h1>

            <div class="table-responsive-sm" style="overflow-x:auto;">
            <table class="table table-hover table-striped table-condensed table-bordered table-dark">
                        <thead  style="color : black;">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Amount</th>
                                <th>Operation</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php
                            $conn = mysqli_connect('localhost','root','','bank');
                            $query = "Select * FROM `user` ";
                            $result = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_array($result)){
                        ?>
                                <tr style="color:black";>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['amt']; ?></td>
                                    <td><a href="transact.php?id= <?php echo $row['id'] ;?>"> <button type="button" class="btn" style="background-color : #A569BD;">Transact</button></a></td>
                                </tr>
                            
                        <?php       
                            }
                        ?>

                        </tbody>
                    </table>
                
            

        </div>

    </body>
</html>
    
