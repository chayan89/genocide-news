<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="">
<title> :: GENOCIDE - CAA, NPR, NRC :: </title>
<link rel="icon" href="<?= base_url('public/favicon.ico')?>" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="<?= base_url('public/admin/plugins/bootstrap/css/bootstrap.min.css')?>">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?= base_url('public/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')?>"/>
<link rel="stylesheet" href="<?= base_url('public/admin/plugins/charts-c3/plugin.css')?>"/>
<link rel="stylesheet" href="<?= base_url('public/admin/plugins/summernote/dist/summernote.css')?>"/>

<link rel="stylesheet" href="<?= base_url('public/admin/plugins/morrisjs/morris.min.css')?>" />
<!-- Bootstrap Tagsinput Css -->
<link rel="stylesheet" href="<?= base_url('public/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')?>">
<link rel="stylesheet" href="<?= base_url('public/admin/plugins/dropify/css/dropify.min.css')?>">
<link rel="stylesheet" href="<?= base_url('public/admin/simple-calendar.css')?>">
<!-- Custom Css -->
<link rel="stylesheet" href="<?= base_url('public/admin/css/style.min.css')?>">
<link rel="stylesheet" href="<?= base_url('public/sweetalert2.min.css') ?>">
<!-- Bootstrap core JavaScript-->
<!--<script src="<?=base_url('public/admin/')?>vendor/jquery/jquery.min.js"></script>-->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>

<script>
    var base_url = "<?=base_url('admin/')?>";
    var logo_url = "<?=base_url()?>";
    var adminPage = "";
</script>
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="<?= base_url('public/admin/images/loader.svg')?>" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.html"><img src="<?= base_url('public/admin/images/logo.png')?>" width="70" ><span class="m-l-10">  </span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" index.html><img src="<?= base_url('public/admin/images/profile_av.jpg')?>" alt="User"></a>
                    <div class="detail">
                        <h4> Admin </h4>
                        <small>Super Admin</small>                        
                    </div>
                </div>
            </li>
            <li class="active open"><a href="index.html"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="<?= base_url('admin/admin-profile')?>"><i class="zmdi zmdi-account"></i><span>Admin Profile </span></a></li>
           
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>NRC</span></a>
                <ul class="ml-menu">
                    <li><a href="<?= base_url('admin/nrc/category')?>">Category Management</a></li>
                     <li><a href="<?= base_url('admin/nrc/add-news')?>">NRC News </a></li>
                    <li><a href="<?= base_url('admin/nrc/news-list')?>">NRC List</a></li>
                </ul>
            </li>
             <li>
                 <a href="<?= base_url('admin/timeline')?>">
                    <i class="zmdi zmdi-time"></i><span>Timeline </span>
                </a>
            </li>
             <li><a href="<?= base_url('admin/article')?>"><i class="zmdi zmdi-collection-text"></i><span> Articles </span></a></li>
              <li><a href="<?= base_url('admin/video')?>"><i class="zmdi zmdi-collection-video"></i><span> Videos </span></a></li>
              <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-balance"></i><span>Legal</span></a>
                <ul class="ml-menu">
                    <li><a href="<?= base_url('admin/legal/category')?>">Add Legal Category</a></li>
                     <li><a href="<?= base_url('admin/legal/add-news')?>">Add Legal News </a></li>
                    <li><a href="<?= base_url('admin/legal/news-list')?>">Legal News List</a></li>
                    
                </ul>
            </li>

              <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-thumb-down"></i><span>Hate</span></a>
               <ul class="ml-menu">
                    <li><a href="<?= base_url('admin/hate/category')?>">Add Hate Category</a></li>
                     <li><a href="<?= base_url('admin/hate/add-news')?>">Add Hate News </a></li>
                    <li><a href="<?= base_url('admin/hate/news-list')?>">Hate News List</a></li>
                    
                </ul>
            </li>
              <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Other News</span></a>
                <ul class="ml-menu">
                    <li><a href="<?= base_url('admin/other/category')?>">Add Other Category</a></li>
                     <li><a href="<?= base_url('admin/other/add-news')?>">Add Other News </a></li>
                    <li><a href="<?= base_url('admin/other/news-list')?>">Other News List</a></li>
                    
                </ul>
            </li>
            <li>
                 <a href="<?= base_url('admin/news')?>">
                    <i class="zmdi zmdi-time"></i><span>News </span>
                </a>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Gallery</span></a>
                <ul class="ml-menu">
                    <li><a href="<?= base_url('admin/gallery/category')?>">Add Category</a></li>
                     <li><a href="<?= base_url('admin/gallery/index')?>">Add Gallery </a></li>
                    <li><a href="<?= base_url('admin/gallery/gallery-list')?>">Gallery List</a></li>
                    
                </ul>
            </li>
             <li><a href="<?= base_url('admin/cms/state')?>"><i class="zmdi zmdi-map"></i><span> Genocide Map / Metre </span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>CMS</span></a>
                <ul class="ml-menu">
                    <li><a href="<?= base_url('admin/cms')?>">CMS Pages</a></li>
                  <!--  <li><a href="<?= base_url('admin/cms/state')?>">Update Genocide Map / Metre </a></li> -->
                    
                </ul>
            </li>
            <li>
                 <a href="<?= base_url('admin/subscribe')?>">
                    <i class="zmdi zmdi-time"></i><span>Subscriber </span>
                </a>
            </li>
             <li><a href="#" class="logout" data-toggle="modal" data-target="#logoutModal"><i class="zmdi zmdi-power"></i><span>Logout </span></a></li>

        </ul>
    </div>
</aside>
<!-- End asside -->