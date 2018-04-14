<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="https://static.wixstatic.com/media/a3979e_ad1e5ed291cc458b83b2c0d5d51964c0~mv2.png/v1/fill/w_72,h_68,al_c,usm_0.66_1.00_0.01/a3979e_ad1e5ed291cc458b83b2c0d5d51964c0~mv2.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" action="<?php echo base_url();?>frontend/login/doLogin" method = "post">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->