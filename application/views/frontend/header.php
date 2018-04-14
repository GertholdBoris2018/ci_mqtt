<!DOCTYPE HTML>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
    <title>MQTT</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="<?php echo FRONTEND_CSS_PATH;?>bootstrap.min.css">
    <link rel='stylesheet prefetch' href='<?php echo FRONTEND_CSS_PATH;?>font-awesome.css'>
    <script src="<?php echo FRONTEND_JS_PATH;?>jquery.min.js"></script>
    <script src="<?php echo FRONTEND_JS_PATH;?>bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo FRONTEND_CSS_PATH;?>normalize.css">
    <link rel="stylesheet" href="<?php echo FRONTEND_CSS_PATH;?>layout.css">
    <link rel="stylesheet" href="<?php echo FRONTEND_CSS_PATH;?>style.css">
    <link rel="stylesheet" href="<?php echo FRONTEND_CSS_PATH;?>slicknav.css">
    <script src="<?php echo ADMIN_PLUGINS_PATH;?>modernizr/modernizr.js"></script>
    <!--[if lte IE 8]><script src="<?php echo FRONTEND_JS_PATH;?>html5shiv.js"></script><![endif]-->

    <!-- <link type="text/css" rel="stylesheet" href="<?php echo FRONTEND_CSS_PATH;?>materialize.min.css"  media="screen,projection"/> -->
    
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>a
    <![endif]-->
    <script type="text/javascript" src="<?php echo FRONTEND_JS_PATH;?>jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo FRONTEND_JS_PATH;?>jquery.mixitup.min.js"></script>
    <script src="<?php echo ADMIN_PLUGINS_PATH;?>jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo ADMIN_JS_PATH;?>forms/examples.validation.js"></script>
    <script type="text/javascript">
        $(function () {
            <?php
                if(isset($categories)){
                    $cates = array();
                    foreach($categories as $ca){
                        array_push($cates,'.'.$ca->title);
                    }
                    $cates_string = implode(",",$cates);
                    ?>
                    var filterList = {

                        init: function () {

                            // MixItUp plugin
                            // http://mixitup.io
                            $('#portfoliolist').mixItUp({
                                selectors: {
                                    target: '.portfolio',
                                    filter: '.filter'
                                },
                                load: {
                                    filter: '<?php echo $cates_string;?>'
                                }
                            });

                        }

                    };

                    // Run the show!
                    filterList.init();
            <?php
                }
            ?>



        });
        function show_msg(type,msg){
            $("#message").html('<div class="alert alert-'+type+'">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                '<strong>'+type+'!</strong> '+msg+'</div>')
            window.setTimeout(function () { $("#message").html(''); }, 2000);
        }

    </script>

    <script src="<?php echo FRONTEND_JS_PATH;?>protfolio.js"></script>
    <script src="<?php echo FRONTEND_JS_PATH;?>skel.min.js"></script>
    <script src="<?php echo FRONTEND_JS_PATH;?>skel-layers.min.js"></script>
    <script src="<?php echo FRONTEND_JS_PATH;?>init.js"></script>
    <script src="<?php echo FRONTEND_JS_PATH;?>jquery.slicknav.min.js"></script>
    <script src="<?php echo FRONTEND_JS_PATH;?>bootstrap-notify.min.js"></script>
   
    <noscript>
        <link rel="stylesheet" href="<?php echo FRONTEND_CSS_PATH;?>skel.css" />
        <link rel="stylesheet" href="<?php echo FRONTEND_CSS_PATH;?>style.css" />
        <link rel="stylesheet" href="<?php echo FRONTEND_CSS_PATH;?>protfolio.css" />
        <link rel="stylesheet" href="<?php echo FRONTEND_CSS_PATH;?>style-xlarge.css" />

    </noscript>
    <!-- <script type="text/javascript" src="<?php echo FRONTEND_JS_PATH;?>materialize.min.js"></script> -->
</head>
<body id="top">

<!-- Header -->
<header id="header" class="skel-layers-fixed">
    <a href="<?php echo base_url();?>frontend/welcome"><img class="logo-brand" src="<?php echo FRONTEND_IMAGES_PATH;?>logo.png" alt=""/></a>
    <nav id="nav">
        <ul>
            <?php
                if(count($devices) == 0 && !$this->session->userdata('isCustomerlogin')){
                    ?>
                    <li class="<?php echo isset($selected) && $selected == 'about'?'active':'';?>"><a href="<?php echo base_url();?>frontend/about"><?php echo lang('top_about');?></a></li>
                    <li class="<?php echo isset($selected) && $selected == 'home'?'active':'';?>"><a href="<?php echo base_url();?>frontend/welcome"><?php echo lang('top_home');?></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo lang('top_more');?></a>
                        <ul class="dropdown-menu">
                            <li class="padding-no"><a style='font-size:1em;' href="<?php echo base_url();?>frontend/pages/help"><?php echo lang('top_help');?></a></li>
                        </ul>
                    </li>
                    <li class="<?php echo isset($selected) && $selected == 'login'?'active':'';?>"><a href="<?php echo base_url();?>frontend/login"><?php echo lang('top_login');?></a></li>
                <?php
                }
                else {
                    ?>
                    <li class="<?php echo isset($selected) && $selected == 'about'?'active':'';?>"><a href="<?php echo base_url();?>frontend/about"><?php echo lang('top_about');?></a></li>
                    <li class="<?php echo isset($selected) && $selected == 'home'?'active':'';?>"><a href="<?php echo base_url();?>frontend/welcome"><?php echo lang('top_home');?></a></li>
                    <li class="<?php echo isset($selected) && $selected == 'wifi'?'active':'';?>"><a href="#"><?php echo lang('top_wifi');?></a></li>
                    <li class="<?php echo isset($selected) && $selected == 'others'?'active':'';?>"><a href="#"><?php echo lang('top_other_devices');?></a></li>
                    <li class="<?php echo isset($selected) && $selected == 'content'?'active':'';?>"><a href="#"><?php echo lang('top_content_management');?></a></li>
                    <li class="<?php echo isset($selected) && $selected == 'devices'?'active':'';?>"><a href="#"><?php echo lang('top_devices_on_network');?></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo lang('top_more');?></a>
                        <ul class="dropdown-menu">
                            <li class="padding-no"><a style='font-size:1em;' href="<?php echo base_url();?>frontend/pages/help"><?php echo lang('top_help');?></a></li>
                            <li class="padding-no"><a style='font-size:1em;' href="#"><?php echo lang('top_settings');?></a></li>
                            <li class="padding-no"><a style='font-size:1em;' href="#"><?php echo lang('top_manage_wifi');?></a></li>
                        </ul>
                    </li>
                <?php
                }
            ?>
        </ul>
    </nav>
    <ul id="mobilemenu">
        <?php
            if(count($devices) == 0 && !$this->session->userdata('isCustomerlogin')){
                ?>
                <li><a href="<?php echo base_url();?>frontend/about"><?php echo lang('top_about');?></a></li>
                <li><a href="<?php echo base_url();?>frontend/welcome"><?php echo lang('top_home');?></a></li>
                <li>
                    <?php echo lang('top_more');?>
                    <ul>
                        <li class="padding-no">
                            <a style='font-size:1em;' href="<?php echo base_url();?>frontend/pages/help"><?php echo lang('top_help');?></a>
                        </li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url();?>frontend/login"><?php echo lang('top_login');?></a></li>
                <?php
            }
            else{
                ?>
                <li><a href="<?php echo base_url();?>frontend/about"><?php echo lang('top_about');?></a></li>
                <li><a href="<?php echo base_url();?>frontend/welcome"><?php echo lang('top_home');?></a></li>
                <li><a href="#"><?php echo lang('top_wifi');?></a></li>
                <li><a href="#"><?php echo lang('top_other_devices');?></a></li>
                <li><a href="#"><?php echo lang('top_content_management');?></a></li>
                <li><a href="#"><?php echo lang('top_devices_on_network');?></a></li>
                <li>
                    <?php echo lang('top_more');?>
                    <ul>
                        <li class="padding-no">
                            <a style='font-size:1em;' href="<?php echo base_url();?>frontend/pages/help"><?php echo lang('top_help');?></a>
                        </li>
                        <li class="padding-no"><a style='font-size:1em;' href="#"><?php echo lang('top_settings');?></a></li>
                        <li class="padding-no"><a style='font-size:1em;' href="#"><?php echo lang('top_manage_wifi');?></a></li>
                    </ul>
                </li>
        <?php
            }
            ?>
    </ul>
    <script>
        $(function(){
            $('#mobilemenu').slicknav({
                'label' : ''
            });
        });
    </script>
</header>