<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php 


    $app = new App;
    $app->validateSessionAdmin();

    if(isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];


        $query = "SELECT * FROM admins WHERE email='$email'";

        $data = [
            "email" =>  $email,
            "password" =>  $password,
        ];

        $path = "http://localhost/restoran/admin-panel";

        $app->login($query, $data, $path);

    }



?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
<?php require "../layouts/footer.php"; ?>
     