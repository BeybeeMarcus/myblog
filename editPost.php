<?php
include('./db.php');
$connect = dbConnect();

$sql = "SELECT * FROM blog WHERE id = $_GET[blogId]";
$query = mysqli_query($connect, $sql);

$blog = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
<header>
        <nav class="navbar navbar-expand-lg bg-dark mx-auto py-3 py-lg-3" data-bs-theme="dark" 
            style="margin-top: 30px; margin-bottom: 30px; display: block; align-items: center; width: 500px; padding: 20px; 
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
    <main class="container" style="margin-top: 30px; display: block; align-items: center; width: 500px; padding: 20px; 
            border-radius: 20px; box-shadow: rgba(79, 76, 76, 0.67) 3px 2px 18px 7px;">
        <div class='card my-2 mx-auto'>
            <div class='card-header d-flex justify-content-between'>
            <h5 class="card-title mx-auto">Edit Post</h5>
                
                
            </div>
            <div class='card-body'>
                <p class='card-text'>
                <form action="./addPost.php?method=edit" method="POST">
                    <input type="hidden" name="blogId" value="<?php echo $blog['id']?>">
                    <input type="text" name="edit_title" placeholder="Blog Title" class="form-control mb-2" value="<?php echo $blog['title']?>" required>
                    <textarea name="edit_content" class="form-control mb-2" cols="30" rows="5" placeholder="What's on your mind?"><?php echo $blog['content'] ?></textarea>
                    <div class="w-100 mx-auto">
                        <button type="submit" class="btn btn-success col-sm-12 w-100" style="margin-top: 20px; margin-bottom: -10px">UPDATE</button>
                        <a type="button" class="btn btn-success col-sm-12 w-100" style="margin-top: 20px; margin-bottom: -10px" href="./">CANCEL</a>
                    </div>
                    
                </form>
                </p>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>