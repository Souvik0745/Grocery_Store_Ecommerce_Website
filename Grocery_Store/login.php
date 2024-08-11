<?php 
require('lrtop.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>
<section class="section-background" style="display: flex; justify-content: center; align-items: center;">
    <div style="width: 100%; max-width: 400px; padding: 0 2.4rem; padding-top: 22px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 8px;">
        <div style="text-align: center; margin-bottom: 20px;">
            <h2 style="font-size: 24px; font-weight: bold; margin: 1rem 0; margin-bottom: 3rem;">Login</h2>
        </div>
        <form class="login-form" id="login-form" method="post" style="width: 100%;">
            <div style="margin-bottom: 20px;">
                <input type="text" name="login_email" id="login_email" placeholder="Your Email*" style="width: 100%; background-color: #e6e6e6; padding: 10px; border: 1px solid #eee; border-radius: 4px;">
                <span class="field_error" id="login_email_error" style="color: red; font-size: 12px;"></span>
            </div>
            <div style="margin-bottom: 20px;">
                <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width: 100%; background-color: #e6e6e6; padding: 10px; border: 1px solid #eee; border-radius: 4px;">
                <span class="field_error" id="login_password_error" style="color: red; font-size: 12px;"></span>
            </div>
			<div>
				<p>Don't have an Account? <a href="register.php"> Create Now</a></p>
			</div>
            <div style="text-align: center;">
                <button type="button" onclick="user_login()" class="btn">Login</button>
            </div>
        </form>
        <div class="form-output login_msg" style="margin-top: 2.5rem; padding-bottom: 1rem;">
            <p class="form-messege field_error" style="color: red; font-size: 12px;"></p>
        </div>
    </div>
</section> 
<script>
	function user_login(){
	jQuery('.field_error').html('');
	var email=jQuery("#login_email").val();
	var password=jQuery("#login_password").val();
	var is_error='';
	if(email==""){
		jQuery('#login_email_error').html('Please enter email!');
		is_error='yes';
	}if(password==""){
		jQuery('#login_password_error').html('Please enter password!');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'login_submit.php',
			type:'post',
			data:'email='+email+'&password='+password,
			success:function(result){
				if(result=='wrong'){
					jQuery('.login_msg p').html('Please enter valid login details!');
				}
				if(result=='valid'){
					window.location.href='index.php';
				}
			}	
		});
	}	
}
</script> 
</body>
</html>    