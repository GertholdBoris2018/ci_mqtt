<section class="body">
    <?php   $this->load->view('admin/topnav');  ?>
    <div class="inner-wrapper">
        <?php   $data['sidebar'] = array('main'=>ADMIN_SIDEBAR_PORT,'sub' => !isset($portfolio)? ADMIN_SIDEBAR_PORT_PORTSADD:ADMIN_SIDEBAR_PORT_PORTSED) ;$this->load->view('admin/leftside',$data);  ?>

        <section role="main" class="content-body">
            <header class="page-header">
                <h2><?php echo !isset($portfolio)?lang('side_cts_8'):lang('side_cts_16');?></h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="<?php echo base_url();?>admin/dashboard">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span><?php echo lang('side_cts_6');?></span></li>
                        <li><span><?php echo !isset($portfolio)?lang('side_cts_8'):lang('side_cts_16');?></span></li>
                    </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                    <h2 class="panel-title"><?php echo !isset($portfolio)?lang('side_cts_8'):lang('side_cts_16');?></h2>
                </header>
                <div class="panel-body">
                    <form id="form" class="form-horizontal form-bordered" method="post" action="<?php echo base_url();?>admin/portfolios/<?php echo !isset($portfolio)?'add_port':'edit_port/'.$portfolio[0]->port_id;?>" enctype="multipart/form-data">
                        <input type="hidden" name="content" id="content" value=""/>
                        <input type="hidden" name="catechks" id="catechks" value=""/>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault" ><?php echo lang('side_cts_7');?> <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="title" class="form-control" id="inputDefault" value="<?php echo !isset($portfolio)?'':$portfolio[0]->title;?>"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo lang('side_cts_10');?></label>
                            <div class="col-md-9">
                                <div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'><?php echo !isset($portfolio)?'':$portfolio[0]->content;?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo lang('side_cts_11');?></label>
                            <div id='sel_cat' class="col-md-9" style="margin-top:10px;">
                                <?php
                                foreach($categories as $category){

                                    ?>
                                    <div class="checkbox-custom checkbox-default">
                                        <input type="checkbox" class="cate_check" id="<?php echo $category->title;?>">
                                        <label for="<?php echo $category->title;?>"><?php echo $category->title;?></label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo lang('side_cts_12');?></label>
                            <div class="col-md-9">
                                <div class="switch switch-sm switch-primary">
                                    <input type="checkbox" name="isfeatured" data-plugin-ios-switch <?php echo (isset($portfolio))?$portfolio[0]->is_featured == 'Y'?'checked="checked"':'':'checked="checked"';?> />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo lang('side_cts_9');?></label>
                            <div class="col-md-4">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <i class="fa fa-file fileupload-exists"></i>
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-exists">Change</span>
                                            <span class="fileupload-new">Select file</span>
                                            <input name='file[]' type="file" />
                                        </span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                                <button id='add_subfiles' type="button" class="mb-xs mt-xs mr-xs btn btn-default" onclick="javascript:add_subfile_field();"><i class="fa fa-plus"></i> Add</button>
                            </div>

                            <div  class="col-md-6">
                                <?php
                                if(isset($portfolio)){
                                    ?>
                                    <img src="<?php echo base_url();?>assets/upload/<?php echo $portfolio[0]->item_image;?>" style="width:100px;"/>
                                    <?php
                                    foreach($subimages as $subfile){
                                        ?>
                                        <img src="<?php echo base_url();?>assets/upload/<?php echo $subfile->item_url;?>" style="width:100px;"/>
                                <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault"><?php echo lang('side_cts_13');?></label>
                            <div class="col-md-6">
                                <input  name="item_url" type="text" class="form-control" id="inputDefault" value="<?php echo isset($portfolio)?$portfolio[0]->item_url:'';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault">
                                <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary"><?php echo lang('side_cts_14');?></button>
                            </label>
                        </div>

                    </form>
                </div>
            </section>
            <!-- end: page -->
        </section>
    </div>
    <?php   $this->load->view('admin/rightside');  ?>
</section>
<script type="text/javascript">
    function add_subfile_field(){
        $("#add_subfiles").before("<div class='fileupload fileupload-new' data-provides='fileupload' style='position: relative;'>" +
            "            <div class='input-append'>" +
            "            <div class='uneditable-input'>" +
            "            <i class='fa fa-file fileupload-exists' style='left:10px;'></i>" +
            "            <span class='fileupload-preview'></span>" +
            "            </div>" +
            "            <span class='btn btn-default btn-file'>" +
            "            <span class='fileupload-exists'>Change</span>" +
            "            <span class='fileupload-new'>Select file</span>" +
            "        <input name='file[]' type='file' />" +
            "            </span>" +
            "            <a href='#' class='btn btn-default fileupload-exists' data-dismiss='fileupload'>Remove</a>" +
            "            </div>" +
            "            </div>");
    }
</script>