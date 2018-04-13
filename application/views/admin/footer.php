</section>
<!-- end: page -->
<!-- Vendor -->
<script src="<?php echo ADMIN_PLUGINS_PATH;?>jquery/jquery.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>nanoscroller/nanoscroller.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>magnific-popup/jquery.magnific-popup.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>jquery-placeholder/jquery-placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="<?php echo ADMIN_PLUGINS_PATH;?>jquery-ui/jquery-ui.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>jquery-appear/jquery-appear.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>flot/jquery.flot.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>flot.tooltip/flot.tooltip.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>flot/jquery.flot.pie.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>flot/jquery.flot.categories.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>flot/jquery.flot.resize.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>jquery-sparkline/jquery-sparkline.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>raphael/raphael.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>morris.js/morris.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>gauge/gauge.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>snap.svg/snap.svg.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>liquid-meter/liquid.meter.js"></script>

<script src="<?php echo ADMIN_PLUGINS_PATH;?>jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>bootstrap-timepicker/bootstrap-timepicker.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>fuelux/js/spinner.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>dropzone/dropzone.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>bootstrap-markdown/js/markdown.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>bootstrap-markdown/js/to-markdown.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>codemirror/lib/codemirror.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>codemirror/addon/selection/active-line.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>codemirror/addon/edit/matchbrackets.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>codemirror/mode/javascript/javascript.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>codemirror/mode/xml/xml.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>codemirror/mode/css/css.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>summernote/summernote.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>ios7-switch/ios7-switch.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>bootstrap-confirmation/bootstrap-confirmation.js"></script>

<!-- Specific Page Vendor -->
<script src="<?php echo ADMIN_PLUGINS_PATH;?>select2/js/select2.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>jquery-datatables-bs3/assets/js/datatables.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>autosize/autosize.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script src="<?php echo ADMIN_PLUGINS_PATH;?>jquery-validation/jquery.validate.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="<?php echo ADMIN_JS_PATH;?>theme.js"></script>

<!-- Theme Custom -->
<script src="<?php echo ADMIN_JS_PATH;?>theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo ADMIN_JS_PATH;?>theme.init.js"></script>

<!-- Examples -->
<script src="<?php echo ADMIN_JS_PATH;?>tables/examples.datatables.editable.js"></script>

<!-- Examples -->
<script src="<?php echo ADMIN_JS_PATH;?>tables/examples.datatables.default.js"></script>
<script src="<?php echo ADMIN_JS_PATH;?>tables/examples.datatables.row.with.details.js"></script>
<script src="<?php echo ADMIN_JS_PATH;?>tables/examples.datatables.tabletools.js"></script>
<script src="<?php echo ADMIN_JS_PATH;?>forms/examples.validation.js"></script>

<script type="text/javascript">
    // ajax process function
    function ajax_proc(url, param, before_callback, success_callback, error_callback) {
        $.ajax({
            type: "POST",
            url: url,
            data: param,
            contentType: "application/x-www-form-urlencoded;",
            dataType: "json",
            beforeSend: function() {
                if (before_callback != null) before_callback();
            },
            error: function(data) {
                if (error_callback != null) error_callback(data);
            },
            success: function(data) {
                if (success_callback != null) success_callback(data);
            },
            statusCode: {
                404: function() {
                    alert('page not found');
                }
            }
        });
    }
    function show_msg(type,msg){
        $("#message").html('<div class="alert alert-'+type+'">' +
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
            '<strong>'+type+'!</strong> '+msg+'</div>')
        window.setTimeout(function () { $("#message").html(''); }, 2000);
    }

        $(".cate_check").each(function(){
            var ele = $(this);
            console.log(ele.attr("id"));
            <?php
            if(isset($portfolio))
                $catechks = explode(",",$portfolio[0]->category_id);
            foreach($catechks as $chk){
            ?>
            if("<?php echo $chk;?>".trim() == ele.attr("id")){
                $(this).prop('checked', true);
            }
            <?php
            }
            ?>
        });
    $(document).ready(function(){
        $('#datatable-users').dataTable({
            
        });
        $('#datatable-devices').dataTable({
            
        });
    });
    function deleteCustomer(id){
        // 
        if (confirm("Are you sure?")) {
            window.location.href = '<?php echo base_url();?>admin/Management/userdelete/' + id;
        }
        return false;
    }
    function deleteDevice(id){
        if (confirm("Are you sure?")) {
            window.location.href = '<?php echo base_url();?>admin/Management/devicedelete/' + id;
        }
        return false;
    }
</script>
</body>
</html>