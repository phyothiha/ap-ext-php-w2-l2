<?php  
    require 'config.php';

    $stmt = $pdo->prepare(
        "SELECT * FROM `todo` ORDER BY `id` DESC"
    );
    $stmt->execute();

    $results = $stmt->fetchAll();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

        <title>Home - Todo App</title>
    </head>
    <body>
        <div class="card">
            <div class="card-body">
                <h2>Todo Home Page</h2>
                <a href="add.php" role="button" class="btn btn-success">Create New</a>

                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $iteration = 0;
                            if ( $results ) : 
                                foreach ( $results as $result ) :
                                    $iteration++;
                        ?>
                            <tr>
                                <td><?php echo $iteration; ?></td>
                                <td><?php echo $result['title']; ?></td>
                                <td><?php echo $result['description']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime( $result['created_at']) ); ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $result['id']; ?>" role="button" class="btn btn-sm btn-info">Edit</a>
                                    <a href="delete.php?id=<?php echo $result['id']; ?>" role="button" class="btn btn-sm btn-danger">Del</a>
                                </td>
                            </tr>

                        <?php
                                endforeach; 
                            endif; 
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </body>
</html>