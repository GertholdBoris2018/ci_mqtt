<section class="body">
    <?php   $this->load->view('admin/topnav');  ?>
    <div class="inner-wrapper">
        <?php   $data['sidebar'] = array('main'=>ADMIN_SIDEBAR_PORT,'sub' => ADMIN_SIDEBAR_PORT_CATES) ;$this->load->view('admin/leftside',$data);  ?>

        <section role="main" class="content-body">
            <header class="page-header">
                <h2><?php echo lang('side_categories');?></h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="<?php echo base_url();?>admin/dashboard">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span><?php echo lang('side_categories');?></span></li>
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

                    <h2 class="panel-title"><?php echo lang('side_cts_1');?></h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-md">
                                <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>

                            </div>
                        </div>
                        <div class="col-sm-6" id="message">

                        </div>
                    </div>
                    <table class="table table-bordered table-striped mb-none" id="datatable-editable">
                        <thead>
                        <tr>
                            <th><?php echo lang('side_cts_2');?></th>
                            <th><?php echo lang('side_cts_3');?></th>
                            <th><?php echo lang('side_cts_4');?></th>
                            <th><?php echo lang('side_cts_5');?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($categories as $category){
                                ?>
                                <tr data-item-id="<?php echo $category->cate_id;?>">
                                    <td><?php echo $category->title;?></td>
                                    <td><?php echo $category->username;?></td>
                                    <td><?php echo $category->created_on;?></td>
                                    <td class="actions">
                                        <a href="#" class="hidden on-editing save-row"><i class="fa fa-save" id="<?php echo $category->cate_id;?>"></i></a>
                                        <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                        <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
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