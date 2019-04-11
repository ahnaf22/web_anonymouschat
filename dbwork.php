<?php 
    
    $dbname="chat";
    $username="root";
    $pass='';
    $server="localhost";

    $conn=mysqli_connect($server,$username,$pass,$dbname);

    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
    	//echo "connected successfully";
    	
    	if(isset($_POST["gese"]))
    	{
           unset($_POST["gese"]);
           
           $name=$_POST["user"];
           $shout=$_POST["shout"];
           $time=$_POST["time"];

           $query = "INSERT INTO history(name,shout,s_time)VALUES ('$name','$shout','$time')";
    	   mysqli_query($conn, $query);
    	   $conn->close();
    	   exit();

    	}

        if(isset($_POST["dekhaw"]))
        {
            unset($_POST["dekhaw"]);
            $show = "SELECT * from history";
            $result=mysqli_query($conn, $show);
            date_default_timezone_set("Asia/Dhaka");

            if(mysqli_num_rows($result)==0)
            {
                ?>
                <p>No shouts To show!</p>
                <?php
            }
            
            
            while($data= mysqli_fetch_array($result))
            {

               $myvalue = $data["s_time"];
               
               $datetime = new DateTime($myvalue);
               $date = $datetime->format('d-m-y');
               $time = $datetime->format('h:i:s A');


            
              ?>
                 <div class="commbox">
                     <div class="names">
                         <p><?php echo $data["name"]; ?></p>
                     </div>
                     <div class="comments">
                         <p><?php echo $data["shout"]; ?></p>
                     </div>
                     <div class="sentTime">
                         <p><?php echo $time."<br>".$date; ?></p>
                     </div>
                 </div>


             <?php
            }
            exit();

        }


        if(isset($_POST["muso"]))
        {
            unset($_POST["muso"]);
            $remove = "DELETE from history";
            mysqli_query($conn, $remove);
            exit();

        }
    	
    	
    } 

    




 ?>