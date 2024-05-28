<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        nav {
            background-color: rgba(76, 68, 182, 0.808);
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.1);
            position: static;
            height: 75px;
        }

        nav ul {
            width: 100%;
            list-style: none;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        nav li {
            height: 50px;
        }

        nav a {
            height: 100%;
            padding: 0 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            color: #ffffff;
            padding-top: 25px;
            font-size: large;
        }

        nav a:hover {
            color: red;
        }

        nav li:first-child {
            margin-right: auto;
        }

        .sidebar {
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            width: 250px;
            background-color: #333333;
            backdrop-filter: blur(12px);
            box-shadow: -10px 0 10px rgba(0, 0, 0, 0.1);
            list-style: none;
            display: none;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
        }

        .sidebar li {
            width: 100%;
        }

        .sidebar a {
            width: 100%;
        }

        .menu-button {
            display: none;
        }

        @media(max-width: 800px) {
            .hideOnMobile {
                display: none;
            }

            .menu-button {
                display: block;
            }

            .online {
                font-size: medium;
                margin-left: 50px;
            }

            .store {
                font-size: medium;
                margin-right: 50px;
            }
            .logo {
                margin-right: 75px;
            }
        }

        @media(max-width: 400px) {
            .sidebar {
                width: 100%;
            }
        }

        .cart span sup {
            background-color: red;
            border-radius: 100px;
            padding: 2px;
            font-size: 15px;
        }

        .cart span {
            height: 30px;
        }

        .online {
            color: white;
            margin-left: -15px;
        }

        .store {
            color: red;
            margin-right: -15px;
        }

        .logo {
            margin-left: 100px;
            font-size: 28px;
        }

        nav li .cart{
            color: white;
        }
    </style>
</head>

<body>
    <nav id="myHeader" class="header">
        <ul class="sidebar">
            <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26">
                        <path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                    </svg></a></li>
            <li><a href="add_products.php">Add Products</a></li>
            <li><a href="view_products.php">View Products</a></li>
            <li><a href="shop_products.php">Shopit</a></li>
        </ul>
        <?php
        $select_product = mysqli_query($conn, "Select * from `cart`") or die('query failed');
        $row_count = mysqli_num_rows($select_product);
        ?>
        <ul>
            <li><a href="shop_products.php" class="logo"><span class="online">ONLINE</span> <span class="store"><b>STORE</b></span></a></li>
            <li class="hideOnMobile"><a href="add_products.php">Add Products</a></li>
            <li class="hideOnMobile"><a href="view_products.php">View Products</a></li>
            <li class="hideOnMobile"><a href="shop_products.php">Shopit</a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26">
                        <path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
                    </svg></a></li>
            <li><a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i><span><sup><?php echo $row_count ?></sup></span></a></li>
        </ul>
    </nav>
</body>

</html>