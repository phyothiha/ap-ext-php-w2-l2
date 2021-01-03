<?php  
    require 'config.php';

    if ( $_POST ) {

        // request attributes
        $title = $_POST['title'];
        $description = $_POST['description'];

        /** 
         * PDO 3 steps
         *  - Prepare query
         *  - Attributes binding
         *  - Execute query
         */
        $query = "
            INSERT INTO `todo`(`title`, `description`) 
            VALUES (:title, :description)
        ";

        $stmt = $pdo->prepare($query);

        $results = $stmt->execute([
            ':title' => $title,
            ':description' => $description,
        ]);

        if ( $results ) {
            echo "<script>alert('New ToDo is added'); window.location.href='index.php';</script>";
        }

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

        <title>Create - Todo App</title>
    </head>
    <body>
        <div class="card">
            <div class="card-body">
                <h2>Create New Todo</h2>
                <form action="add.php" method="POST">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="index.php" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </body>
</html>