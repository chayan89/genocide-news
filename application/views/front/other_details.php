<section class="sec-padding section-light sec-m-margin-1">
	<div class="container">
		<h1 style="color: #fff; text-align: center; font-size: 25px; margin-bottom: 5px; line-height: 25px;">
			CLASSIFICATION </h1>
		<h1 style="color: #f00; text-align: center;  font-size: 20px; margin-bottom: 10px; line-height: 25px;"> Stage: 1
			of Genocide </h1>
		<p style="text-align: center; color: #fff;"> People are divided into "them and us" </p>
	</div>
</section>
<div class="clearfix"></div>
<!-- end section -->
<section class="section-light">
    <div class="container">
    <h4 style="color: #fff;"><?= $list->title ?></h4>
        <div class="row">
            <div class="col-md-12">
                <?php
                    if($for == 'article' || $for=='news') {
                        ?>
                        <img src="<?= base_url('uploads/thumbnail/'.$list->thumb_image) ?>" style="margin-bottom: 2em; width: 800px"> 
                        <?php
                    }else{
                        ?>
                        <video width="320" height="240" controls>
                          <source src="<?= base_url('uploads/videos/'.$list->video) ?>" type="video/mp4">
                        </video>
                        <?php
                    }
                ?>
            </div>
            <div class="col-md-12"> <p style="text-align: justify; color: #fff;"> 
                <?= $list->description ?>
            </div>
        </div>
    </div>
</section>