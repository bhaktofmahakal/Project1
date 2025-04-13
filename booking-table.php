<?php require "config/config.php"; ?>
<?php require "libs/App.php"; ?>
<?php require "includes/header.php"; ?>
<?php 

    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        echo "<script>window.location.href='".APPURL."'</script>";
        exit;
    }

    if(isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $date_booking = $_POST['date_booking'];
        $num_people = $_POST['num_people'];
        $special_request = $_POST['special_request'];
        $status = "Pending";
        $user_id = $_SESSION['user_id'];

        if($date_booking > date("m/d/Y h:i:sa")) {

            $query = "INSERT INTO bookings (name, email, date_booking, num_people, special_request,
            status, user_id) VALUES (:name, 
            :email, :date_booking, :num_people, :special_request, :status, :user_id)";
    
            $arr = [
                ":name" =>  $name,
                ":email" =>  $email,
                ":date_booking" =>  $date_booking,
                ":num_people" =>  $num_people,
                ":special_request" =>  $special_request,
                ":status" =>  $status,
                ":user_id" =>  $user_id,
            ];
    
            $path = "index.php";
    
            $app->insert($query, $arr, $path);

        } else {
            echo "<script>alert('invlaid date pick a date starting form tomorrow')</script>";
            echo "<script>window.location.href='index.php'</script>";

        }

        

    }




?>




<?php require "includes/footer.php"; ?>