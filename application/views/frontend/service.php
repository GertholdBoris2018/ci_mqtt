<!-- Banner -->
<section id="banner1">
    <div class="inner">
        <h2>MUNKÁINK!</h2>
        <hr class="row1">
        <p>Lorem ipsum dolor sit amet, consectetur<br> adipisicing elit, sed do eiusmoma</p>

    </div>
</section>


<!----- Filter Portfolio--------->
<div class="container" style="margin-bottom:30px;">

    <ul id="filters" class="clearfix">

        <li><span class="filter active" data-filter="<?php
            if(isset($categories)){
                $cates = array();
                foreach($categories as $ca){
                    array_push($cates,'.'.$ca->title);
                }
                $cates_string = implode(",",$cates);
            }
            echo $cates_string;?>">All</span></li>
        <?php
        foreach($categories as $ca){
            ?>
            <li><span class="filter" data-filter=".<?php echo $ca->title;?>"><?php echo $ca->title;?></span></li>
            <?php
        }
        ?>
    </ul>

    <div id="portfoliolist">
        <?php
        foreach($portfolios as $pt){
            $category_id = $pt->category_id;
            $str_temp = str_replace(",","",$category_id);
            ?>
            <div class="portfolio <?php echo $str_temp;?>" data-cat="<?php echo $str_temp;?>">
                <div class="portfolio-wrapper">
                    <img src="<?php echo IMAGE_UPLOAD_PATH.$pt->item_image;?>" alt="" />
                    <div class="label">
                        <div class="label-text">
                            <a class="text-title"><?php echo $pt->title;?></a>
                            <span class="text-category"><?php echo $str_temp;?></span>
                            <a href="<?php echo base_url();?>frontend/service/portfolio/<?php echo $pt->port_id;?>"><img src="<?php echo FRONTEND_IMAGES_PATH;?>port_link.png" style="width:50px; top:15px;"/></a>
                        </div>
                        <div class="label-bg"></div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
   <!-- <div class="col-md-offset-6">
        <button type="button" class="mb-xs mt-xs mr-xs btn btn-custom">Show More</button>
    </div>-->
</div>
</ul>

<!-- end-->