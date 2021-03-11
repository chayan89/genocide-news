		<section class="sec-padding section-light sec-m-margin-1">
			<h1 style="color: #fff; margin-left: 11%;"> History / Timeline </h1>

			<center class="heading_1"> CAA-NRC-NPR </center>
			<section id="cd-timeline" class="cd-container">
                <?php
                    if($list){
                        foreach($list as $value){
                            ?>
                    <div class="cd-timeline-block">
                        <div class="cd-timeline-img cd-movie">
                        </div> <!-- cd-timeline-img -->

                        <div class="cd-timeline-content">
                            <h2> <?=$value->timeline_title?> </h2>
                            <p class="subtitle"><?=$value->timeline_sub_title?></p>
                            <?=$value->timeline_description?>
                            <span class="cd-date"><?=$value->timeline_year?></span>
                        </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->
                <?php
                        }
                    }
                ?>
			</section> <!-- cd-timeline -->
		</section>
		<div class="clearfix"></div>
		<!-- end section -->
		<div class="clearfix"></div>
		<!-- end section -->