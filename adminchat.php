<!DOCTYPE html>
<html>
<head>
	<title>admin_chat</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
   
   <div class="adminchat">
     <div class="chatarea" id="chatarea">
       
     </div>
     <button id="clear">Clear Chat</button>
   </div>


<!-- Jquery script -->
<script type="text/javascript">


       function displaychat(){
          $.ajax({
                 url: "dbwork.php",
                 type: "POST",
                 async: false,
                 data:{
                    "dekhaw":1
                    
                 },
                 success: function(data){
                     $("#chatarea").html(data);
                     
                 }


          });

       }  


       $(document).ready(function(){
                //displaychat();
                
                
                setInterval(displaychat,500);
                $("#chatarea").animate({ scrollTop: $(document).height() },2000);
                
                $("#clear").click(function(){
                        
                        $.ajax({
                               url: "dbwork.php",
                               type: "POST",
                               async: false,
                               data:{
                                  "muso":1
                                  
                               },
                               success: function(data){
                                   $("#chatarea").html(data);
                                   
                               }


                             });
                });
                

       });

 

</script>


</body>
</html>

