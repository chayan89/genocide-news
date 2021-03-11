<section class="content">
	<div class="body_scroll">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-7 col-md-6 col-sm-12">
					<h2><?=isset($details)?'Edit':'Add'?> Hate News </h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url('admin')?>"><i class="zmdi zmdi-home"></i> Genocide </a>
						</li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Hate News </a></li>
						<li class="breadcrumb-item active"> <?=isset($details)?'Edit':'Add'?> Hate News</li>
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
							<h2><strong><?=isset($details)?'Edit':'Add'?> Hate News </strong> </h2>
						</div>
						<div class="body">
							<form id="frmHateNews" method="" action="" enctype="multipart/form-data">
								<label> Select Category</label>
								<div class="form-group">
									<select class="form-control show-tick ms select2" data-placeholder="Select" name="hate_categorie_id" id="hate_categorie_id" required>
                                        <option value=""> -- Select Category -- </option>
                                        <?php
                                            if($hate_categories){
                                                foreach($hate_categories as $value){
                                                    ?>
                                                        <option value="<?=$value->hate_categorie_id?>"
                                                        <?= (isset($details) && $details->hate_categorie_id == $value->hate_categorie_id)?'selected':''?>
                                                        ><?=$value->name?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
									</select>
								</div>
								<label>Enter Tittle Name </label>
								<div class="form-group">
									<input type="text" id="" name="news_title" title="news_title"  required class="form-control" placeholder="Enter title Name " value="<?= isset($details)?$details->news_title:''?>">
								</div>
								<label> Description </label>
								<div class="form-group">
									<div class="summernote">
                                        <?php
                                        if(isset($details)){
                                            echo $details->news_description;
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

								<label> <strong>Genocide Details </strong> </label>
								<br>
								<label>Stage of the Genocide</label> <br>
								<label style="color: #e47297;">Current Stage is : <?= isset($details) ? $details->stage.'.'.$details->sub_stage : '6.8' ?> </label>
								<div class="form-group">
                                    <select name="stage" id="stage" required class="form-control show-tick ms select2"
                                            data-placeholder="Select">
                                        <?php
                                            for($i = 1; $i <= 10; $i++){
                                                ?>
                                                <option value="<?=$i?>"
                                                    <?= (isset($details) && $details->stage == $i)?'selected':''?>
                                                ><?=$i?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
								</div>
								<label>Sub Stages</label>

								<div class="form-group">
                                    <select name="sub_stage" id="sub_stage" required class="form-control show-tick ms select2"
                                            data-placeholder="Select">
                                        <?php
                                            for($i = 1; $i <= 10; $i++){
                                                ?>
                                                <option value="<?=$i?>"
                                                    <?= (isset($details) && $details->sub_stage == $i)?'selected':''?>
                                                ><?=$i?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
								</div>
								<label>Update the Gencode Percentage </label> <br>
								<label style="color: #e47297;">Current Percentage is : <?= isset($details) ? (int)$details->gencode_percentage : '97' ?>% </label>
								<div class="form-group">
									<input type="text" id="" class="form-control"
										placeholder="Enter Percentage. ex : 90% " name="gencode_percentage" value="<?= isset($details) ? (int)$details->gencode_percentage : ''?>">
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

								<label style="color: #e47297;"> Upload Gallery Images (Multiple) </label>
								<div class="form-group">
									<input type="file" name="image[]" multiple id="image" class="dropify" <?= isset($details) ? '' : 'required'?>>
                                    <!-- <img src="" id="preview-image" width="200px"> -->
								</div>
                                <input type="hidden" name="hate_news_id" value="<?= isset($details) ? $details->hate_news_id : ''?>">
								<a href="<?= base_url('admin/hate/news-list') ?>" class="btn btn-raised btn-info btn-round waves-effect">Back</a>
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

    $('#frmHateNews').submit(function(e){
        e.preventDefault();
        if($('#hate_categorie_id').val() == ""){
            swalAlert('Category is required', 'warning');
            return false;
        }
        if($('#news_title').val() == ""){
            swalAlert('News Title is required', 'warning');
            return false;
        }
        if($('#state_id').val() == ""){
            swalAlert('State is required', 'warning');
            return false;
        }
        
        var fd = new FormData(this);
        fd.append("news_description", $('.note-editable.panel-body').html());
        $.ajax({
            type: "POST",
            url: base_url + "hate/news/hateSave",
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function() {
            },
            success: function(response) {
              console.log(response);           
                if(response.status.error_code == 0){
                    swalAlertThenRedirect(response.status.message, 'success', base_url+"hate/news-list");
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