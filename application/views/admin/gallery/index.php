<section class="content">
	<div class="body_scroll">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-7 col-md-6 col-sm-12">
					<h2><?=isset($details)?'Edit':'Add'?> Gallery News </h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="zmdi zmdi-home"></i> Genocide </a>
						</li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Gallery News </a></li>
						<li class="breadcrumb-item active"> <?=isset($details)?'Edit':'Add'?> Gallery News</li>
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
							<h2><strong><?=isset($details)?'Edit':'Add'?> Gallery News </strong> </h2>
						</div>
						<div class="body">
							<form id="frmGalleryNews" method="" action="" enctype="multipart/form-data">
								<label> Select Category</label>
								<div class="form-group">
									<select class="form-control show-tick ms select2" data-placeholder="Select" name="gallery_category_id" id="gallery_category_id" required>
                                        <option value=""> -- Select Category -- </option>
                                        <?php
                                            if($gallery_categories){
                                                foreach($gallery_categories as $value){
                                                    ?>
                                                        <option value="<?=$value->gallery_category_id?>"
                                                        <?= (isset($details) && $details->gallery_category_id == $value->gallery_category_id)?'selected':''?>
                                                        ><?=$value->name?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
									</select>
								</div>
								<label>Enter Tittle Name </label>
								<div class="form-group">
									<input type="text" id="" name="name" title="name"  class="form-control" placeholder="Enter title Name " value="<?= isset($details)?$details->name:''?>">
								</div>
								<label style="color: #e47297;"> Upload Thumnail Image </label>
								<div class="form-group">
									<input type="file" name="thumb_image" id="thumb-image" class="dropify" <?= isset($details) ? '' : 'required'?> >
                                    <img src="<?=isset($details)? base_url('uploads/thumbnail/'.$details->thumb_image):''?>" id="preview-thumb-image" width="200px">
								</div>

								<label style="color: #e47297;"> Upload Gallery Images(Multiple)/Video  </label>
								<div class="form-group">
									<input type="file" name="file" id="image" class="dropify" <?= isset($details) ? '' : 'required'?>>
                                    <!-- <img src="" id="preview-image" width="200px"> -->
								</div>
                                <input type="hidden" name="gallery_id" value="<?= isset($details) ? $details->gallery_id : ''?>">
								<a href="<?= base_url('admin/gallery/gallery-list') ?>" class="btn btn-raised btn-info btn-round waves-effect">Back</a>
								<button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">SAVE
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
<script>
   $(document).ready(function () {
	function readURL(input, previewElement) {
      if(input.files[0]['type']== 'image/jpg' || input.files[0]['type']== 'image/jpeg' || input.files[0]['type']== 'image/gif' || input.files[0]['type'] == 'image/png'){
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            //$('.image-section').show();
            $(previewElement).attr('src', e.target.result);
            $(previewElement).show();
          }
          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
      else{
        $("#image").val('');
            $('.image-section').hide();
        swalAlert('Please select a valid image', 'warning');
        return false;
      }
	}

    $("#thumb-image").change(function () {
        readURL(this, '#preview-thumb-image');
    });
    // $("#image").change(function () {
    // 	readURL(this, '#preview-image');
    // });

    $('#frmGalleryNews').submit(function(e){
        e.preventDefault();
        if($('#gallery_category_id').val() == ""){
            swalAlert('Category is required', 'warning');
            return false;
        }
        
        var fd = new FormData(this);
        $.ajax({
            type: "POST",
            url: base_url + "gallery/Gallery/gallerySave",
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function() {
            },
            success: function(response) {
              console.log(response);           
                if(response.status.error_code == 0){
                    swalAlertThenRedirect(response.status.message, 'success', base_url+"gallery/gallery-list");
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