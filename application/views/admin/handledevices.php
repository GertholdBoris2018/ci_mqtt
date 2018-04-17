<section class="body">
    <?php   $this->load->view('admin/topnav');  ?>
    <div class="inner-wrapper">
        <?php   $data['sidebar'] = array('main'=>ADMIN_SIDEBAR_MANAGEMENT,'sub' => !isset($device)? ADMIN_SIDEBAR_MANAGEMENT_DEVICE_ADD:ADMIN_SIDEBAR_MANAGEMENT_DEVICE_EDIT) ;$this->load->view('admin/leftside',$data);  ?>

        <section role="main" class="content-body">
            <header class="page-header">
                <h2><?php echo !isset($device)?lang('side_cts_28'):lang('side_cts_29');?></h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="<?php echo base_url();?>admin/dashboard">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span><?php echo lang('side_cts_18');?></span></li>
                        <li><span><?php echo !isset($device)?lang('side_cts_28'):lang('side_cts_29');?></span></li>
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

                    <h2 class="panel-title"><?php echo !isset($device)?lang('side_cts_28'):lang('side_cts_29');?></h2>
                </header>
                <div class="panel-body">
                    <form id="form" class="form-horizontal form-bordered" method="post" action="<?php echo base_url();?>admin/management/<?php echo !isset($device)?'add_device':'edit_device/'.$device[0]->UID;?>" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault" ><?php echo lang('side_cts_30');?> <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="ipaddress" class="form-control" id="inputDefault" value="<?php echo !isset($device)?'':$device[0]->dev_v4_external_ipaddress;?>"required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault" ><?php echo lang('side_cts_31');?> <span class="required">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" name="assignedCustomer">
                                    <option value="">Select User</option>
                                    <?php
                                    
                                        foreach($customers as $customer){
                                            ?>
                                            <option value="<?php echo $customer->customer_id;?>" <?php echo (isset($device) && ($device[0]->dev_client_code == $customer->customer_id)) ? 'selected':'';?>><?php echo $customer->name;?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
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