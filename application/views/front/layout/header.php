<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> GENOCIDE - CAA, NPR, NRC </title>
	<meta name="keywords" content="" />
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Mobile view -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link rel="shortcut icon" href="">
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/front/js/bootstrap/bootstrap.min.css')?>">
	<!-- Google fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Yesteryear" rel="stylesheet">
	<!-- Template's stylesheets -->
	<link rel="stylesheet" href="<?= base_url('public/front/js/megamenu/stylesheets/screen.css')?>">
	<link rel="stylesheet" href="<?= base_url('public/front/css/theme-default.css')?>" type="text/css">
	<link rel="stylesheet" href="<?= base_url('public/front/js/loaders/stylesheets/screen.css')?>">
	<link rel="stylesheet" href="<?= base_url('public/front/css/bar.css')?>" type="text/css">
	<link rel="stylesheet" href="<?= base_url('public/front/fonts/font-awesome/css/font-awesome.min.css')?>"
		type="text/css">
	<link rel="stylesheet"
		type="<?= base_url('public/front/text/css" href="fonts/Simple-Line-Icons-Webfont/simple-line-icons.css')?>"
		media="screen" />
	<link rel="stylesheet" href="<?= base_url('public/front/fonts/et-line-font/et-line-font.css')?>">
	<link rel="stylesheet" type="<?= base_url('public/front/text/css" href="js/revolution-slider/css/settings.css')?>">
	<link rel="stylesheet" type="<?= base_url('public/front/text/css" href="js/revolution-slider/css/layers.css')?>">
	<link rel="stylesheet"
		type="<?= base_url('public/front/text/css" href="js/revolution-slider/css/navigation.css')?>">
	<link href="<?= base_url('public/front/js/owl-carousel/owl.carousel.css')?>" rel="stylesheet">
	<link href="<?= base_url('public/front/js/owl-carousel/owl.theme.css')?>" rel="stylesheet">
    
    <!--Slider-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/front/js/revolution-slider/css/settings.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/front/js/revolution-slider/css/layers.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/front/js/revolution-slider/css/navigation.css')?>">

    <!--UI-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <!--gallery-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/front/js/cubeportfolio/cubeportfolio.min.css')?>">
    
	<!-- Custom Css -->
	<link rel="stylesheet" href="<?= base_url('public/sweetalert2.min.css') ?>">
	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('public/front/js/jquery/jquery.js')?>"></script>
	<!-- Template's stylesheets END -->
	<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--UI JS-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<link rel="stylesheet/less" type="text/css" href="<?= base_url('public/front/less/skin.less')?>">
	<!-- Skin stylesheet -->
	<!--UI Script-->
	<script>
	    var scale_val = 0.0;
	    var date = '';
      $( function() {
        //$( document ).tooltip();
      } );
  </script>
  <?php
    if(isset($scale) && !empty($scale)){
        ?>
            <script>
                scale_val = "<?=$scale[0]->scale_value?>";
                date = "<?=date('m-d-Y', strtotime($scale[0]->updated_at))?>";
          </script>
        <?php
    }
  ?>
</head>

