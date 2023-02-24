<?php

include('./db.php');

$connect = dbConnect();

$sql = "SELECT * FROM blog ORDER BY id DESC";

$query = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Beybee_Marcus">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style.css">
    <title>Blog</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark mx-auto py-3 py-lg-3" data-bs-theme="dark" 
            style="margin-top: 30px; display: block; align-items: center; width: 500px; padding: 20px; 
            border-radius: 20px; box-shadow: rgba(79, 76, 76, 0.67) 3px 2px 18px 7px;">
            <div class="container">
                <a class="navbar-brand mx-auto" href="./">Blog Post</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
              
            </div>
        </nav>
    </header>
    <main class="container">
        <div class="card text-center mx-auto mt-5" style="width: 30rem; width: 500px; margin: 20px; padding: 20px; border-radius: 20px; box-shadow: rgba(79, 76, 76, 0.67) 3px 2px 18px 7px;">
            <div class="card-body">
                <h5 class="card-title mx-auto">Create Post</h5>
                <form action="./addPost.php?method=add" method="post">
                    <input type="text" name="title" placeholder="Title" class="form-control mb-2" required style="margin-top: 20px;">
                    <textarea name="content" class="form-control mb-2" cols="30" rows="5" placeholder="What's on your mind?"></textarea>
                    <button type="submit" class="btn btn-success col-sm-12 w-50" style="margin-top: 20px; margin-bottom: -10px">POST</button>
                </form>
            </div>

        </div>
        <?php
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo
                    "<div class='card my-2 mx-auto' style='width: 30rem; width: 500px; margin: 20px; padding: 20px; border-radius: 20px; box-shadow: rgba(79, 76, 76, 0.67) 3px 2px 18px 7px;'>
                        <div class='card-header d-flex justify-content-between'>
                            <span>$row[title] <i>($row[date_created])</i></span>
                            <div>
                                <a id='$row[id]' href='./editPost.php?blogId=$row[id]' class='mx-2 text-success edit'>
                                    <i class='bi bi-pencil-square'></i>
                                </a>
                                <a id='$row[id]' href='./addPost.php?method=delete&blogId=$row[id]' class='text-dark delete'>
                                    <i class='bi bi-trash'></i>
                                </a>
                            </div>
                            
                        </div>
                        <div class='card-body'>
                            <p class='card-text'>$row[content]</p>
                        </div>
                    </div>";
            }
        } else {
            echo "
                    <div class='card-header mx-auto' style='width: 30rem; width: 500px; margin: 20px; padding: 20px; border-radius: 20px; box-shadow: rgba(79, 76, 76, 0.67) 3px 2px 18px 7px;'>        
                    <div class='card text-center'>
                    Nothing to show
                    </div>
                    </div>
                ";
        }
        ?>


    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>