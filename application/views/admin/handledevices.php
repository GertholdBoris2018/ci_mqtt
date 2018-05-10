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
                                            <option value="<?php echo $customer->UID;?>" <?php echo (isset($device) && ($device[0]->dev_client_code == $customer->UID)) ? 'selected':'';?>><?php echo $customer->name;?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault" ><?php echo lang('side_cts_32');?> <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_mac" class="form-control" id="dev_mac" value="<?php echo !isset($device)?'':$device[0]->dev_mac;?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault" ><?php echo lang('side_cts_33');?> <span class="required">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" name="dev_deleted">
                                    <option value="0" <?php echo isset($device) && $device[0]->dev_deleted == '0'?'selected':'';?>>No</option>
                                    <option value="1" <?php echo isset($device) && $device[0]->dev_deleted == '1'?'selected':'';?>>Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault" ><?php echo lang('side_cts_34');?> <span class="required">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" name="dev_connected">
                                    <option value="0" <?php echo isset($device) && $device[0]->dev_connected == '0'?'selected':'';?>>No</option>
                                    <option value="1" <?php echo isset($device) && $device[0]->dev_connected == '1'?'selected':'';?>>Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_reseller_code" ><?php echo lang('side_cts_35');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_reseller_code" class="form-control" id="dev_reseller_code" value="<?php echo !isset($device)?'':$device[0]->dev_reseller_code;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault" ><?php echo lang('side_cts_36');?> <span class="required">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" name="dev_active">
                                    <option value="0" <?php echo isset($device) && $device[0]->dev_active == '0'?'selected':'';?>>No</option>
                                    <option value="1" <?php echo isset($device) && $device[0]->dev_active == '1'?'selected':'';?>>Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault" ><?php echo lang('side_cts_37');?> <span class="required">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" name="dev_chargable">
                                    <option value="0" <?php echo isset($device) && $device[0]->dev_chargable == '0'?'selected':'';?>>No</option>
                                    <option value="1" <?php echo isset($device) && $device[0]->dev_chargable == '1'?'selected':'';?>>Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_location_contact" ><?php echo lang('side_cts_38');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_location_contact" class="form-control" id="dev_location_contact" value="<?php echo !isset($device)?'':$device[0]->dev_location_contact;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" ><?php echo lang('side_cts_39');?> <span class="required">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" name="dev_contract_type">
                                    <option value="test" <?php echo isset($device) && $device[0]->dev_contract_type == 'test'?'selected':'';?>>Test</option>
                                    <option value="live" <?php echo isset($device) && $device[0]->dev_contract_type == 'live'?'selected':'';?>>Live</option>
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
                            <label class="col-md-2 control-label"><?php echo lang('side_cts_40');?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" data-plugin-datepicker="" name="dev_contract_start_date" class="form-control" value="<?php echo !isset($device)?'': date('m/d/Y',strtotime($device[0]->dev_contract_start_date));?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo lang('side_cts_41');?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" data-plugin-datepicker="" name="dev_contract_end_date" class="form-control" value="<?php echo !isset($device)?'': date('m/d/Y',strtotime($device[0]->dev_contract_end_date));?>">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_v4_internal_ipaddress" ><?php echo lang('side_cts_42');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_v4_internal_ipaddress" class="form-control" id="dev_v4_internal_ipaddress" value="<?php echo !isset($device)?'':$device[0]->dev_v4_internal_ipaddress;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_v6_internal_ipaddress" ><?php echo lang('side_cts_43');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_v6_internal_ipaddress" class="form-control" id="dev_v6_internal_ipaddress" value="<?php echo !isset($device)?'':$device[0]->dev_v6_internal_ipaddress;?>">
                            </div>
                        </div>

                
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_v6_external_ipaddress" ><?php echo lang('side_cts_44');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_v6_external_ipaddress" class="form-control" id="dev_v6_external_ipaddress" value="<?php echo !isset($device)?'':$device[0]->dev_v6_external_ipaddress;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_v4_def_router_ipaddress" ><?php echo lang('side_cts_45');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_v4_def_router_ipaddress" class="form-control" id="dev_v4_def_router_ipaddress" value="<?php echo !isset($device)?'':$device[0]->dev_v4_def_router_ipaddress;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_v6_def_router_ipaddress" ><?php echo lang('side_cts_46');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_v6_def_router_ipaddress" class="form-control" id="dev_v6_def_router_ipaddress" value="<?php echo !isset($device)?'':$device[0]->dev_v6_def_router_ipaddress;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_external_ip_heartbeat" ><?php echo lang('side_cts_47');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_external_ip_heartbeat" class="form-control" id="dev_external_ip_heartbeat" value="<?php echo !isset($device)?'':$device[0]->dev_external_ip_heartbeat;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_network_carrier" ><?php echo lang('side_cts_48');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_network_carrier" class="form-control" id="dev_network_carrier" value="<?php echo !isset($device)?'':$device[0]->dev_network_carrier;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_owner" ><?php echo lang('side_cts_49');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_owner" class="form-control" id="dev_owner" value="<?php echo !isset($device)?'':$device[0]->dev_owner;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo lang('side_cts_50');?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" data-plugin-datepicker="" name="dev_manufacture_date" class="form-control" value="<?php echo !isset($device)?'': date('m/d/Y',strtotime($device[0]->dev_manufacture_date));?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo lang('side_cts_58');?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" data-plugin-datepicker="" name="dev_warrantee_date" class="form-control" value="<?php echo !isset($device)?'': date('m/d/Y',strtotime($device[0]->dev_warrantee_date));?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_type" ><?php echo lang('side_cts_51');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_type" class="form-control" id="dev_type" value="<?php echo !isset($device)?'':$device[0]->dev_type;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo lang('side_cts_52');?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" data-plugin-datepicker="" name="dev_shipping_date" class="form-control" value="<?php echo !isset($device)?'': date('m/d/Y',strtotime($device[0]->dev_shipping_date));?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_model" ><?php echo lang('side_cts_53');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_model" class="form-control" id="dev_model" value="<?php echo !isset($device)?'':$device[0]->dev_model;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_model_rev" ><?php echo lang('side_cts_54');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_model_rev" class="form-control" id="dev_model_rev" value="<?php echo !isset($device)?'':$device[0]->dev_model_rev;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_current_firmware" ><?php echo lang('side_cts_55');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_current_firmware" class="form-control" id="dev_current_firmware" value="<?php echo !isset($device)?'':$device[0]->dev_current_firmware;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_bar_code" ><?php echo lang('side_cts_56');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_bar_code" class="form-control" id="dev_bar_code" value="<?php echo !isset($device)?'':$device[0]->dev_bar_code;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="dev_code" ><?php echo lang('side_cts_57');?></label>
                            <div class="col-md-6">
                                <input type="text" name="dev_code" class="form-control" id="dev_code" value="<?php echo !isset($device)?'':$device[0]->dev_code;?>">
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