<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="javascript:void(0)" id="btn-logout">Logout</a> </div>
    </div>
  </div>
</div>
<!-- Jquery Core Js --> 
<script src="<?= base_url('public/admin/bundles/libscripts.bundle.js') ?>"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="<?= base_url('public/admin/bundles/vendorscripts.bundle.js') ?>"></script> <!-- slimscroll, waves Scripts Plugin Js -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="<?= base_url('public/admin/bundles/jvectormap.bundle.js') ?>"></script> <!-- JVectorMap Plugin Js -->
<script src="<?= base_url('public/admin/bundles/sparkline.bundle.js') ?>"></script> <!-- Sparkline Plugin Js -->
<script src="<?= base_url('public/admin/bundles/c3.bundle.js') ?>"></script>

<script src="<?= base_url('public/admin/bundles/mainscripts.bundle.js') ?>"></script>
<script src="<?= base_url('public/admin/js/pages/index.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('public/sweetalert2.all.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('public/common-function.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('public/custom.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('public/chosen.jquery.js') ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="<?= base_url('public/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')?>"></script> <!-- Bootstrap Tags Input Plugin Js --> 
<!-- <script src="<?= base_url('public/admin/js/pages/forms/dropify.js')?>"></script> -->
<script src="<?= base_url('public/admin/plugins/summernote/dist/summernote.js')?>"></script>

<!--loader-->

<script>
$(document)
  .ajaxStart(function () {
    $('.page-loader-wrapper').fadeIn();
  })
  .ajaxStop(function () {
      setTimeout(function(){
          $('.page-loader-wrapper').fadeOut();
      }, 50);
  });
</script>
<!-- Global session flashdata message -->
<?php
  if($this->session->flashdata('success')){
    ?>
      <script>
          swalAlert("<?=$this->session->flashdata('success')?>", 'success');
      </script>
    <?php
  }

  if($this->session->flashdata('error')){
    ?>
      <script>
          swalAlert("<?=$this->session->flashdata('error')?>", 'warning');
      </script>
    <?php
  }
?>
<!-- Logout  -->
<script>
  $(document).ready(function(){
    $('#btn-logout').on('click', function(){
      let jsonData = {
        'source': 'WEB'
      }
      console.log('test');
      $.ajax({
			type: "POST",
			url: "<?=base_url('logout')?>",
            data: JSON.stringify(jsonData),            
			success: function(response) {     
				if(response.status.error_code == 0){
                    $('#logoutModal').toggle('modal');
                    swalAlert(response.status.message, 'success');
                    setTimeout(function(){
								  window.location.href = "<?=base_url('admin')?>";
                    }, 2500);
				}else{
					swalAlert(response.status.message, 'warning');
				}
			},
			error: function(response){
				swalAlert('Something wrong, try again', 'warning');
			} 
		});
    })
    $(document).on("click", ".change-p-status", function(e) {
    e.preventDefault();
    var status = $(this).attr("data-status");
    Swal.fire({
        title: "Are you sure want to do this ?",
        type: "warning",
        showCancelButton: true, // true or false  
        confirmButtonColor: "#dd6b55",
        cancelButtonColor: "#48cab2",
        confirmButtonText: "Yes !!!", 
    }).then((result) => {
        if (result.value) { 
            let id = $(this).attr("data-id");
            let indexKey = $(this).attr("data-key-id");
            let table = $(this).attr("data-table");
            let dataJson = {
                id: id,
                indexKey: indexKey,
                table: table,
                status: status,
            };
            if (id && table) {
                $.ajax({
                    type: "POST",
                    url: base_url + "change-status",
                    data: JSON.stringify(dataJson),
                    success: function(res) {
                        if (res.status.error_code == 0) {
                            if (status == 3) {
                                swalAlert("Data deleted successfully", "success");
                                setTimeout(function(){
                                  location.reload();
                                  //drawTable();
                                }, 2000);
                            } else { 
                                if (status == 0) {
                                    $("#" + id).attr("data-status", "1"); 
                                    $("#" + id).removeClass("text-success");
                                    $("#" + id).addClass("text-danger");
                                    $("#" + id).html("Inactive");
                                } else {
                                    $("#" + id).attr("data-status", "0");
                                    $("#" + id).removeClass("text-danger");
                                    $("#" + id).addClass("text-success");
                                    $("#" + id).html("Active");
                                }
                                swalAlert(res.status.message, "success");
                            }
                        } else {
                            swalAlert(res.status.message, "warning");
                        }
                    },
                });
            }
        }
    });
});

  })
</script>
</body>
</html>
