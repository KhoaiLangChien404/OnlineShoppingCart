<?php include 'connect.php';
if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_type = $_POST['product_type']; // new line
    $product_image = $_FILES['product_image']['name'];
    $product_image_temp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'images/' . $product_image;
    $insert_query = mysqli_query($conn, "insert into `products` (name,price,type,image) values
    ('$product_name','$product_price','$product_type','$product_image')") or die("Insert query failed"); // updated line
    if ($insert_query) {
        move_uploaded_file($product_image_temp_name, $product_image_folder);
        $display_message = "Product inserted successfully";
    } else {
        $display_message = "There is some error inserting the product";
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
        body {
            background-color: #e5e5e5;
        }

        .container {
            background-color: #e4e9f7;
            display: contents;
        }

        .add_product {
            background-color: #ffffff;
        }

        .add_product .input_fields {
            color: #000000;
            border: 1px solid black;
        }

        .submit_btn {
            background-color: #191919;
            color: #ffffff;
        }

        .heading {
            color: #000000;
        }

        .cart_number {
            color: #ffffff;
        }

        .submit_btn:hover {
            color: red;
        }

        .display_message {
            background-color: #333333;
            color: #ffffff;
        }

    
    </style>
</head>

<body>
<?php include('header.php') ?>
    <div class="container">
        <?php
        if (isset($display_message)) {
            echo "<div class='display_message'>
            <span>$display_message</span>
            <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
        </div>";
        }
        ?>
        <section>
            <h3 class="heading">Add Products</h3>
            <form action="" class="add_product" method="post" enctype="multipart/form-data">
                <input type="text" name="product_name" placeholder="Enter product name" class="input_fields" required>
                <input type="number" name="product_price" min="0" placeholder="Enter product Price" class="input_fields" required>
                <input type="text" name="product_type" placeholder="Enter product type" class="input_fields" required> <!-- new line -->
                <input type="file" name="product_image" class="input_fields" required accept="image/png, image/jpg, image/jpeg">
                <input type="submit" name="add_product" class="submit_btn" value="Add Product">
            </form>
        </section>
    </div>
    <?php include('footer.php') ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectOrder = document.getElementById('select-order');
            selectOrder.addEventListener('focus', function() {
                this.classList.add('click-input');
            });
            selectOrder.addEventListener('blur', function() {
                this.classList.remove('click-input');
            });
        });
        window.onscroll = function() {
            var header = document.getElementById('myHeader');
            if (window.pageYOffset > 50) {
                header.style.backgroundColor = 'gray';
                header.style.transition = 'background-color 0.5s';
            } else {
                header.style.backgroundColor = '#333333';
                header.style.transition = 'background-color 0.5s';
            }
        };
        function showSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }

        function hideSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'none'
        }
    </script>
</body>

</html>