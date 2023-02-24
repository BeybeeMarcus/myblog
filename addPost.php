<?php
    date_default_timezone_set("Asia/Manila");

    include('./db.php');
    $connect = dbConnect();

    $method = $_GET['method'];

    switch($method) {
        case 'add':
            if(isset($_POST['title']) && isset($_POST['content'])) {
                $title = strip_tags($_POST['title']);
                $content = strip_tags($_POST['content']);
                $dateToday = date('Y-m-d h:i a');
                
                $sql = $connect->prepare( "INSERT INTO blog(title, content,date_created) VALUES ('$title', '$content', '$dateToday') ");
            
                if($sql->execute()) {
                    echo "Blog Added!";
                    header('Location: ./');
                }else{
                    echo "An error occured.";
                }
            }
            break;
        case 'delete':
            if(isset($_GET['blogId'])) {
                $blogId = $_GET['blogId'];
                $sql = "DELETE FROM blog WHERE id = $blogId";
                if(mysqli_query($connect, $sql)) {
                    echo "<script>alert('Post Delete!')</script>";
                    header('Location: ./');
                    
                }else{
                    echo "An error occured.";
                }
            }
            break;
        case 'edit':
            if(isset($_POST['blogId'])) {
                $blogId = $_POST['blogId'];
                $title = $_POST['edit_title'];
                $content = $_POST['edit_content'];
                $sql = "UPDATE blog SET title = '$title', content = '$content' WHERE id = $blogId";
                if(mysqli_query($connect, $sql)) {
                    header('Location: ./');
                }else{
                    echo "An error occured.";
                }
            }
        default:
            echo "Unknown Method.";
    }

?>