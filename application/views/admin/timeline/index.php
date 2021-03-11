<section class="content">
	<div class="body_scroll">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-7 col-md-6 col-sm-12">
					<h2>Add Timeline </h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="zmdi zmdi-home"></i> Genocide </a>
						</li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Timeline </a></li>
						<li class="breadcrumb-item active"> Add Timeline</li>
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
							<h2><strong>Add Timeline </strong> </h2>
						</div>
						<div class="body">
							<form id="frmTimeline" method="" action="">
								<label> Enter Year </label>
								<div class="form-group">
									<input type="text" id="timeline_year" name="timeline_year" required class="form-control" placeholder="Enter year ex:2016 ">
								</div>
								<label> Enter Title</label>
								<div class="form-group">
									<input type="text" id="timeline_title" name="timeline_title"class="form-control"
										placeholder="Enter  Title ex:10th December 2019." required>
								</div>
								<label> Enter Sub Title</label>
								<div class="form-group">
									<input type="text" id="timeline_sub_title" name="timeline_sub_title" class="form-control"
										placeholder="Enter Sub Title ex:USCIRF RECOMMENDATION.">
								</div>

								<label> Add Short Description </label>
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
                                <input type="hidden" name="timeline_id" id="timeline_id"  value="">
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
								<h2>Timeline List</h2>
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
													<th>Year </th>
													<th data-breakpoints="sm xs"> Title</th>
													<th data-breakpoints="sm xs">Sub title</th>
													<th data-breakpoints="sm xs">Date</th>
													<th data-breakpoints="sm xs">Description</th>
													<th data-breakpoints="sm xs">Status</th>
													<th data-breakpoints="sm xs md">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>
														<h5>2016 </h5>
													</td>
													<td> 12 December 2016 </td>
													<td><span class="text-muted"> SIGNED BY PRESIDENT OF INDIA </span>
													</td>
													<td> 25/05/2021 </td>
													<td><span class="text-muted"> Lorem ipsum dolor.. </span></td>

													<td><a href="javascript:void(0);"
															class="btn btn-default waves-effect waves-float btn-sm waves-green"><i
																class="zmdi zmdi-edit"></i></a>
														<a href="javascript:void(0);"
															class="btn btn-default waves-effect waves-float btn-sm waves-red"><i
																class="zmdi zmdi-delete"></i></a>
													</td>
												</tr>
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
  adminPage = "timeline";
  var id = '';
  var data = [];
  $(document).ready(function(){
    drawTable();

    $('#frmTimeline').submit(function(e){
        e.preventDefault();
        let year = $('#timeline_year').val().trim();
        let title = $('#timeline_title').val();
        if(year == ""){
            swalAlert('Timeline Year is required', 'warning');
            return false;
        }
        if(title == ""){
            swalAlert('Timeline Title is required', 'warning');
            return false;
        }
        if($('.note-editable.panel-body').html().trim() == ""){
            swalAlert('Description is required', 'warning');
            return false;
        }
        var fd = new FormData(this);
        fd.append("timeline_description", $('.note-editable.panel-body').html());
        $.ajax({
            type: "POST",
            url: base_url + "timeline/index/timelineSave",
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
                  swalAlertThenRedirect(response.status.message, 'success', base_url+"timeline");
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
          if(f.timeline_id == id){
            $('#timeline_id').val(id);
            $('#timeline_year').val(f.timeline_year);
            $('#timeline_title').val(f.timeline_title);
            $('#timeline_sub_title').val(f.timeline_sub_title);
            $('.note-editable.panel-body').html(f.timeline_description);
            $('#timeline_year').focus();
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
          url: base_url + "timeline/index/get",
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