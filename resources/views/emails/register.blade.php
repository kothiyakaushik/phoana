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
         	        <table style="text-align: left;">
         	            <tr>
         	                <th>Name</th>
         	                <td>: {{$data['data']->firstname.$data['data']->lastname}}</td>
         	            </tr>
         	            <tr>
         	                <th>Email</th>
         	                <td>: {{$data['data']->users->email}}</td>
         	            </tr>
         	            <tr>
         	                <th>Phone No</th>
         	                <td>: {{$data['data']->phone}}</td>
         	            </tr>
         	            <tr>
         	                <th>Address</th>
         	                <td>: {{$data['data']->address}}</td>
         	            </tr>
         	            <tr>
         	                <th>Zipcode</th>
         	                <td>: {{$data['data']->zipcode}}</td>
         	            </tr>
         	            <tr>
         	                <th>City</th>
         	                <td>: {{$data['data']->city}}</td>
         	            </tr>
         	            <tr>
         	                <th>Country</th>
         	                <td>: {{$data['data']->country}}</td>
         	            </tr>
         	        </table>
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
