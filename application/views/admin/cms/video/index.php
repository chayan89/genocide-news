<section class="content">
	<div class="body_scroll">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-7 col-md-6 col-sm-12">
					<h2>Add Video </h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="zmdi zmdi-home"></i> Genocide </a>
						</li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Video </a></li>
						<li class="breadcrumb-item active"> Add Video</li>
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
							<h2><strong>Add Video </strong> </h2>
						</div>
						<div class="body">
							<form id="frmVideo" method="" action="" enctype="multipart/form-data">
							    <label> Select Country </label>
								<div class="form-group">
									<select name="country_id" id="country_id" required class="form-control show-tick ms select2"
										data-placeholder="Select">
                                        <option> -- Select Country-- </option>
                                        <option value="1"> India </option>
									</select>
                                </div>
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
								<label>Enter Tittle Name </label>
								<div class="form-group">
									<input type="text" id="" name="title" title="title"  required class="form-control" placeholder="Enter title Name " value="<?= isset($details)?$details->title:''?>">
								</div>
								<label> Description </label>
								<div class="form-group">
									<div class="summernote">
                                        <?php
                                        if(isset($details)){
                                            echo $details->description;
                                        }else{
                                        ?>
										Hello there,
										<br />
										<p>The toolbar can be customized and it also supports various callbacks such as
											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many
											more.</p>
										<p>Please try <b>paste some texts</b> here</p>
                                        <?php
                                        }
                                        ?>
									</div>
								</div>
								<label> Add Tags </label>
								<div class="form-group" style="border: 1px #ccc solid;">
									<div class="form-line">
										<input type="text" name="tags" class="form-control" data-role="tagsinput"
                                        value="<?= isset($details) ? $details->tags : 'NRC, CAC'?>">
									</div>
								</div>
								<label style="color: #e47297;"> Upload Thumnail Image </label>
								<div class="form-group">
									<input type="file" name="thumb_image" id="thumb-image" class="dropify" <?= isset($details) ? '' : 'required'?> >
                                    <img src="<?=isset($details)? base_url('uploads/thumbnail/'.$details->thumb_image):''?>" id="preview-thumb-image" width="200px">
								</div>

								<label style="color: #e47297;"> Upload Gallery video </label>
								<div class="form-group">
									<input type="file" name="video" class="dropify" <?= isset($details) ? '' : 'required'?>>
								</div>
                                <input type="hidden" name="video_id" value="">
								<!--<a href="<?= base_url('admin/article') ?>" class="btn btn-raised btn-info btn-round waves-effect">Back</a>-->
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
                                                    <th>Image</th>
                                                    <th>Title Name</th>
                                                    <th data-breakpoints="sm xs">Description</th>
                                                      <th data-breakpoints="sm xs">Date</th>
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
  adminPage = "video";
  var id = '';
  var data = [];
  $(document).ready(function(){
    drawTable();

    $('#frmVideo').submit(function(e){
        e.preventDefault();
        let title = $('#title').val();
        if(title == ""){
            swalAlert('Video Title is required', 'warning');
            return false;
        }
        if($('.note-editable.panel-body').html().trim() == ""){
            swalAlert('Description is required', 'warning');
            return false;
        }
        var fd = new FormData(this);
        fd.append("description", $('.note-editable.panel-body').html());
        $.ajax({
            type: "POST",
            url: base_url + "video/index/videoSave",
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function() {
            },
            success: function(response) {  
                if(response.status.error_code == 0){
                  $('#year').val('');
                  $('#title').val('');
                  $('#sub_title').val('');
                  $('.note-editable.panel-body').html('');
                  swalAlertThenRedirect(response.status.message, 'success', base_url+"video");
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
      id = $(this).data('id');
      data.forEach( f =>{
          if(f.article_id == id){
            $('#article_id').val(id);
            $('#article_year').val(f.article_year);
            $('#article_title').val(f.article_title);
            $('#article_sub_title').val(f.article_sub_title);
            $('.note-editable.panel-body').html(f.article_description);
            $('#article_year').focus();
          }
      })
    })
  })
  function drawTable(){
    let dataJson = {
      source: 'WEB'
    };
    $.ajax({
          type: "POST",
          url: base_url + "video/index/get",
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