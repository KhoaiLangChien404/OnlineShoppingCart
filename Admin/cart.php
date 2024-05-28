<?php include 'connect.php';
if (isset($_POST['update_product_quantity'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "update `cart` set quantity=$update_value where id=$update_id");
    if ($update_quantity_query) {
        header('location:cart.php');
    }
}


$totalItems = 0;
$totalPrice = 0;
$display_product = mysqli_query($conn, "SELECT * FROM `cart`");
$display_product1 = mysqli_query($conn, "SELECT * FROM `products`");


$sql = "SELECT COUNT(*) AS count FROM cart";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$count = $row['count'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && $count > 0) {
    // Xóa toàn bộ dữ liệu từ bảng "cart"
    $sql = "DELETE FROM cart";
    if ($conn->query($sql) === TRUE) {
        // Chuyển hướng đến trang "afterPay.php" sau khi xóa thành công
        header("Location: afterPay.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        body {
            background: #ddd;
            min-height: 100vh;
            vertical-align: middle;
            display: flex;
            font-family: sans-serif;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .title {
            margin-bottom: 5vh;
        }

        .card {
            margin: auto;
            max-width: 950px;
            width: 90%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto;
            }
        }

        .cart {
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }

        .summary {
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65);
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem;
            }
        }

        .summary .col-2 {
            padding: 0;
        }

        .summary .col-10 {
            padding: 0;
        }

        .row {
            margin: 0;
        }

        .title b {
            font-size: 1.5rem;
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }

        .col-2,
        .col {
            padding: 0 1vh;
        }

        a {
            padding: 0 1vh;
        }

        .close {
            margin-left: auto;
            font-size: 0.7rem;
        }

        img {
            width: 3.5rem;
        }

        .back-to-shop {
            margin-top: 4.5rem;
        }

        h5 {
            margin-top: 4vh;
        }

        hr {
            margin-top: 1.25rem;
        }

        form {
            padding: 2vh 0;
        }

        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            border-radius: 6px;
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            border-radius: 6px;
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        .btn {
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0;
        }

        .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            /* -webkit-user-select: none; */
            transition: none;
        }

        .btn:hover {
            color: white;
        }

        a {
            color: black;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }

        #input-group {
            margin: auto;
            width: 70px;
            text-align: center;
        }

        .input-container {
            position: relative;
            margin-top: -10px;
        }

        .input-placeholder {
            position: absolute;
            top: 30%;
            /* Adjust this value to position the label in the vertical center of the input field */
            left: 5px;
            /* Adjust this value to position the label in the horizontal center of the input field */
            transform: translateY(-5%);
            /* This will vertically center the text */
            transition: 0.3s all;
            opacity: 0.5;
            pointer-events: none;
            /* Thêm dòng này */

        }

        .input-field:focus+.input-placeholder,
        .input-field:not(:placeholder-shown)+.input-placeholder {
            transform: translateY(-15px) scale(0.75);
            left: 5px;
            /* Adjust this value to position the label in the horizontal center of the input field */
            font-size: 12px;
            opacity: 0.5;
            left: -1px;
        }

        .input-field {
            margin-top: 4px;
            font-size: 12px;
            /* Điều chỉnh kích thước chữ */
            padding: 10px;
            /* Điều chỉnh đệm */
            height: 50px;
            /* Điều chỉnh chiều cao */
            width: 70%;
            line-height: normal;
            margin-bottom: 10px;
        }

        #cautionMessage {
            line-height: normal;
            position: relative;
            top: -6px;
        }

        #submitCodeBtn {
            width: 26%;
            margin-left: 2%;
            display: inline-block;
            border-radius: 4px;
            padding: 0.7em 0.7em;
            box-sizing: border-box;
            text-align: center;
            cursor: pointer;
            position: relative;
            color: white;
        }

        #cautionMessage {
            margin-top: 1px;
            color: rgba(255, 0, 0, 0.5);
        }

        .error {
            border: 2px solid red;
        }

        #submitCodeBtn:disabled {
            pointer-events: none;
        }

        .click-input {
            border: 3px solid #6699CC !important;
        }

        #shipping-error {
            color: rgba(255, 0, 0, 0.5);
            margin-top: -20px;
        }

        #shipping-select {
            cursor: pointer;
        }
        
    </style>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted">
                            <?php
                            $totalItems = mysqli_num_rows($display_product);
                            echo $totalItems . " items";
                            ?>
                        </div>
                    </div>
                </div>

                <?php

                $display_product = mysqli_query($conn, "Select * from `cart`");

                if ($totalItems > 0) {
                    while ($row = mysqli_fetch_assoc($display_product)){
                        $itemPrice = $row['price'];
                        $totalPrice += $itemPrice;
                        $update_id = $row['cart_id'];
                ?>
                        <div class="row border-top border-bottom">
                            <div class="row main align-items-center">
                                <div class="col-2"><img class="img-fluid" src="images/<?php echo $row['image']; ?>"></div>
                                
                                <div class="col" data-price="<?php echo $row['price']; ?>">
                                    <div class="row"><?php echo $row['name']?></div>
                                    <div class="row text-muted"><?php echo $row['type']?></div>
                                </div>
                                <div class="col">
                                    <input class="disable-on-error " id="input-group" type="number" min="1" value="1" name="update_quantity">
                                </div>
                                <div class="col">&euro; <?php echo $row['price']; ?>
                                    <a href="delete_cart.php?delete=<?php echo $row['cart_id'] ?>" class="delete_product_btn" onclick="return confirm('Are you sure you want to delete this product');"><span class="close">&#10005;</span>
                                </div></a>
                            </div>
                        </div>
                <?php

                    }
                } else {
                    echo "<div class='empty_text'>No Products Available</div>";
                }
                ?>
                <div class="back-to-shop"><a href="shop_products.php">&leftarrow; Back to shop</a></div>
            </div>
            <div class="col-md-4 summary ">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <form>
                    <div class="shipping-select" style="border-top: 2px solid rgba(0,0,0,.1); padding: 2svh 0;">
                        <p>SHIPPING</p>
                        <select id="shipping-select">
                            <option value="0">Select Address</option>
                            <option value="1">TPHCM</option>
                            <option value="2">HaNoi</option>
                            <option value="3">Da Nang</option>
                        </select>
                        <div id="shipping-error"></div>
                    </div>
                    <div class="" style="border-top: 2px solid rgba(0,0,0,.1); padding: 1   vh 0;">
                        <br>
                        <p>GIVE CODE</p>
                        <div class="input-container">
                            <input id="code" class="input-field" placeholder="">
                            <label class="input-placeholder">Enter your code</label>
                            <button class="btn1" id="submitCodeBtn">Enter</button>
                            <div id="cautionMessage"></div>
                        </div>
                    </div>
                </form>
                <div class="row" style="border-top: 2px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col" style="padding-left: 0;"><?php echo $totalItems; ?> ITEMS</div>
                    <div class="col text-right" id="total-price">&euro; <?php echo $totalPrice; ?></div>
                </div>
                <div class="row" style="margin-top: -15px;">
                    <div class="col" style="padding-left: 0;">SHIP FEE</div>
                    <div class="col text-right" id="shipping-cost">—</div>
                </div>
                <div class="row">
                    <div class="col" style="padding-left: 0;">DISCOUNT CODE</div>
                    <div class="col text-right">—</div>
                </div>
                <div class="row" style="border-top: 2px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col" style="padding-left: 0;">TOTAL PRICE</div>
                    <div class="col text-right" id="total-price-with-shipping">&euro; <?php echo $totalPrice; ?></div>
                </div>
                <form method="post">
                    <button class="btn" type="submit" <?php echo $count == 0 ? 'disabled' : ''; ?>>Pay</button>
                </form>
            </div>
        </div>
    </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->

    <script>
        $(document).ready(function() {
            var calculatedPriceWithoutShipping = 0; // Variable store the potentially discounted price

            var priceMapping = {
                "0": 0, // Select Address
                "1": 10, // TPHCM
                "2": 15, // HaNoi
                "3": 12 // Da Nang
            };

            var discountCodes = {
                "DISCOUNT10": {
                    discount: 0.1,
                    used: false
                },
                "DISCOUNT20": {
                    discount: 0.2,
                    used: false
                }
            };

            function toggleButtonState() {
                var enteredCode = $("#code").val();

                if (enteredCode === "") {
                    $("#submitCodeBtn").prop("disabled", true);
                    $("#submitCodeBtn").css("background", "grey");
                    $("#submitCodeBtn").css('opacity', '0.6');
                    console.log("Button disabled");
                } else {
                    $("#submitCodeBtn").prop("disabled", false);
                    $("#submitCodeBtn").css("background", "#338dbc");
                    $("#submitCodeBtn").css('opacity', '1');
                    console.log("Button enabled");
                }
            }

            $("#code").trigger('keyup');

            $("#code").keyup(function() {
                toggleButtonState();
            });

            // Call toggleButtonState function on document ready to check if it's executed
            toggleButtonState();

            $("#code").focus(function() {
                $(this).addClass("click-input");
            }).blur(function() {
                $(this).removeClass("click-input");
            });

            $("#shipping-select").focus(function() {
                $(this).addClass("click-input");
            }).blur(function() {
                $(this).removeClass("click-input");
            });

            $("input[name='update_quantity']").change(function() {
                var newQuantity = $(this).val();

                if (isNaN(newQuantity)) {
                    alert("Invalid quantity: " + newQuantity);
                    return;
                }

                var originalPricePerItem = parseFloat($(this).closest('.row').find('.col').data('price'));

                var newTotalPrice = newQuantity * originalPricePerItem;

                var totalPriceWithoutShipping = 0;
                $(".row.main").each(function() {
                    var quantity = $(this).find("input[name='update_quantity']").val();
                    var price = parseFloat($(this).find('.col').data('price'));
                    if (!isNaN(price) && !isNaN(quantity)) {
                        totalPriceWithoutShipping += price * quantity;
                    }
                });

                // Update the total price without shipping
                $("#total-price").text('€ ' + totalPriceWithoutShipping.toFixed(2));

                // Recalculate the shipping cost
                var selectedOption = $("#shipping-select").val();
                var totalPriceWithShipping = calculateNewPrice(selectedOption, totalPriceWithoutShipping);

                // Update the total price with shipping
                $("#total-price-with-shipping").text('€ ' + totalPriceWithShipping.toFixed(2));
            });

            $("#shipping-select").change(function() {
                var selectedOption = $(this).val();

                var totalPriceWithoutShipping = 0;
                $(".row.main").each(function() {
                    var quantity = $(this).find("input[name='update_quantity']").val();
                    var price = parseFloat($(this).find('.col').data('price'));
                    if (!isNaN(price) && !isNaN(quantity)) {
                        totalPriceWithoutShipping += price * quantity;
                    }
                });

                // Recalculate the shipping cost
                var totalPriceWithShipping = calculateNewPrice(selectedOption, totalPriceWithoutShipping);

                // Update the total price with shipping
                $("#shipping-cost").text('€ ' + priceMapping[selectedOption]);
                $("#total-price-with-shipping").text('€ ' + totalPriceWithShipping.toFixed(2));
            });

            $("#submitCodeBtn").click(function(e) {

                e.preventDefault(); // Prevent the form from being submitted



                var enteredCode = $("#code").val();
                var inputField = $("#code"); // Reference to the input field


                // Check if the entered code is a correct discount code
                if (enteredCode in discountCodes) {
                    // Check if the discount code has not been used yet
                    if (!discountCodes[enteredCode].used) {
                        // If it is, apply the discount to the total price


                        var discount = discountCodes[enteredCode].discount;
                        var totalPriceWithoutShipping = parseFloat($("#total-price").text().replace('€ ', ''));
                        var discountedPrice = totalPriceWithoutShipping * (1 - discount);

                        // Store the discounted price in calculatedPriceWithoutShipping
                        calculatedPriceWithoutShipping = discountedPrice;

                        // Recalculate the shipping cost
                        var selectedOption = $("#shipping-select").val();
                        var totalPriceWithShipping = calculateNewPrice(selectedOption, calculatedPriceWithoutShipping);

                        // Update the total price with shipping
                        $("#total-price-with-shipping").text('€ ' + totalPriceWithShipping.toFixed(2));

                        // Mark the discount code as used
                        discountCodes[enteredCode].used = true;

                        // Clear the caution message
                        $("#cautionMessage").text("");

                        // Display the discount amount
                        $(".row > .col:contains('DISCOUNT CODE')").next().text('€ ' + (totalPriceWithoutShipping - discountedPrice).toFixed(2));

                    } else {
                        // If the discount code has been used, show a caution message
                        $("#cautionMessage").text("This discount code has already been used.");
                        inputField.addClass('error'); // Add the error class to the input field
                        $(".disable-on-error").prop("disabled", true);

                    }
                } else {
                    // If the entered code is not a correct discount code, show a caution message
                    $("#cautionMessage").text("Invalid discount code.");
                    inputField.addClass('error'); // Add the error class to the input field
                    $(".row > .col:contains('DISCOUNT CODE')").next().text('—');
                    $(".disable-on-error").prop("disabled", true);

                }


            });


            function calculateNewPrice(optionValue, totalPriceWithoutShipping) {
                // If the total price without shipping is 0, return only the shipping cost
                if (totalPriceWithoutShipping === 0) {
                    return priceMapping[optionValue];
                }

                // Check if a discount has been applied
                var enteredCode = $("#code").val();
                if (enteredCode in discountCodes && discountCodes[enteredCode].used) {
                    // If a discount has been applied, use the discounted price
                    totalPriceWithoutShipping = calculatedPriceWithoutShipping;
                }
                var newPrice = totalPriceWithoutShipping + priceMapping[optionValue];
                return newPrice;
            }
        });
        $(document).on('click', '.btn', function(e) {
            var shippingSelect = $("#shipping-select").val();

            // Check if the shipping-select is null
            if (shippingSelect == "0") {
                // If it is, show a caution message
                $("#shipping-error").text("Please select a shipping address.");
                return false; // Prevent the form from being submitted
            } else {
                // If a valid address is selected, clear any previous error message
                $("#shipping-error").text("");
                window.location.href = 'afterPay.php';
            }
        });
    </script>
</body>

</html>