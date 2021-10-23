<?php
require 'validator.php';
require 'BlogClass.php';

$blog = new  blog();

$reuslt = $blog->display();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>content</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <th>ID</th>
                <th>title</th>
                <th>content</th>
                <th>image</th>
                <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                    while ($blog = mysqli_fetch_assoc($reuslt)) { ?>

                <td> <?php echo $blog['id']; ?>
                </td>
                <td> <?php echo $blog['title']; ?>
                </td>
                <td> <?php echo $blog['content']; ?>
                </td>
                <td> <img
                        src="./uploads/<?php  echo $blog['image'];?>"
                        width="50 px" height="50 px">
                </td>
                <td>
                    <a href='delete.php?id=<?php echo $blog['id']; ?>'
                        class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='edit.php?id=<?php echo $blog['id']; ?>'
                        class='btn btn-primary m-r-1em'>Edit</a>
                </td>
                </tr>
                <?php } ?>
        </table>
    </div>

</body>

</html>
