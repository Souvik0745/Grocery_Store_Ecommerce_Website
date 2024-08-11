<?php
require('lrtop.php');
// Check if the user is already logged in
if (isset($_SESSION['USER_LOGIN'])) {
  // Redirect to the homepage or any other page
  header('Location: index.php');
  exit();
}
?>
<section class="section-background" style="display: flex; justify-content: center; align-items: center;">
  <div style="width: 100%; max-width: 768px; padding: 0 2.4rem; padding-top: 22px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 8px;">
    <div style="text-align: center; margin-bottom: 4rem;">
      <h2 style="font-size: 24px; font-weight: bold; margin: 2rem 0;">Register</h2>
    </div>
    <form class="register-form" id="register-form" method="post">
      <div style="margin-bottom: 20px;">
        <input type="text" name="name" id="name" placeholder="Your Name*" style="width: 100%; background-color: #e6e6e6; padding: 10px; border: 1px solid #eee; border-radius: 5px;">
        <span class="field_error" id="name_error" style="color: red; font-size: 12px;"></span>
      </div>
      <div style="margin-bottom: 20px;">
        <input type="text" name="email" id="email" placeholder="Your Email*" style="width: 100%; background-color: #e6e6e6; padding: 10px; border: 1px solid #eee; border-radius: 5px;">
        <span class="field_error" id="email_error" style="color: red; font-size: 12px;"></span>
      </div>
      <div style="margin-bottom: 20px;">
        <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width: 100%; background-color: #e6e6e6; padding: 10px; border: 1px solid #eee; border-radius: 5px;">
        <span class="field_error" id="mobile_error" style="color: red; font-size: 12px;"></span>
      </div>
      <div style="margin-bottom: 20px;">
        <input type="password" name="password" id="password" placeholder="Your Password*" style="width: 100%; background-color: #e6e6e6; padding: 10px; border: 1px solid #eee; border-radius: 5px;">
        <span class="field_error" id="password_error" style="color: red; font-size: 12px;"></span>
      </div>
      <div>
        <p>Already have an Account? <a href="login.php"> Login</a></p>
      </div>
      <div style="text-align: center; margin-top: 30px;">
        <button type="button" onclick="user_register()" class="btn">Register</button>
      </div>
    </form>
    <div class="form-output register_msg" style="margin-top: 20px;">
      <p class="form-messege field_error" style="color: red; font-size: 12px;"></p>
    </div>
  </div>
</section>
<script>
  function user_register() {
    jQuery('.field_error').html('');
    var name = jQuery("#name").val();
    var email = jQuery("#email").val();
    var mobile = jQuery("#mobile").val();
    var password = jQuery("#password").val();
    var is_error = '';
    if (name == "") {
      jQuery('#name_error').html('Please enter name!');
      is_error = 'yes';
    }
    if (email == "") {
      jQuery('#email_error').html('Please enter email!');
      is_error = 'yes';
    }
    if (mobile == "") {
      jQuery('#mobile_error').html('Please enter mobile!');
      is_error = 'yes';
    }
    if (password == "") {
      jQuery('#password_error').html('Please enter password!');
      is_error = 'yes';
    }
    if (is_error == '') {
      jQuery.ajax({
        url: 'register_submit.php',
        type: 'post',
        data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&password=' + password,
        success: function(result) {
          if (result == 'Email ID Already Exists!') {
            jQuery('#email_error').html('Try Another Email!');
          }
          if (result == 'You Have Registered Successfully! Please login!') {
            window.location.href = 'login.php';
          }
          alert(result);
        }
      });
    }
  }
</script>
</body>
</html>