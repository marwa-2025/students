<!DOCTYPE html>
<html>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<body>
    <?php
    include('config.php');

if(isset($_GET['id'])){
    $sql = sprintf("SELECT * FROM products WHERE id=%d",$_GET['id']);
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

}
if(isset($_POST['update'])){
    $sql = sprintf("UPDATE products SET name='%s', cost=%s, ads=%s, discount=%s, price=%s, tax=%s
     WHERE id=%d",$_POST['name'],$_POST['cost'],$_POST['ads'],$_POST['discount'],$_POST['price'],$_POST['tax'],$_POST['id']);
//die($sql);
    if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'add.php';
header("Location: http://$host$uri/$extra");
exit;

    }
?>

<div class="col-md-4">
<form action="edit.php" method="POST" enctype="multipart/form-data">
<div class="form-group">    <label for="exampleInputEmail1">الاسم</label>

<input class="form-control" type="text" name="name" placeholder="اسم المنتج" value="<?php echo $product['name'] ?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">التكلفة</label>

<input class="form-control" type="text" name="cost" placeholder="تكلفة المنتج" value="<?php echo $product['cost'] ?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">اعلانات</label>
<input class="form-control" type="text" name="ads" placeholder="إعلانات المنتج" value="<?php echo $product['ads'] ?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">خصم</label>
<input class="form-control" type="text" name="discount" placeholder="خصم المنتج"  value="<?php echo $product['discount'] ?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">الضريبة</label>
<input class="form-control" type="text" name="tax" placeholder="ضريبة المنتج" value="<?php echo $product['tax'] ?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">سعر المنتج</label>
<input class="form-control" type="text" name="price" placeholder="سعر المنتج" value="<?php echo $product['price'] ?>">
</div>
<div class="form-group">
<input class="form-control" type="submit" name="update" value="تعديل منتج">
</div>
<input type="hidden" name="id" value="<?php  echo $product['id'] ?>">

</form>
</div>

</body>
</html>

