<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
    </head>
    <body>

    
    <?php









    



 
        session_start();
        $userid = $_SESSION['user'];

        $log_file = fopen("Registration.txt", "r");
        
        $data = fread($log_file, filesize("Registration.txt"));

        $data_filter = explode("\n", $data);
        
       
        
        for($i = 0; $i< count($data_filter)-1; $i++) {
            
            $json_decode = json_decode($data_filter[$i], true);

            if($json_decode['email'] == $userid) 
            {
                $firstname = $json_decode['firstname'];
                $lastname = $json_decode['lastname'];
                $gender = $json_decode['gender'];
                 $phone = $json_decode['phone'];
                $location = $json_decode['location'];
                $email = $json_decode['email'];
                $image = $json_decode['image'];
            }
        }
        fclose($log_file);

        ?>

        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Logout") {
                unset($_SESSION['user']); 
                header('Location: login.php');
                }
                ?>

            <?php

                if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Dashboard") {
              
                header('Location: dashboard.php');}

                 ?>


                 <?php

                 if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Search Book for AddToCart") {
              
                header('Location: searchbook.php');
                }
                
        ?>

        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "CartView for Buy") {
                
                header('Location: ViewCart.php');
                }

        ?>

          <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Request For Book") {
           
                header('Location: brequest.php');
                }

        ?>

         <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Track order") {
                
                header('Location: trackorder.php');
                }

        ?>


        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Order History") {
            
                header('Location: orderhistory.php');
                }

        ?>
        
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <input type="submit" value="CartView for Buy" name= "button">
            <input type="submit" value="My Order" name= "button">
            
            <input type="submit" value="Search Book for AddToCart" name= "button">
            <input type="submit" value="Request For Book" name= "button">
             <input type="submit" value="Track order" name= "button">
              <input type="submit" value="Order History" name= "button">
             <input type="submit" value="Logout" name= "button">
        </form>
        </form>

            <fieldset>
                <legend><b>Profile:</b></legend>

                <?php echo '<img src="image/'.$image.'" alt="Image" width="100" height="130">' ?>

                <br>
            
                <label for="firstname">First Name:</label>
                <?php echo $firstname; ?>

                <br>

                <label for="lastname"> LastName:</label>
                <?php echo $lastname; ?>

                <br>

                <label for="gender">Gender:  </label>
                <?php echo $gender; ?>

                <br>

                <label for="phone"> Phone Number:</label>
                <?php echo $phone; ?>

                <br>

                 <label for="location">Location:  </label>
                <?php echo $location; ?>

                <br>

                <label for="email">Email:</label>
                <?php echo $email; ?>

            </fieldset>

             <h5>Go to <a href="searchbook.php">Search Book</a></h5>

              <h5>Go to <a href="ViewCart.php">Cart List</a></h5>

              <h5>Go to  <a href="brequest.php">Request fot Book</a></h5>
        
    </body>
</html>