<body>
	<!-- left corner menu -->
	<div class="menu-wrap">
		<input type="checkbox" class="toggler" />
		<img src="<?= base_url('public/front/images/10-StagesGenocide.png')?>"
			style=" margin-left:3em; margin-top: 2.5em;">
		<div class="hamburger_new">
			<div></div>
		</div>
		<div class="menu">
			<div>
				<ul>
					<li><a href="<?= base_url('cms/overview')?>">Overview</a></li>
					<?php
                    if($other_list){
                        foreach($other_list as $list){
                            ?>
                            <li> 
                                <a href="<?= base_url('other/'.$list->genocide_categorie_id) ?>"> <?=strtoupper($list->name)?></a> 
                            </li>
                            <?php
                        }
                    }
                    ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- left corner menu end here -->
	<div class="over-loader loader-live">
		<div class="loader">
			<div class="loader-item style4">
				<div class="cube1"></div>
				<div class="cube2"></div>
			</div>
		</div>
	</div>
	<!--end loading-->
	<div class="over-loader loader-live">
		<div class="loader">
			<div class="loader-item style4">
				<div class="cube1"></div>
				<div class="cube2"></div>
			</div>
		</div>
	</div>
	<!--end loading-->
	<div class="wrapper-boxed">
		<div class="site-wrapper">
			<div class="col-md-12 nopadding">
				<div class="header-section style1 pin-style">
					<div class="container">
						<div class="mod-menu">
							<div class="row">
								<div class="col-sm-2"> <a href="<?= base_url() ?>" title="" class="logo mar-4"> <img
											src="<?= base_url('public/front/images/logo.png')?>" alt=""> </a> </div>
								<div class="col-sm-10">
									<div class="main-nav" style="margin-top: 3em;">
										<ul class="nav navbar-nav top-nav">
											<!--  <li class="search-parent"> <a href="javascript:void(0)" title=""><i aria-hidden="true" class="fa fa-search"></i></a>
                      <div class="search-box">
                        <div class="content">
                          <div class="form-control">
                            <input type="text" placeholder="Type to search" />
                            <a href="#" class="search-btn"><i aria-hidden="true" class="fa fa-search"></i></a> </div>
                          <a href="#" class="close-btn">x</a> </div>
                      </div>
                    </li> -->
											<li class="visible-xs menu-icon"> <a href="javascript:void(0)"
													class="navbar-toggle collapsed" data-toggle="collapse"
													data-target="#menu" aria-expanded="false"> <i aria-hidden="true"
														class="fa fa-bars"></i> </a> </li>
										</ul>
										<button
											style=" float: right; background: #000;border: 0px;color: #fff; height: 25px;">
											Submit </button>
										<input type="text" name=""
											style="background-color: #e58099; border: 0px; padding-left: 4px; color: #fff; float: right;">
										<div id="menu" class="collapse">

											<ul class="nav navbar-nav">
												<li> <a href="<?= base_url() ?>">Home</a> </li>

												<li> <a href="#">NRC</a>
												<span class="arrow"></span>
													<ul class="dm-align-2">
                                                        <?php
                                                        if($nrc_list){
                                                            foreach($nrc_list as $list){
                                                                ?>
                                                                <li> 
                                                                    <a href="<?= base_url('nrc/'.$list->nrc_categorie_id) ?>"> <?=strtoupper($list->name)?>
                                                                    <br>
                                                                    <span
                                                                        style=" font-size: 10px;color: #888;font-weight: normal;">
                                                                        <?=ucwords($list->title)?>
                                                                    </span></a> 
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
													</ul>
												</li>
												<li> <a href="<?= base_url('timeline')?>">Timeline</a> </li>
												<li> <a href="<?= base_url('article') ?>">Articles</a> </li>
												<li> <a href="<?= base_url('video') ?>">Videos</a> </li>
												<li> <a href="#">Legal</a>
													<span class="arrow"></span>
													<ul class="dm-align-2">
                                                        <?php
                                                        if($legal_list){
                                                            foreach($legal_list as $list){
                                                                ?>
                                                                <li> 
                                                                    <a href="<?= base_url('legal/'.$list->legal_categorie_id) ?>"> <?=strtoupper($list->name)?>
                                                                    <br>
                                                                    <span
                                                                        style=" font-size: 10px;color: #888;font-weight: normal;">
                                                                        <?=ucwords($list->title)?>
                                                                    </span></a> 
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
													</ul>
												</li>
												<li> <a href="">Hate</a> <span class="arrow"></span>
														<ul class="dm-align-2">
                                                        <?php
                                                        if($hate_list){
                                                            foreach($hate_list as $list){
                                                                ?>
                                                                <li> 
                                                                    <a href="<?= base_url('hate/'.$list->hate_categorie_id) ?>"> <?=strtoupper($list->name)?>
                                                                    <br>
                                                                    <span
                                                                        style=" font-size: 10px;color: #888;font-weight: normal;">
                                                                        <?=ucwords($list->title)?>
                                                                    </span></a> 
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
													</ul>

												</li>


											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end menu-->

			</div>
			<!--end menu-->

			<div class="clearfix"></div>

			<div class="clearfix"></div>
			<!-- END OF SLIDER WRAPPER -->