<?php
include 'connect.php';
if(isset($_POST['update_product'])) {
    $update_product_id = $_POST['update_product_id'];
    $update_product_name = $_POST['update_product_name'];
    $update_product_price = $_POST['update_product_price'];
    $update_product_type = $_POST['update_product_type']; // New line
    $update_product_image = $_FILES['update_product_image']['name'];
    $update_product_image_tmp_name = $_FILES['update_product_image']['tmp_name'];
    $update_product_image_folder = 'images/'.$update_product_image;
    $update_products = mysqli_query($conn,"UPDATE `products` SET name='$update_product_name', price='$update_product_price', type='$update_product_type', image='$update_product_image' WHERE product_id=$update_product_id"); // Updated line
    if($update_products) {
        move_uploaded_file($update_product_image_tmp_name, $update_product_image_folder);
        header('location:view_products.php');
    }
    else {
        $display_message = "There is some error updating the product";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .update_product {
            background-color: #3C3B6E;
        }
        .edit_btn {
            background-color: green;
        }
        body {
            background-color: white;
        }
        .container {
            background-color: #e4e9f7;
            display: inline;
        }
        .header_body {
            background-color: rgba(76, 68, 182,0.808);
        }
        .header .header_body .logo {
            color: #f5f6e1;
            font-weight: bold;
        }
        .header .header_body .navbar a {
            color: #ffffff;
        }
        .header .header_body .navbar a:hover,
        .header .header_body .cart:hover {
            color: #aaaaff;
        }
        .display_message {
            background-color: rgba(76, 68, 182,0.808);
            color: #ffffff;
        }

    </style>
</head>
<body>
    <?php include 'header.php'?>
    <?php
    if(isset($display_message)) {
        echo "<div class='display_message'>
        <span>$display_message</span>
        <i class='fas fa times' onclick='this.parentElement.style.display=`none`';></i>
    </div>";
    }
    ?>
    <section class="edit_container">
        <?php
        if(isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn,"SELECT * FROM `products` WHERE product_id=$edit_id");
            if(mysqli_num_rows($edit_query)>0) {
                $fetch_data=mysqli_fetch_assoc($edit_query);
                ?>
                <form action="" method="post" enctype="multipart/form-data" class="update_product product_container_box">
                    <img src="images/<?php echo $fetch_data['image']?>" alt="">
                    <input type="hidden" value="<?php echo $fetch_data['product_id']?>" name="update_product_id">
                    <input type="text" class="input_fields fields" required value="<?php echo $fetch_data['name']?>" name="update_product_name">
                    <input type="number" class="input_fields fields" required value="<?php echo $fetch_data['price']?>" name="update_product_price">
                    <input type="text" class="input_fields fields" required value="<?php echo $fetch_data['type']?>" name="update_product_type"> <!-- New line -->
                    <input type="file" class="input_fields fields" required accept="image/png, image/jpg, image/jpeg" name="update_product_image">
                    <div class="btns">
                        <input type="submit" class="edit_btn" value="Update Product" name="update_product">
                        <input type="reset" id="close-edit" value="Cancel" class="cancel_btn">
                    </div>
                </form>
                <?php
            }
        }
        ?> 
    </section>
</body>
</html>
