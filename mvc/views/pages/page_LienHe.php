 
<div class="container">   
    <div class="row">
        <div class="col py-md-5">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.232428814673!2d106.801619414727!3d10.869918392258159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527587e9ad5bf%3A0xafa66f9c8be3c91!2sUniversity%20of%20Information%20Technology%20VNU-HCM!5e0!3m2!1sen!2s!4v1593955090693!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> 
        </div>
        <div class="col py-md-5">
            <h4 class="sent-notification"></h4>
            <form id="myForm" method="post">
			<h2>Send an Email</h2>

			<label>Name</label>
			<input name="name" type="text" placeholder="Enter Name">
			<br><br>

			<label>Email</label>
			<input name="email" type="text" placeholder="Enter Email">
			<br><br>

			<label>Subject</label>
			<input name="subject" type="text" placeholder=" Enter Subject"> 
			<br><br>

			<p>Message</p>
                        <textarea name="message" rows="5" placeholder="Type Message"></textarea>
			<br><br>

                        <button class="btn btn-info" type="submit" onclick="sendEmail()" value="send">Submit</button> 
		</form>
        </div>         
    </div>
</div>
<?php
 if(isset($_POST['submit'])){
     echo '<prE>';
     print_r($_POST);
     
 }
     
 ?>