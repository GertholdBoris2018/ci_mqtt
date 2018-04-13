<section class="body">
    <?php   $this->load->view('admin/topnav');  ?>
    <div class="inner-wrapper">
        <?php   $data['sidebar'] = array('main'=>ADMIN_SIDEBAR_PORT,'sub' => ADMIN_SIDEBAR_PORT_PORTSLIST) ;$this->load->view('admin/leftside',$data);  ?>

        <section role="main" class="content-body">
            <header class="page-header">
                <h2><?php echo lang('side_port_list');?></h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="<?php echo base_url();?>admin/dashboard">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span><?php echo lang('side_cts_6');?></span></li>
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

                    <h2 class="panel-title"><?php echo lang('side_cts_6');?></h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6" id="message">

                        </div>
                    </div>

                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                        <tr>
                            <th><?php echo lang('side_cts_7');?></th>
                            <th><?php echo lang('side_cts_3');?></th>
                            <th><?php echo lang('side_cts_4');?></th>
                            <th><?php echo lang('side_cts_15');?></th>
                            <th><?php echo lang('side_cts_5');?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($portfolios as $portfolio){
                            ?>
                            <tr>
                                <td><?php echo $portfolio->title;?></td>
                                <td><?php echo $portfolio->username;?></td>
                                <td><?php echo $portfolio->created_on;?></td>
                                <td><?php echo empty($portfolio->category_id)?'no category':$portfolio->category_id;?></td>
                                <td class="actions">
                                    <a href="<?php echo base_url();?>admin/portfolios/edit/<?php echo $portfolio->port_id?>"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo base_url();?>admin/portfolios/delete/<?php echo $portfolio->port_id?>" class="delete-row"><i class="fa fa-trash-o"></i></a>
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