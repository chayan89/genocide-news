<section class="content">
	<div class="body_scroll">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-7 col-md-6 col-sm-12">
					<h2>Subscriber List </h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="zmdi zmdi-home"></i> Genocide </a>
						</li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Subscriber List </a></li>
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

		<section class="container-fluid">
				<div class="body_scroll">
					<div class="block-header">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<h2>Subscriber List</h2>
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
                                                    <th>Email</th>
                                                    <th>Date</th>
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
  adminPage = "subscriber";
  var id = '';
  var data = [];
  $(document).ready(function(){
    drawTable();
  })
  function drawTable(){
    let dataJson = {
      source: 'WEB'
    };
    $.ajax({
          type: "POST",
          url: base_url + "subscribe/index/get",
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