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
                
                $sql = $connect->prepare( "INSERT INTO blog(title, content,date_created) VALUES (?, ?, ?)");
                $sql->bind_param("sss", $title, $content, $dateToday);
                
                if($sql->execute()) {
                    echo "Blog Added!";
                    header('Location: ./');
                } else {
                    echo "An error occurred.";
                }
            }
            break;
        case 'delete':
            if(isset($_GET['blogId'])) {
                $blogId = $_GET['blogId'];
                $sql = $connect->prepare("DELETE FROM blog WHERE id = ?");
                $sql->bind_param("i", $blogId);
                
                if($sql->execute()) {
                    echo "<script>alert('Post Deleted!')</script>";
                    header('Location: ./');
                } else {
                    echo "An error occurred.";
                }
            }
            break;
        case 'edit':
            if(isset($_POST['blogId']) && isset($_POST['edit_title']) && isset($_POST['edit_content'])) {
                $blogId = $_POST['blogId'];
                $title = strip_tags($_POST['edit_title']);
                $content = strip_tags($_POST['edit_content']);
                $sql = $connect->prepare("UPDATE blog SET title = ?, content = ? WHERE id = ?");
                $sql->bind_param("ssi", $title, $content, $blogId);
                
                if($sql->execute()) {
                    echo "<script>alert('Post Updated!')</script>";
                    header('Location: ./');
                } else {
                    echo "An error occurred.";
                }
            }
            break;
        default:
            echo "Unknown Method.";
    }

?>
