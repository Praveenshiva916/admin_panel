<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>admin Portal - Add and Remove Products</h1>
    <h2>Add Product</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" id= "name" name="name" required><br>
        <label for="name">Price:</label>
        <input type="number" id= "price" name="price" required><br>
        <label for="image">Image:</label>
        <input type="file" id= "image" name="image" required><br>
        <input type="submit" value="Add Product" name="add_product">
    </form>
    <h2>remove Product</h2>
    <form action="process.php" method="POST">
        <label for="product_id">Product Id</label>
        <input type="text" name="product_id" id="product_id" required><br>
        <input type="submit" value="remove Product" name="remove_product">
    </form>
</body>
</html>