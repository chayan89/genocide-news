<section class="content">
    <div class="body_scroll">
        <div class="block-header">
             <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2> Gallery List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="zmdi zmdi-home"></i> Genocide </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Gallery List </a></li>
                        <li class="breadcrumb-item active"> Gallery </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover nrc_news_list c_table theme-color mb-0" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th data-breakpoints="sm xs">Name</th>
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
    $(document).ready(function(){
        drawTable();
    })
    function drawTable(){
        let dataJson = {
        source: 'WEB'
        };
        $.ajax({
            type: "POST",
            url: base_url + "gallery/Gallery/get",
            data: JSON.stringify(dataJson),
            datType: 'JOSN',
            success: function(res) {
                if (res.status.error_code == 0) {                      
                    $('tbody').html('');
                    $('tbody').html(res.result);
                    $('#datatable').DataTable({
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