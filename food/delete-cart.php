<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>
<?php 


    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        echo "<script>window.location.href='".APPURL."'</script>";
        exit;
    }


?>
<?php 


    
       
        $query = "DELETE FROM cart WHERE user_id='$_SESSION[user_id]'";
        $app = new App;
        $path = "cart.php";
        $app->delete($query, $path);
    