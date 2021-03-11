<section class="content">
  <div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Add OTHER Category </h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="zmdi zmdi-home"></i> Genocide </a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">NRC </a></li>
                    <li class="breadcrumb-item active"> Add OTHER Category</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Add NRC Category </strong> </h2>
                    </div>
                    <div class="body">
                        <form id="frmNrcCategory" method="" action="">
                            <label for="email_address">Enter Category Name </label>
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter category Name" required>
                            </div>
                            <label for="password"> Category Sub Title</label>
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Category Sub Title">
                            </div>

                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">SAVE </button>
                        </form>
                    </div>
                </div>
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
                    <h2>NRC Category List</h2>

                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover product_item_list c_table theme-color mb-0">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Category Name</th>
                                        <th data-breakpoints="sm xs">Sub title</th>
                                        <th data-breakpoints="sm xs md">Status</th>
                                        <th data-breakpoints="sm xs md">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <h5>CAA </h5>
                                        </td>
                                        <td><span class="text-muted">Citizenship Amedment Act</span></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a>
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
  adminPage = "nrcCategory";
  var id = '';
  $(document).ready(function(){
    drawTable();

    $('#frmNrcCategory').submit(function(e){
        e.preventDefault();
        let name = $('#name').val().trim();
        let title = $('#title').val();
        if(name == ""){
            swalAlert('Category Name is required', 'warning');
            return false;
        }
        let jsonData = {
            name: name,
            title: title,
            id: id,
            source: 'WEB'
        };
        $.ajax({
            type: "POST",
            url: base_url + "other/category/categorySave",
            data: JSON.stringify(jsonData),
            beforeSend: function() {
            },
            success: function(response) {
              console.log(response);           
                if(response.status.error_code == 0){
                  $('#name').val('');
                  $('#title').val('');
                  swalAlert(response.status.message, 'success');
                  drawTable();
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
      $('#name').val($(this).data('name'));
      $('#title').val($(this).data('title'));
      id = $(this).data('id');
      $('#name').focus();
    })
  })
  function drawTable(){
    let dataJson = {
      source: 'WEB'
    };
    $.ajax({
          type: "POST",
          url: base_url + "other/category/get",
          data: JSON.stringify(dataJson),
          datType: 'JOSN',
          success: function(res) {
              if (res.status.error_code == 0) {                      
                  $('tbody').html('');
                  $('tbody').html(res.result);
                  $('#dataTable1').DataTable({
                    //destroy: true,
                    //order: [1, 'asc'],
                  });
              } else {
                  swalAlert(res.message, "warning");
              }
          },
      });
  }
</script>