<!DOCTYPE html>
<html>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<body>
    <?php
    include('config.php');
   
     $message='';
if(isset($_POST['add'])){
    if($_POST['name'] == '' || $_POST['cost'] == '' || $_POST['ads'] == '' || $_POST['discount'] == '' ){
        $message ='<p>من فضلك املأ الحقول الفارغة</p>';
    }else if( $_POST['price'] < 10){
        $message ='<p>من فضلك السعر لابد أن يكون رقم مناسب</p>';


    }else{
        $tax = ( $_POST['price'] - ($_POST['cost'] + $_POST['ads'] + $_POST['discount'] ) ) * tax ;
        $insert =sprintf("INSERT INTO products (name, cost, ads,discount,tax,price) VALUES ('%s','%s','%s','%s','%s','%s')",
        $_POST['name'], $_POST['cost'], $_POST['ads'],$_POST['discount'],$tax,$_POST['price']); 
    
        if (mysqli_query($conn, $insert)) {
            $message ='<p>تم اضافة المنتج</p>';
        } else {
        $message ='<p>فشلت عملية إضافة المنتج</p>';
        }

    }
    


}
 $sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

echo $message;
?>

<div class="col-md-4">
<form action="add.php" method="POST" enctype="multipart/form-data">
<div class="form-group">    <label for="exampleInputEmail1">الاسم</label>

<input class="form-control" type="text" name="name" placeholder="اسم المنتج">
</div>
<div class="form-group">
<label for="exampleInputEmail1">التكلفة</label>

<input class="form-control" type="text" name="cost" placeholder="تكلفة المنتج">
</div>
<div class="form-group">
<label for="exampleInputEmail1">اعلانات</label>
<input class="form-control" type="text" name="ads" placeholder="إعلانات المنتج">
</div>
<div class="form-group">
<label for="exampleInputEmail1">خصم</label>
<input class="form-control" type="text" name="discount" placeholder="خصم المنتج">
</div>
<!-- <div class="form-group">
<input class="form-control" type="text" name="tax" placeholder="ضريبة المنتج">
</div> -->
<div class="form-group">
<label for="exampleInputEmail1">سعر المنتج</label>
<input class="form-control" type="text" name="price" placeholder="سعر المنتج">
</div>
<div class="form-group">
<input class="form-control" type="submit" name="add" value="اضافة منتج">
</div>
</form>
</div>
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
                           <td a class="btn btn-primary disabled" role="button" aria-disabled="true">Primary link</a></td><td a class="btn btn-secondary disabled" role="button" aria-disabled="true">Link</a></td>
                            
                        </tr> <?php       }
                        }        ?> </tbody>
        </table>
 



</body>
</html>

<td><a class="btn btn-primary"href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>