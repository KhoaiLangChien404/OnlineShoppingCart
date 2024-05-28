<?php
include 'connect.php';
include 'sort.php'; 

if(isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn,"Select * from cart where cart_id='$product_id'");
    if(mysqli_num_rows($select_cart)>0) {
        $display_message[] = "Product already added to cart";
    }
    else {
        $insert_products = mysqli_query($conn,"insert into `cart`(cart_id, price, image, quantity) values ('$product_id','$product_price','$product_image','$product_quantity')");
        $display_message[] = "Product added to cart";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            background: linear-gradient(to bottom, #ffffff, #808080);
        }

        @media(max-width: 800px) {
            .hideOnMobile {
                display: none;
            }

            .menu-button {
                display: block;
            }
            .search-form {
                display: none;
            }
        }

        @media(max-width: 400px) {
            .sidebar {
                width: 100%;
            }
        }

        .sort-form {
            width: 200px;
            margin: 0 40px;
            padding: 20px;
            border-radius: 5px;

        }

        .sort-form select {
            width: 190px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            appearance: none;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 140.4 140.4"><path d="M35.4 46.9l35 35 35-35 14.1 14.1-49.1 49-49.1-49z"/></svg>') no-repeat right center;
            background-size: 10px;
            cursor: pointer;
        }

        .edit_form {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
            height: 350px;
        }

        .edit_form img {
            width: 80%;
            height: 150px;
            object-fit: cover;
        }

        .edit_form:nth-child(odd) .content {
            background-color: lightgrey;
            margin: -20px;
            margin-top: 50px;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        #btn-addcart {
            width: 80%;
            margin-bottom: 18px;
            margin-top: 18px;
        }

        @media only screen and (min-width:320px) and (max-width:768px) {
            .sort-form {
                margin: 0 auto;
            }

            .product_container {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }

            .edit_form {
                height: auto;
            }

            .edit_form img {
                height: auto;
                object-fit: cover;
            }
        }

        .click-input {
            border: 3px solid black !important;
        }

        .online {
            color: white;
            margin-right: 10px;
        }

        .store {
            color: red;
        }

        .logo {
            margin-left: 100px;
            font-size: 28px;
        }

        .search-form {
            float: right;
            margin-left: auto;
            margin-top: 25px;
        }

        .search_input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search_btn {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #7f7f7f;
            color: #fff;
            cursor: pointer;
        }
        .display_message {
            background-color: #191919;
            color: #ffffff;
        }
        .submit_btn {
            background-color: #000000;
        }
        .submit_btn:hover {
            color: red;
        }
    </style>
</head>
<body>  
    <?php
        include 'headerClient.php';
    ?> 
    <div class="slideshow-container">
        <div class="mySlides fade">
          <img src="images/room.png" style="width: 1350px; height:400px;">
        </div>
    </div>
    <div class="page-content">
        <div class="content-wrap">
            <div class="container">
                <?php
                if(isset($display_message)) {
                    foreach($display_message as $display_message) {
                        echo "<div class='display_message'>
                        <span>$display_message</span>
                        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
                        </div>";
                    }
                }
                ?>
                <section class="products">
                    <h1 class="heading">Lets Shop</h1>
                    <!-- Add the search form here -->
                    <div class="search-form">
                        <form method="post" action="">
                            <input class="search_input" type="text" name="search_query" placeholder="Search products...">
                            <input class="search_btn" type="submit" value="Search" name="search">
                        </form>
                    </div>
                    <div class="sort-form">
                        <form method="post" action="">
                            <select id="select-order" name="sort_order" onchange="this.form.submit()">
                                <option value="default" >Select sort order</option>
                                <option value="name_asc" <?php if ($sort_order == 'name_asc') echo 'selected'; ?>>Sort by Name (A-Z)</option>
                                <option value="name_desc" <?php if ($sort_order == 'name_desc') echo 'selected'; ?>>Sort by Name (Z-A)</option>
                                <option value="price_asc" <?php if ($sort_order == 'price_asc') echo 'selected'; ?>>Sort by Price (Low to High)</option>
                                <option value="price_desc" <?php if ($sort_order == 'price_desc') echo 'selected'; ?>>Sort by Price (High to Low)</option>
                            </select>
                        </form>
                    </div>
                    <div class="product_container">
                    <?php
                        $type = $_GET['type'];
                        $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE `type` = '$type'");
                        if (mysqli_num_rows($select_products) > 0) {
                            while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                        ?>
                                <form method="post" action="">
                                    <div class="edit_form">
                                        <img src="images/<?php echo $fetch_product['image'] ?>" alt="">
                                        <div class="content">
                                            <h3><?php echo $fetch_product['name'] ?></h3>
                                            <div class="price">Price: &euro; <?php echo $fetch_product['price'] ?></div>
                                            <input type="hidden" name="product_id" value="<?php echo $fetch_product['product_id'] ?>">
                                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price'] ?>">
                                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image'] ?>">
                                            <input type="submit" class="submit_btn cart_btn" value="Add to Cart" name="add_to_cart">
                                        </div>
                                    </div>
                                </form>
                        <?php
                            }
                        } else {
                            echo "<div class='empty_text'>No Products Available</div>";
                        }
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
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