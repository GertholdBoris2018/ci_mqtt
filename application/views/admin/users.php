<section class="body">
    <?php   $this->load->view('admin/topnav');  ?>
    <div class="inner-wrapper">
        <?php   $data['sidebar'] = array('main'=>ADMIN_SIDEBAR_MANAGEMENT,'sub' => ADMIN_SIDEBAR_MANAGEMENT_USER_LIST) ;$this->load->view('admin/leftside',$data);  ?>

        <section role="main" class="content-body">
            <header class="page-header">
                <h2><?php echo lang('side_user_list');?></h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="<?php echo base_url();?>admin/dashboard">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span><?php echo lang('side_cts_17');?></span></li>
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

                    <h2 class="panel-title"><?php echo lang('side_cts_17');?></h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6" id="message">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputDefault">
                            <a href="<?php echo base_url();?>admin/Management/useradd" class="mb-xs mt-xs mr-xs btn btn-primary">Add Customer</a>                            
                        </label>
                    </div>
                    <table class="table table-bordered table-striped mb-none" id="datatable-users">
                        <thead>
                        <tr>
                            <th><?php echo lang('side_cts_19');?></th>
                            <th><?php echo lang('side_cts_20');?></th>
                            <th><?php echo lang('side_cts_5');?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($customers as $customer){
                            ?>
                            <tr>
                                <td><?php echo $customer->customer_id;?></td>
                                <td><?php echo $customer->name;?></td>
                                <td class="actions">
                                    <a href="<?php echo base_url();?>admin/Management/useredit/<?php echo $customer->customer_id?>"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:;" class="delete-row" onclick="deleteCustomer('<?php echo $customer->customer_id;?>')"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                    

                </div>
            </section>
            <!-- end: page -->
        </section>
    </div>
    <?php   $this->load->view('admin/rightside');  ?>
</section>