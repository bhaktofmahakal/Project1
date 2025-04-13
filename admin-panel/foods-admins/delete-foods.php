<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php 


    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        echo "<script>window.location.href='".ADMINURL."'</script>";
        exit;
    }


?>
<?php 


    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM foods WHERE id='$id'";
    
        $one = $app->selectOne($query);

        unlink("foods-images/" . $one->image);



        $query = "DELETE FROM foods WHERE id='$id'";
        $app = new App;
        $path = "show-foods.php";
        $app->delete($query, $path);


    } 