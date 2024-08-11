document.addEventListener("DOMContentLoaded", function () {
  const navLinks = document.querySelectorAll(".navlink");
  const currentPath = window.location.pathname.split('/').pop();

  navLinks.forEach(link => {
    if (link.getAttribute('href') === currentPath) {
      link.classList.add('active');
    }
  });
});
let sections = document.querySelectorAll('section');
window.onscroll = () => {
  searchForm.classList.remove('active');
  navbar.classList.remove('active');
};

let searchForm = document.querySelector('.search-form');
document.querySelector('#search-btn').onclick = () => {
  searchForm.classList.toggle('active');
  navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');
document.querySelector('#menu-btn').onclick = () => {
  navbar.classList.toggle('active');
  searchForm.classList.remove('active');
}

function send_message() {
  var email = document.getElementById('email').value;
  var mobile = document.getElementById('mobile').value;
  var message = document.getElementById('message').value;
  if (email === "") {
    alert('Please enter email!');
    return;
  } else if (mobile === "") {
    alert('Please enter mobile no.!');
    return;
  } else if (message === "") {
    alert('Please enter message!');
    return;
  } else {
    $.ajax({
      url: 'query.php',
      type: 'post',
      data: 'email=' + email + '&mobile=' + mobile + '&message=' + message,
      success: function (result) {
        document.getElementById('email').value = '';
        document.getElementById('mobile').value = '';
        document.getElementById('message').value = '';
        alert(result);
      }
    });
  }
}
function user_register(){
	jQuery('.field_error').html('');
	var name=jQuery("#name").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var password=jQuery("#password").val();
	var is_error='';
	if(name==""){
		jQuery('#name_error').html('Please enter name!');
		is_error='yes';
	}if(email==""){
		jQuery('#email_error').html('Please enter email!');
		is_error='yes';
	}if(mobile==""){
		jQuery('#mobile_error').html('Please enter mobile!');
		is_error='yes';
	}if(password==""){
		jQuery('#password_error').html('Please enter password!');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'register_submit.php',
			type:'post',
			data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password,
			success:function(result){
				if(result=='Email ID Already Exists!'){
					jQuery('#email_error').html('Try Another Email!');
				}
				if(result=='You Have Registered Successfully! Please login!'){
					window.location.href='login.php';
				}
				alert(result);
			}	
		});
	}
	
}
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
					window.location.href=window.location.href;
				}
			}	
		});
	}	
}
function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href=window.location.href;
			}
			else{
				alert("Product is added to the cart!");
			}
			jQuery('.sh_cart').html(result);
		}	
	});	
}
function sort_product_drop(cat_id,site_path){
	var sort_product_id=jQuery('#sort_product_id').val();
	window.location.href=site_path+"categories.php?id="+cat_id+"&sort="+sort_product_id;
}