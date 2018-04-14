<!-- Banner -->
<?php 
    if($this->session->userdata('isCustomerlogin') && count($devices) == 0){
        ?>
        <script>
            $.notify({
                // options
                icon : 'glyphicon glyphicon-warning-sign',
                title : 'MQTT Notification - ',
                message: 'You are logged in but you have no devices.' 
            },{
                // settings
                offset : 50,
                type: 'warning',
                allow_dismiss: true,
                newest_on_top : true,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: {
                    x: "20",
                    y: "20"
                },
                spacing : "50",
                delay: 5000,
	            timer: 1000,
                z_index : 999999
            });
        </script>
        <?php
    }

    
    
?>

<section id="banner">
    <div class="inner">
        <h2>WELCOME MQTT WEBSITE</h2>
        <p>Here, you will manage your device as your want. </p>
        <ul class="actions">
            <li><a href="#content" class="button big alt">Management</a></li>
            <li><a href="#elements" class="button big special">Devices</a></li>
        </ul>
    </div>
</section>

<!-- Two -->
<section id="elements" class="wrapper style2">
    <header class="major">
        <h2>Commodo accumsan aliquam</h2>
        <hr class="row1">
        <p>Amet nisi nunc lorem accumsan</p>
    </header>
</section>

<section id="two1" class="wrapperstyle23">
    <header class="major1">
        <h2 style="font-size: 31px;color: #fff;">VEGYE FEL VELÜNK A KAPCSOLATOT!</h2>
        <hr class="row1">
        <p class="textcolor">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmoma<br>
            ut labore et dolore magnam aliquam quaerat voluptatem.</p>


        <ul class="actions">
            <li><a href="#" class="button alt learnmore">KAPCSOLAT</a></li>
        </ul>
    </header>

    </div>
</section>




