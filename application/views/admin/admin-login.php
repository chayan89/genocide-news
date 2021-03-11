<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="GENOCIDE - CAA, NPR, NRC">

<title>:: GENOCIDE - CAA, NPR, NRC :: </title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="<?= base_url('public/admin/plugins/bootstrap/css/bootstrap.min.css')?>">
<link rel="stylesheet" href="<?= base_url('public/admin/css/style.min.css')?>">
<link rel="stylesheet" href="<?= base_url('public/sweetalert2.min.css') ?>">

<style>
    #frmVerifyOTP .form-control {
      display: inline-block;
      width: 19%;
      padding: 5px 35px;
      font-size: 25px;
    }
</style>
</head>

<body class="theme-blush">

<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form class="card auth_form" id="frm-admin-login" action="" method=""> 
                    <div class="header">
                        <img class="logo" src="<?= base_url('public/admin/images/logo.png')?>" alt="">
                        <h5> Admin Login</h5>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="user-email" placeholder="Username">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password-field" placeholder="Password">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>                            
                        </div>
                        <!--<div class="checkbox">-->
                        <!--    <input id="remember_me" type="checkbox">-->
                        <!--    <label for="remember_me">Remember Me</label>-->
                        <!--</div>-->
                        <!-- <a href="javascript:void(0)" class="btn btn-primary btn-block waves-effect waves-light"> SUBMIT </a> -->
                        <button type="submit" id="btn-admin-login" class="btn btn-primary btn-block waves-effect waves-light"> SUBMIT </button>
                       
                    </div>
                </form>
               
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="<?= base_url('public/admin/images/signin.svg')?>" alt="Sign In"/>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Login verify-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> VERIFY YOURSELF PLEASE  </h4>
      </div>
        <form id="frmVerifyOTP">
          <div class="modal-body">
            <label class="input-group-addon" id="basic-addon1"> Enter the 5 Digits Code sent to your e-mail </label>
            <div class="from-group">
              <input type="text" id="otp1" name="otp1" class="form-control" placeholder="" aria-describedby="basic-addon1" required>
              <input type="text" id="otp2" name="otp2" class="form-control" placeholder="" aria-describedby="basic-addon1" required>
              <input type="text" id="otp3" name="otp3" class="form-control" placeholder="" aria-describedby="basic-addon1" required>
              <input type="text" id="otp4" name="otp4" class="form-control" placeholder="" aria-describedby="basic-addon1" required>
              <input type="text" id="otp5" name="otp5" class="form-control" placeholder="" aria-describedby="basic-addon1" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary check-otp"> Verify </button>
          </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Jquery Core Js -->
<script src="<?= base_url('public/admin/bundles/libscripts.bundle.js')?>"></script>
<script src="<?= base_url('public/admin/bundles/vendorscripts.bundle.js')?>"></script> <!-- Lib Scripts Plugin Js -->

<script type="text/javascript" src="<?= base_url('public/sweetalert2.all.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('public/common-function.js') ?>"></script>
  <!-- login request -->
  <script type="text/javascript">
  var otp = '';
    $('#frm-admin-login').submit(function(e){
        e.preventDefault();
        let email = $('#user-email').val();
        let password = $('#password-field').val();
        if(email == ""){
            swalAlert('User email is required', 'warning');
            return false;
        }

        if(password == ""){
            swalAlert('Password is required', 'warning');
            return false;
        }
        let jsonData = {
            email: email,
            password: password,
            source: 'WEB'
        };
        $.ajax({
            type: "POST",
            url: "<?=base_url('login')?>",
            data: JSON.stringify(jsonData),
            beforeSend: function() {
              $('#btn-admin-login').attr('value', 'wait...');
              $('#btn-admin-login').attr('disabled', true);
            },
            success: function(response) {
              console.log(response);           
              $('#btn-admin-login').attr('value', 'Login');
              $('#btn-admin-login').attr('disabled', false);
                if(response.status.error_code == 0){
                    //window.location.href = "<?=base_url('admin/dashboard')?>";
                    otp = response.result.otp;
                    $('#myModal').modal('show');
                    swalAlert('Please confirm authentication by verifying OTP', 'warning');
                }else{
                    swalAlert(response.status.message, 'warning');
                }
            },
            error: function(response){
                swalAlert('Something wrong, try again', 'warning');
            } 
        });
    })
    
    
    $('#frmVerifyOTP input').on('keyup', function(){
        let v = $(this).val();
        if(isNaN(v)){
            $(this).val('');
        }
        if(v > 9){
            $(this).val($(this).val().substr($(this).val().length-1, 1));
        }
    })
    
    $('.check-otp').on('click', function(){
        let input_otp = $('#otp1').val();
        input_otp = input_otp+$('#otp2').val();
        input_otp = input_otp+$('#otp3').val();
        input_otp = input_otp+$('#otp4').val();
        input_otp = input_otp+$('#otp5').val();
        if(input_otp != otp){
            swalAlert('Sorry!! OTP not verified successfully', 'warning');
            return false;
        }
        let jsonData = {
            source: 'WEB'
        };
        $.ajax({
            type: "POST",
            url: "<?=base_url('login-success')?>",
            data: JSON.stringify(jsonData),
            beforeSend: function() {
              $('#btn-admin-login').attr('value', 'wait...');
              $('#btn-admin-login').attr('disabled', true);
            },
            success: function(response) {    
                if(response.status.error_code == 0){
                    $('#otp').val('');
                    $('#myModal').modal('hide');
                    swalAlertThenRedirect('OTP Verified successfully', 'success', "<?=base_url('admin/dashboard')?>");
                }else{
                    swalAlert(response.status.message, 'warning');
                }
            },
            error: function(response){
                swalAlert('Something wrong, try again', 'warning');
            } 
        });
    })
  </script>
  <script>
  	$(".toggle-password").click(function() {
      $(this).toggleClass("fa-eye-slash fa-eye");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  </script>
</body>
</html>