<!DOCTYPE html>
<html>
<head>
	<title>chat test</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
   
   <div class="chatbox">
      <h4>Shout out here</h4>
      
   	  
   	  <div class="textplace">
   	  	
   	  	<div>
   	  	    <textarea id="name"  placeholder="Your Name here"></textarea>
   	  	    <textarea id="message" placeholder="Type your message here"></textarea>
   	  		<button id="send">Shout!</button>  	  	
   	    </div>
   	  
   	  </div>

   </div>


<!-- Jquery script -->
<script type="text/javascript">
	$(document).ready(function(){



     $("#send").click(function(){

            var name = $("#name").val();
            var message = $("#message").val();
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();

			if(dd<10) {
			    dd="0"+dd;
			} 

			if(mm<10) {
			    mm="0"+mm;
			} 

			today = yyyy+"-"+mm+"-"+dd+ " " +today.getHours() + ":" + today.getMinutes()+":" + today.getSeconds();




            if(!name || !message )
            {
            	alert("please enter your name and message");
            }
            else
            {

             $.ajax({
                 
                 url: "dbwork.php",
                 type: "POST",
                 async: false,
                 data:{
                 	  "gese":1,
                 	  "user": name,
                 	  "shout": message,
                 	  "time": today
                 },
                 success: function(data){
                 	$("#name").val('');
                 	$("#message").val('');
                 	alert("Shouted succesfully!");
                 }

                 });
             
             }

            });


	});
</script>

</body>
</html>

