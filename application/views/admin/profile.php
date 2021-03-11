<section class="content">
	<div class="body_scroll">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-7 col-md-6 col-sm-12">
					<h2>Update admin profile </h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="zmdi zmdi-home"></i> Genocide </a>
						</li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Admin </a></li>
						<li class="breadcrumb-item active"> Profile</li>
					</ul>
					<button class="btn btn-primary btn-icon mobile_menu" type="button"><i
							class="zmdi zmdi-sort-amount-desc"></i></button>
				</div>
				<div class="col-lg-5 col-md-6 col-sm-12">
					<button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
							class="zmdi zmdi-arrow-right"></i></button>
				</div>
			</div>
		</div>

 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong> Change </strong> Password </h2>
                        </div>
                        <form name="" id="frmChangePassword" method="" action="">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <input type="password" minlength="6" id="old_password" name="old_password" class="form-control" placeholder="Current Password" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <input type="password" minlength="6" id="new_password" name="new_password" class="form-control" placeholder="New Password" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <input type="password" minlength="6" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-info btn-update-password">Update Password</button>
                                    </div>                            
                                </div>                              
                            </div>
                        </form>    
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Profile </strong> Settings</h2>
                        </div>
                        <div class="body">
                            <form name="" id="frmProfile" method="" action="">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="fname" placeholder="Profile Name" value="<?= $this->admin->fname ?>" required>
                                        </div>
                                    </div>                       
                                    <!-- <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="City">
                                        </div>
                                    </div> -->
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" placeholder="E-mail" value="<?= $this->admin->email ?>" required>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Country">
                                        </div>
                                    </div> -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea rows="4" class="form-control no-resize" name="address" placeholder="Address Line 1" ><?= $this->admin->address ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-update-password">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
  adminPage = "adminProfile";
  $(document).ready(function(){

    $('#frmChangePassword').submit(function(e){
        e.preventDefault();
        if($('#new_password').val().trim() != $('#confirm_password').val().trim() ){
            $('#new_password').focus();
            swalAlert('Password & confirm password are not matched', 'warning');
            return false;
        }
        var fd = new FormData(this);
        $.ajax({
            type: "POST",
            url: base_url + "dashboard/passwordSave",
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function() {
            },
            success: function(response) {  
                if(response.status.error_code == 0){
                  $('#frmChangePassword input').val('');
                  swalAlert(response.status.message, 'success');
                }else{
                    $('#old_password').focus();
                    swalAlert(response.status.message, 'warning');
                }
            },
            error: function(response){
                swalAlert('Something wrong, try again', 'warning');
            } 
        });
    })

    $('#frmProfile').submit(function(e){
        e.preventDefault();
        
        var fd = new FormData(this);
        $.ajax({
            type: "POST",
            url: base_url + "dashboard/profileSave",
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function() {
            },
            success: function(response) {  
                if(response.status.error_code == 0){
                  //$('#frmProfile input').val('');
                  swalAlert(response.status.message, 'success');
                }else{
                    swalAlert(response.status.message, 'warning');
                }
            },
            error: function(response){
                swalAlert('Something wrong, try again', 'warning');
            } 
        });
    })    
  })
</script>