<?php include 'connect.php' ?>
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
            background-color: #e5e5e5;
            display: inline;
        }

        .cart_number {
            color: #ffffff;
        }

        .display_product table thead th {
            background-color: #7f7f7f;
        }

        .empty_text {
            background-color: rgba(76, 68, 182, 0.808);
            color: #ffffff;
        }

        .search_product {
            float: right;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .search_product input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search_product button {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #7f7f7f;
            color: #fff;
            cursor: pointer;
        }

        @media screen and (max-width: 1200px) {
            .display_product table {
                width: 100%;
                overflow-x: auto;
            }

            .display_product th,
            .display_product td {
                white-space: nowrap;
            }
        }

        @media screen and (max-width: 768px) {
            .display_product table {
                width: 100%;
                overflow-x: auto;
            }

            .display_product th,
            .display_product td {
                white-space: nowrap;
            }
        }

        @media screen and (max-width: 991px) {
            .display_product table {
                width: 100%;
                overflow-x: auto;
            }

            .display_product th,
            .display_product td {
                white-space: nowrap;
            }
        }

    </style>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container">
        <section class="display_product">
            <?php
            $display_product = mysqli_query($conn, "Select * from `products`");
            if (mysqli_num_rows($display_product) > 0) {
            ?>
                <div class="search_product">
                    <form action="" method="GET">
                        <input type="text" name="search" placeholder="Search Product">
                        <button type="submit">Search</button>
                    </form>
                </div>
                <?php
                if (isset($_GET['search'])) {
                    $search = mysqli_real_escape_string($conn, $_GET['search']);
                    $display_product = mysqli_query($conn, "Select * from `products` WHERE name LIKE '%$search%'");
                }
                $num = 1;
                echo "<table>
                        <thead>
                            <th>S1 No</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Type</th> <!-- new line -->
                            <th>Action</th>
                        </thead>
                        <tbody>";
                while ($row = mysqli_fetch_assoc($display_product)) {
                ?>
                    <tr>
                        <td><?php echo $num ?></td>
                        <td><img src="images/<?php echo $row['image'] ?>" alt=<?php echo $row['name'] ?>></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['type'] ?></td> <!-- new line -->
                        <td>
                            <a href="delete_view.php?delete=<?php echo $row['product_id'] ?>" class="delete_product_btn" onclick="return confirm('Are you sure you want to delete this product');"><i class="fas fa-trash"></i></a>
                            <a href="update.php?edit=<?php echo $row['product_id'] ?>" class="update_product_btn"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
            <?php
                    $num++;
                }
            } else {
                echo "<div class='empty_text'>No Products Available</div>";
            }
            ?>
            </tbody>
            </table>
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