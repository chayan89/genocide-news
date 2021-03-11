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
<section class="sec-padding">
      <div class="container">
        <div class="row">
          <div>
            <div id="js-filters-mosaic-flat" class="cbp-l-filters-buttonCenter">
              <?php
                if($categories){
                    ?>
                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All
                        <div class="cbp-filter-counter"></div>
                    </div>
                    <?php
                    foreach($categories as $value){
                        ?>
                            <div data-filter=".g-<?=$value->gallery_category_id ?>" class="cbp-filter-item"> <?= $value->name ?>
                                <div class="cbp-filter-counter"></div>
                             </div>
                        <?php
                    }
                }
              ?>
            </div>
            <div id="js-grid-mosaic-flat" class="cbp cbp-l-grid-mosaic-flat">
                <?php
                if($list){
                    foreach($list as $value){
                        ?>
                <div class="cbp-item g-<?=$value->gallery_category_id?> motion">
                    <a href="<?= base_url('uploads/thumbnail/'.$value->thumb_image) ?>" class="cbp-caption cbp-lightbox" data-title="Bolt UI<br>by Tiberiu Neamu">
                        <div class="cbp-caption-defaultWrap"> 
                            <img src="<?= base_url('uploads/thumbnail/'.$value->thumb_image) ?>" alt=""> 
                        </div>
                        <div class="cbp-caption-activeWrap">
                          <div class="cbp-l-caption-alignCenter">
                           
                          </div>
                        </div>
                    </a>
                </div>
                <?php
                    }
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="clearfix"></div>