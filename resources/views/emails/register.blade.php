<!-- <div style="background-color:#fcf9f9;border:1px solid #ede3e3;padding:10px;">
	<p>Hello {{$data['name']}}</p>
	<br><p>Congratulations! You have successfully registered your account to Striver.</p>
	<br><p>Here are your basic details. Keep it safe for your future use.</p>
	<p>Your Username is : <b>{{$data['email']}}</b></p>
	
	<br><p>Thank you.<br><strong>{{env("PROJECT_TITLE")}}</strong></p>
</div> -->

<html>
    <body>
    <div align="center">
         <div style="max-width: 680px; min-width: 500px; border: 2px solid #e3e3e3; border-radius:5px; margin-top: 20px">   
    	    <div>
    	        <!-- <img src="http://talmanagency.com/wp-content/uploads/2014/12/cropped-logo-new.png" width="250" alt="CREATIVE TALENT MANAGEMENT" border="0"  /> -->
    	        <h3>Striver</h3>
    	    </div> 
    	    <div  style="background-color: #fbfcfd; border-top: thick double #cccccc; text-align: left;">
    	        <div style="margin: 30px;">
         	        <p>
             	        Dear Candidate,<br> <br>
             	        Congratulations! You have successfully registered your account to Striver.<br> <br>
             	        Here are your basic details. Keep it safe for your future use:<br><br>
         	        </p>
         	        
         	        <br>  <br>
         	                Thank you!!!<br><br>
                    
         	        <div style="text-align: Right;">
         	            With warm regards,<br>
                        <strong>{{env("PROJECT_TITLE")}}</strong>
         	        </div>
         	    </div>
    	    </div>   
    	</div>   
	</div>
	    <center><?php echo date('Y');?> © Striver. ALL Rights Reserved.</center>
	</body>
</html>	
