<section class="sec-padding section-light sec-m-margin-1 <?= $for.'-head'?>">
	<div class="container">
		<h1 style="color: #fff; text-align: center; font-size: 25px; margin-bottom: 5px; line-height: 25px;">
			<?=isset($category)? $category[0]->name:ucwords($this->uri->segment(1))?> </h1>
		<h1 style="color: #f00; text-align: center;  font-size: 20px; margin-bottom: 10px; line-height: 25px;">
		     Stage: 1 of Genocide </h1>
		<p style="text-align: center; color: #fff;"> <?=isset($sub_title)? $sub_title:''?> </p>
	</div>
</section>
<div class="clearfix"></div>
<!-- end section -->

<section class="sec-padding section-light <?= $for.'-body'?>" >
	<div class="container">
		<div class="row">
			<!--Start col main-->
            <?php
                if($list){
                    foreach($list as $value){
                        if(array_key_exists('article_id', (array)$value)){
    			                $for = 'articles';
    			                $key = 'article_id';
                        }
                        else if(array_key_exists('genocide_news_id', (array)$value)){
    			                $for = 'other';
    			                $key = 'genocide_news_id';
                        }
                        else if(array_key_exists('nrc_news_id', (array)$value)){
    			                $for = 'nrc';
    			                $key = 'nrc_news_id';
                        }
                        else if(array_key_exists('legal_news_id', (array)$value)){
    			                $for = 'legal';
    			                $key = 'legal_news_id';
                        }
                        else if(array_key_exists('hate_news_id', (array)$value)){
    			                $for = 'hate';
    			                $key = 'hate_news_id';
                        }
                        else if(array_key_exists('video_id', (array)$value)){
    			                $for = 'videos';
    			                $key = 'video_id';
                        }
                        else if(array_key_exists('article_id', (array)$value)){
    			                $for = 'articles';
    			                $key = 'article_id';
                        }
                        else if(array_key_exists('news_id', (array)$value)){
    			                $for = 'news';
    			                $key = 'news_id';
                        }
                        ?>
                            <div class="col-md-3 col-sm-6 col-xs-12 <?= $for.'-content'?>">
                                <div class="bg2-featurebox-3">
                                    <div class="img-box">
                                     <a href="<?= base_url('details/'.$for.'/'.$value->$key)?>">   
                                     <img src="<?= base_url('uploads/thumbnail/'.$value->thumb_image) ?>" alt="" class="img-responsive" /> 
                                     </a>
                                     </div>
                                    <div class="postinfo-box">
                                        <h5 class="uppercase font-weight-5 less-mar-1"
                                            style="color: #cc0033; text-transform: capitalize; font-size: 15px; padding-left: 10px;">
                                            <?= $for=='articles' || $for=='videos' || $for=='news'?$value->title:$value->news_title?>
                                        </h5>

                                        <p style="padding-left: 10px; color: #ccc;">
                                        <?=substr(strip_tags($for=='articles' || $for=='videos' || $for=='news'?$value->description:$value->news_description), 0, 100)?>
                                        </p>
                                        <a class="btn btn-dark-3" href="<?= base_url('details/'.$for.'/'.$value->$key)?>"> Read More</a>
                                    </div>
                                </div>
                                <!--end post item-->
                            </div>
                        <?php
                    }
                }else{
                    echo '<div class="col-md-12 col-sm-12 col-xs-12">
                            <h5 class="text-center text-info">Sorry!! No Content available </h5>
                        </div>';
                }
            ?>
			<!--end col main-->
		</div>
	</div>
</section>