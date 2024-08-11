<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>
<section style="margin-top: 75px; padding: 50px 0; background-color: #b603fc;">
    <div style="width: 90%; max-width: 1200px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
            <!-- Profile Section -->
            <div style="flex: 1; min-width: 300px; margin: 10px;">
                <div style="padding: 20px; background-color: #f1f1f1; border-radius: 10px;">
                    <div style="margin-bottom: 20px;">
                        <h2 style="font-size: 24px; font-weight: bold; color: #333; margin-bottom: 10px;">Profile</h2>
                    </div>
                    <form id="login-form" method="post">
                        <div style="margin-bottom: 20px;">
						<label for="name" style="display: block; margin-bottom: 5px; color: #333; font-size: 14px;">Name</label>
                            <input type="text" name="name" id="name" placeholder="Your Name*" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" value="<?php echo $_SESSION['USER_NAME'] ?>">
                            <span class="field_error" id="name_error" style="color: red; font-size: 12px;"></span>
                        </div>
                        <div style="text-align: right;">
                            <button type="button" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;" onclick="update_profile()" id="btn_submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password Section -->
            <div style="flex: 1; min-width: 300px; margin: 10px;">
                <div style="padding: 20px; background-color: #f1f1f1; border-radius: 10px;">
                    <div style="margin-bottom: 20px;">
                        <h2 style="font-size: 24px; font-weight: bold; color: #333; margin-bottom: 10px;">Change Password</h2>
                    </div>
                    <form method="post" id="frmPassword">
                        <div style="margin-bottom: 20px;">
                            <label for="current_password" style="display: block; margin-bottom: 5px; color: #333; font-size: 14px;">Current Password</label>
                            <input type="password" name="current_password" id="current_password" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            <span class="field_error" id="current_password_error" style="color: red; font-size: 12px;"></span>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <label for="new_password" style="display: block; margin-bottom: 5px; color: #333; font-size: 14px;">New Password</label>
                            <input type="password" name="new_password" id="new_password" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            <span class="field_error" id="new_password_error" style="color: red; font-size: 12px;"></span>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <label for="confirm_new_password" style="display: block; margin-bottom: 5px; color: #333; font-size: 14px;">Confirm New Password</label>
                            <input type="password" name="confirm_new_password" id="confirm_new_password" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            <span class="field_error" id="confirm_new_password_error" style="color: red; font-size: 12px;"></span>
                        </div>
                        <div style="text-align: right;">
                            <button type="button" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;" onclick="update_password()" id="btn_update_password">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

		<script>
		function update_profile(){
			jQuery('.field_error').html('');
			var name=jQuery('#name').val();
			if(name==''){
				jQuery('#name_error').html('Please enter your name!');
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'update_profile.php',
					type:'post',
					data:'name='+name,
					success:function(result){
						jQuery('#name_error').html(result);
						jQuery('#btn_submit').html('Update');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}
		
		function update_password(){
			jQuery('.field_error').html('');
			var current_password=jQuery('#current_password').val();
			var new_password=jQuery('#new_password').val();
			var confirm_new_password=jQuery('#confirm_new_password').val();
			var is_error='';
			if(current_password==''){
				jQuery('#current_password_error').html('Please enter password!');
				is_error='yes';
			}if(new_password==''){
				jQuery('#new_password_error').html('Please enter new password!');
				is_error='yes';
			}if(confirm_new_password==''){
				jQuery('#confirm_new_password_error').html('Please confirm your password!');
				is_error='yes';
			}
			
			if(new_password!='' && confirm_new_password!='' && new_password!=confirm_new_password){
				jQuery('#confirm_new_password_error').html('Please enter same password!');
				is_error='yes';
			}
			
			if(is_error==''){
				jQuery('#btn_update_password').html('Please wait...');
				jQuery('#btn_update_password').attr('disabled',true);
				jQuery.ajax({
					url:'update_password.php',
					type:'post',
					data:'current_password='+current_password+'&new_password='+new_password,
					success:function(result){
						jQuery('#current_password_error').html(result);
						jQuery('#btn_update_password').html('Update');
						jQuery('#btn_update_password').attr('disabled',false);
						jQuery('#frmPassword')[0].reset();
					}
				})
			}
		}
		</script>
<?php require('footer.php')?>       