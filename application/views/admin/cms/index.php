<section class="content">
	<div class="body_scroll">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-7 col-md-6 col-sm-12">
					<h2>Update CMS </h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="zmdi zmdi-home"></i> Genocide </a>
						</li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">CMS </a></li>
						<li class="breadcrumb-item active"> Update CMS</li>
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
							<h2><strong>Manage CMS </strong> </h2>
						</div>
						<div class="body">
							<form id="frmCMS" method="" action="" enctype="multipart/form-data">
								<label>Enter Tittle Name </label>
								<div class="form-group">
									<input type="text" id="title" name="title" title="title"  required class="form-control" placeholder="Enter title Name " value="">
								</div>
								<label> Description </label>
								<div class="form-group">
									<div class="summernote">
										Hello there,
										<br />
										<p>The toolbar can be customized and it also supports various callbacks such as
											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many
											more.</p>
										<p>Please try <b>paste some texts</b> here</p>
									</div>
								</div>
								<label style="color: #e47297;"> Upload Thumnail Image </label>
								<div class="form-group">
									<input type="file" name="thumb_image" id="thumb-image" class="dropify" required >
                                    <img src="" id="preview-thumb-image" width="200px">
								</div>

								<!--<label style="color: #e47297;"> Upload Gallery Image </label>-->
								<!--<div class="form-group">-->
								<!--	<input type="file" name="image" id="image" class="dropify" required>-->
								<!--</div>-->
                                <input type="hidden" name="cms_id" id="cms_id" value="">
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
								<h2>CMS Page List</h2>
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
                                                    <th>Page</th>
                                                    <th>Image</th>
                                                    <th>Title Name</th>
                                                    <th data-breakpoints="sm xs">Description</th>
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
  adminPage = "article";
  var id = '';
  var data = [];
  $(document).ready(function(){
    drawTable();

    $('#frmCMS').submit(function(e){
        e.preventDefault();
        let title = $('#title').val();
        if(title == ""){
            swalAlert('Article Title is required', 'warning');
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
            url: base_url + "cms/index/cmsPageSave",
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function() {
            },
            success: function(response) {  
                if(response.status.error_code == 0){
                  $('#title').val('');
                  $('.note-editable.panel-body').html('');
                  swalAlertThenRedirect(response.status.message, 'success', base_url+"cms");
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
      console.log(data);
      console.log(id);
      data.forEach( f =>{
          if(f.cms_id == id){
              console.log(f.title)
            $('#cms_id').val(id);
            $('#title').val(f.title);
            $('.note-editable.panel-body').html(f.description);
            $('#title').focus();
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
          url: base_url + "cms/index/get",
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