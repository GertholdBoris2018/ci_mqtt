<!-- Footer -->
<footer id="footer">
    <div class="container">
        <div class="row double">
            <div class="col-sm-4">
                <h2 class="h2color" >Why We Choose</h2>
                <p style="text-align: justify;">Lorem ipsum dolormet consectatur, elit do eiusoma ut lab
                    labore dolore magnamam voluptatem sit amet.Lorem
                    ipsum dolormet consectatur, elit do eiusoma ut lab
                    labore dolore magnamam voluptatem sit amet. Lorem
                    ipsum dolormet consectatur, elit do eiusoma ut lab
                    labore dolore magnamam voluptatem sit amet.</p>

            </div>
            <div class="col-sm-4">
                <h2 class="h2color">Contact</h2>
                <p><i class="fa fa-home homricon" aria-hidden="true"></i> Bruchköbel, German<br/>
                    <a href="<?php echo base_url();?>frontend/contactus"><i class="fa fa-envelope homricon" aria-hidden="true"></i>boris.berthold2018<br/></a>
                    <i class="fa fa-phone homricon" aria-hidden="true"> </i>+49123123123</p>
            </div>
            <div class="col-sm-4">
                <h2 class="h2color">Follow Us!</h2>
                <ul class="social-icons icon-circle icon-rotate list-unstyled list-inline">
                    <li> <a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a> </li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a> </li>
                    <li> <a href="#"><i class="fa fa-instagram"></i></a> </li>

                </ul>
            </div>

        </div>
    </div>

</footer>
<script type="text/javascript">
$(document).ready(function(){
    $('#nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').fadeIn(10);
    }, 
    function() {
        $(this).find('.dropdown-menu').fadeOut(10);
    });
});
    
</script>
<div class="footer">@2018 All rights reserved. Berthold</div>
</body>
</html>