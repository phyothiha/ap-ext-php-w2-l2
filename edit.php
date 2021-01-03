<?php
    require 'config.php';

    if ( $_POST ) {

        // request attributes
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $stmt = $pdo->prepare("
            UPDATE `todo` 
            SET 
                `title` = :title, 
                `description` = :description
            WHERE 
                `id` = :id
        ");

        $result = $stmt->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
        ]);

        if ( $result ) {
            echo "<script>alert('New ToDo is updated'); window.location.href='index.php';</script>";
        }

    } else {

        $stmt = $pdo->prepare(
            "SELECT * FROM `todo` WHERE `id` = :id"
        );

        $stmt->execute([
            ':id' => $_GET['id']
        ]);

        // Be careful array wrapper
        $result = $stmt->fetchAll();

    }

 ?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

        <title>Edit - Todo App</title>
    </head>
    <body>
        <div class="card">
            <div class="card-body">
                <h2>Edit New Todo</h2>
                <form action="" method="POST">
                    <input type="hidden" value="<?php echo $result[0]['id']; ?>" name="id">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" required value="<?php echo $result[0]['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5"><?php echo $result[0]['description']; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="index.php" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </body>
</html>