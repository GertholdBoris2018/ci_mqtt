<section class="body">
    <?php   $this->load->view('admin/topnav');  ?>
    <div class="inner-wrapper">
        <?php   $data['sidebar'] = array('main'=>ADMIN_SIDEBAR_MANAGEMENT,'sub' => !isset($customer)? ADMIN_SIDEBAR_MANAGEMENT_USER_ADD:ADMIN_SIDEBAR_MANAGEMENT_USER_EDIT) ;$this->load->view('admin/leftside',$data);  ?>

        <section role="main" class="content-body">
            <header class="page-header">
                <h2><?php echo !isset($customer)?lang('side_cts_21'):lang('side_cts_22');?></h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="<?php echo base_url();?>admin/dashboard">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span><?php echo lang('side_cts_17');?></span></li>
                        <li><span><?php echo !isset($customer)?lang('side_cts_21'):lang('side_cts_22');?></span></li>
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

                    <h2 class="panel-title"><?php echo !isset($customer)?lang('side_cts_21'):lang('side_cts_22');?></h2>
                </header>
                <div class="panel-body">
                    <form id="form" class="form-horizontal form-bordered" method="post" action="<?php echo base_url();?>admin/management/<?php echo !isset($customer)?'add_customer':'edit_customer/'.$customer[0]->customer_id;?>" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault" ><?php echo lang('side_cts_20');?> <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" id="inputDefault" value="<?php echo !isset($customer)?'':$customer[0]->name;?>"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault" ><?php echo lang('side_cts_23');?> <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="password" class="form-control" id="inputDefault" value="<?php echo !isset($customer)?'':$customer[0]->password;?>" required>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo lang('side_cts_10');?></label>
                            <div class="col-md-9">
                                <div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'><?php echo !isset($portfolio)?'':$portfolio[0]->content;?></div>
                            </div>
                        </div> -->
                        
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