<div class="container">
    <div class="col-md-6">
        <br><h1><b><?php echo $portfolio[0]->title;?></b></h1>
        <hr class="row1">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <?php
                $key = 1;
                foreach ($subimages as $subimage) {
                    ?>
                    <li data-target="#myCarousel" data-slide-to="<?php echo $key;?>"></li>
                    <?php
                    $key++;
                }
                ?>

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <?php
                        $item_image = $portfolio[0]->item_image;
                        ?>
                    <img src="<?php echo IMAGE_UPLOAD_PATH.$item_image;?>" width="460" height="345">
                </div>
                <?php
                    foreach ($subimages as $subimage) {
                        ?>
                        <div class="item">
                            <img src="<?php echo IMAGE_UPLOAD_PATH.$subimage->item_url;?>" width="460" height="345">
                        </div>
                <?php
                    }
                ?>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
    <div class="col-md-6">
        <br>
        <br>
        <h3><b><br>Description</br></b></h3>
        <?php echo $portfolio[0]->content;?>

        <br><h3><b>Category</b></h3>
        <p><?php echo $portfolio[0]->category_id;?></p>


    </div>
</div>
</div>
<br>
<br><br><br>

