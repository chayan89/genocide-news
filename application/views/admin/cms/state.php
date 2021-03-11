<section class="content">
	<div class="body_scroll">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-7 col-md-6 col-sm-12">
					<h2>Update Genocide Map Tooltips </h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="zmdi zmdi-home"></i> Genocide </a>
						</li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">State </a></li>
						<li class="breadcrumb-item active"> Update Genocide Map Tooltips </li>
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
			<!-- Vertical Layout -->
			<div class="row clearfix">
			    <div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2><strong>Update Metre Value </strong> </h2>
						</div>
						<div class="body">
							<form id="frmScale" method="" action="" enctype="multipart/form-data">
								<label>Enter Metre Value </label>
								<div class="form-group">
									<input type="number" step=".1" min="0" max="10" id="scale" name="scale" title="scale"  required class="form-control" placeholder="Enter scale value " value="<?=$scale[0]->scale_value?>">
								</div>
								<button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Update
								</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="header">
							<h2><strong>Add  Genocide Map Tooltips </strong> </h2>
						</div>
						<div class="body">
							<form id="frmTooltips" method="" action="" enctype="multipart/form-data">
                                <label> Select State </label>
								<div class="form-group">
									<select name="state_id" id="state_id" required class="form-control show-tick ms select2"
										data-placeholder="Select">
                                        
                                        <option> -- Select State-- </option>
                                        <?php
                                            if($states){
                                                foreach($states as $value){
                                                    ?>
                                                        <option value="<?=$value->state_id?>"
                                                        <?= (isset($details) && $details->state_id == $value->state_id)?'selected':''?>
                                                        ><?=$value->state_name?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
									</select>
                                </div>
								<label>Enter  Genocide Map Tooltip </label>
								<div class="form-group">
									<input type="text" id="tooltip" name="tooltip" title="tooltip"  required class="form-control" placeholder="Enter title Name " value="">
								</div>
								<button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">SAVE
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- category list  -->

			<section class="container-fluid">
				<div class="body_scroll">
					<div class="block-header">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<h2>Video List</h2>
							</div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row clearfix">
							<div class="col-lg-12">
								<div class="card">
									<div class="table-responsive">
										<table class="table table-hover product_item_list c_table theme-color mb-0" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No</th>
                                                    <th>State</th>
                                                    <th> Genocide Map Tooltips</th>
                                                      <th data-breakpoints="sm xs">Status</th>
                                                   <th data-breakpoints="sm xs md">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
<script>
  adminPage = "stateTooltips";
  var id = '';
  var data = [];
  $(document).ready(function(){
    drawTable();

    $('#frmTooltips').submit(function(e){
        e.preventDefault();
        let title = $('#tooltip').val();
        if(title == ""){
            swalAlert('Video Title is required', 'warning');
            return false;
        }
        var fd = new FormData(this);
        $.ajax({
            type: "POST",
            url: base_url + "cms/state/tooltipSave",
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function() {
            },
            success: function(response) {  
                if(response.status.error_code == 0){
                  $('#state_id').val('');
                  $('#tooltip').val('');
                  $('.note-editable.panel-body').html('');
                  swalAlertThenRedirect(response.status.message, 'success', base_url+"cms/state");
                }else{
                    swalAlert(response.status.message, 'warning');
                }
            },
            error: function(response){
                swalAlert('Something wrong, try again', 'warning');
            } 
        });
    })
    
    
    //update home page scale value
    $('#frmScale').submit(function(e){
        e.preventDefault();
        let scale = $('#scale').val();
        if(scale == ""){
            swalAlert('Scale value is required', 'warning');
            return false;
        }
        var fd = new FormData(this);
        $.ajax({
            type: "POST",
            url: base_url + "cms/state/scaleSave",
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function() {
            },
            success: function(response) {  
                if(response.status.error_code == 0){
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

    $(document).on('click', '.edit-category', function(){
      $('#state_id').val($(this).data('id'));
      $('#tooltip').val($(this).data('tip'));
      $('#tooltip').focus();
    })
  })
  function drawTable(){
    let dataJson = {
      source: 'WEB'
    };
    $.ajax({
          type: "POST",
          url: base_url + "cms/state/get",
          data: JSON.stringify(dataJson),
          datType: 'JOSN',
          success: function(res) {
              if (res.status.error_code == 0) {
                //$("#dataTable").dataTable().fnDestroy();
                $('#dataTable tbody').empty();
                  data = res.data;                   
                  $('tbody').html('');
                  $('tbody').html(res.result);
                  $('#dataTable').DataTable({
                    bDestroy: true,
                    //order: [1, 'asc'],
                  });
              } else {
                  swalAlert(res.message, "warning");
              }
          },
      });
  }
</script>