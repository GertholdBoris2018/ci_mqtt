<center>
    <br>
    <h1><b>CONTACT US!</b></h1>
    <p>Ezen az oldalon megtekintheti munkáinkat.<br>
        Kattintson valamelyik képre, hogy részleteket is megtudjon az adott projektről.</p></center>
<hr class="row1">
<div class="container">
    <div class="col-md-12" id="message">
    </div>
    <div class="col-md-6">
        <script type="text/javascript">
            <?php if(isset($msg) && $msg == 'success'){
                ?>
                    show_msg('success','thank you for your contacting!');
            <?php
                }
                else{

                }
            ?>
        </script>
        <form id="contact_form" action="<?php echo base_url();?>frontend/contactus/sendmail" method="post">

            <div class="form-group">
                <label for="contact_name">Nombre <span class="required">*</span></label>
                <input id="contact_name" name = "name" type="text" required aria-required="true" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="contact_email">Email <span class="required">*</span></label>
                <input id="contact_email" type="mail" name="email" required aria-required="true" placeholder="su@email.com" style="padding-left:20px;">
            </div>
            <div id="area_message" class="form-group">
                <label for="contact_message">Mensaje <span class="required">*</span></label>
                <textarea  name = "message" id="contact_message" type="mail" required aria-required="true" placeholder="Mensaje"></textarea>
                <br> <input id="contact_btn" type="submit" value="Send message">
            </div>
        </form>
    </div>
    <div class="col-md-6">

        <br><h3><b><i class="fa fa-home homricon" aria-hidden="true"></i>Company details</b></h3>
        <p>Avrasys Kft.<br>
            3516 Miskolc, Kaffka Margit utca 28<br>
            Hungary<br>
            Adószám: 24458735-2-05
        </p>

        <h3><b><i class="fa fa-envelope homricon" aria-hidden="true"></i>Contact details</b></h3>
        <p>Email: info@avrasys.hu<br>
            Tel: +36-30-256-3557
            .</p>


    </div>
</div>
</div>

