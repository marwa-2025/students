<?php include("config.php");
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

 ?>
<!DOCTYPE html>
<html>

<head>
    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>products</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Cost</th>
                    <th>ads</th>
                    <th>discount</th> 
                    <th>price</th> 
                    <th>tax</th> 
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody> <?php if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {     ?> <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['cost']; ?></td>
                            <td><?php echo $row['ads']; ?></td>
                            <td><?php echo $row['discount']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['tax']; ?></td>
                            <td><a class="btn btn-info" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr> <?php       }
                        }        ?> </tbody>
        </table>
    </div>
<?php
     mysqli_close($conn);
?>
</body>

</html>