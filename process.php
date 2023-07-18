<?php
class Product {
    private $db;
    public function __construct()
    {
        $this->db =new mysqli('localhost', 'root', '', 'newdb');
        if($this->db->connect_error) {
            die("Connection failed:".$this->db->connect_error);
        }
    }
    public function addProduct($name,$price,$image) {
        $imagePath = $this->uploadimage($image);
        $stmt = $this->db->prepare("INSERT INTO productdb (product_name,product_price,product_image) VALUES (?,?,?)");
        $stmt->bind_param("sds", $name, $price, $imagePath);
        $stmt->execute();
        $stmt->close();
        echo "Product Added Succeccfully.";
    }
    private function uploadImage($image)
    {
        $targetDir = "uploads/";
        $targetFile = $targetDir.basename($image["name"]);
        $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

        $check = getimagesize($image["tmp_name"]);
        if ($check === false) {
            die("File is not an image.");
        }
       if(file_exists($targetFile)) {
           die("file already exist");
       }       
       if($image["size"] > 500000) {
           die("file is too large"); 
       }
       if($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !=="gif") {
        die("Only jpeg, jpg,png& gif files are allowed.");
       }
       if(move_uploaded_file($image["tmp_name"],$targetFilew)) {
          return $targetfile;
       } else {
        die("error uploading File.");
       }
    }
    public function removeProduct($productId){
         $stmt = $this->db->prepare("DELETE FROM productdb WHERE id=?");
         $stmt->bind_param("i",$productId);
         $stmt->execute();
         $stmt->close();
         echo "Product Removed Succesfully.";
    }
}
     $product = new Product();
     if (isset($_POST['add_product'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $product->addProduct($name, $price, $image);
     }
     else if(isset($_POST['remove_product'])) {
        $productId = $_POST['product_id'];
        $product->removeProduct($productId);
     }
     ?>