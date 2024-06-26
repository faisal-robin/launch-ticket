<?php include('header.php'); ?>

<!-- Breadcrumb Area Start -->
<section class="abh-breadcrumb-area">
   <div class="breadcrumb-top">
      <div class="container">
         <div class="col-lg-12">
            <div class="breadcrumb-box">
               <h2>Login</h2>
               <ul class="breadcrumb-inn">
                  <li><a href="index.php">Home</a></li>
                  <li class="active"><a href="#">Login</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Area End -->


<!-- Login Page Start -->
<section class="abh-login-page section_70">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="login-box">
               <h3>Member Login</h3>
               <form>
                  <p>
                     <input type="email" placeholder="E-mail Address" />
                     <i class="fa fa-envelope"></i>
                  </p>
                  <p>
                     <input type="password" placeholder="Password" />
                     <i class="fa fa-lock"></i>
                  </p>
                  <p class="lost_pass">
                     <a href="#">Lost your password?</a>
                  </p>
                  <p>
                     <button type="submit">login</button>
                  </p>
               </form>
               <div class="social-login">
                  <p class="optional_login">or</p>
                  <a href="#" class="fb">
                     <i class="fa fa-facebook"></i>Sign in <span>Facebook</span>
                  </a>
                  <a href="#" class="google">
                     <i class="fa fa-google"></i>Sign in <span>Google</span>
                  </a>
               </div>
               <div class="register_have">
                  <p>Don't have an account? <a href="register.php">Register</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Login Page End -->

<?php include('footer.php'); ?>