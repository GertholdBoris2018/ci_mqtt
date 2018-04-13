<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="<?php echo isset($sidebar) && ($sidebar['main'] == ADMIN_SIDEBAR_DASHBOARD) ?'nav-active':''?>">
                        <a href="<?php echo base_url();?>admin/dashboard">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span><?php echo lang('side_dashboard');?></span>
                        </a>
                    </li>
                    <li class="nav-parent <?php echo isset($sidebar) && ($sidebar['main'] == ADMIN_SIDEBAR_MANAGEMENT) ?'nav-active nav-expanded':''?>">
                        <a>
                            <i class="fa fa-television" aria-hidden="true"></i>
                            <span><?php echo lang('side_management');?></span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="<?php echo isset($sidebar) && ($sidebar['sub'] == ADMIN_SIDEBAR_MANAGEMENT_USER_LIST || $sidebar['sub'] == ADMIN_SIDEBAR_MANAGEMENT_USER_ADD || $sidebar['sub'] == ADMIN_SIDEBAR_MANAGEMENT_USER_EDIT) ?'nav-active':''?>">
                                <a href="<?php echo base_url();?>admin/management/users">
                                    <?php echo lang('side_user_list');?>
                                </a>
                            </li>
                            <li class="<?php echo isset($sidebar) && ($sidebar['sub'] == ADMIN_SIDEBAR_MANAGEMENT_DEVICE_LIST || $sidebar['sub'] == ADMIN_SIDEBAR_MANAGEMENT_DEVICE_ADD || $sidebar['sub'] == ADMIN_SIDEBAR_MANAGEMENT_DEVICE_EDIT ) ?'nav-active':''?>">
                                <a href="<?php echo base_url();?>admin/management/devices">
                                    <?php echo lang('side_device_list');?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </nav>
        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>

    </div>

</aside>
<!-- end: sidebar -->