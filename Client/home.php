<?php
include 'connect.php';
include 'headerClient.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

        .content2 {
            background-color: lightgray;
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
        }

        .display_message {
            background-color: #191919;
            color: #ffffff;
        }

        .submit_btn {
            background-color: #000000;
        }

        .submit_btn:hover {
            color: #ffff56;
        }

        h4 {
            font-size: small;
        }

        /* slide show */
        * {
            box-sizing: border-box
        }

        body {
            font-family: Verdana, sans-serif;
            margin: 0
        }

        .mySlides {
            width: 100%;
            height: auto;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 100%;
            position: relative;
            margin: auto;
            cursor: pointer;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .latest-products {
            margin-top: 100px;
        }

        .about-features .container .row {
            padding-bottom: 0px !important;
            border-bottom: none !important;
        }

        .best-features .container .row {
            border-bottom: 1px solid #eee;
            padding-bottom: 60px;
        }

        .page-heading .container {
            position: relative;
            z-index: 2;
        }

        .team-member .thumb-container {
            position: relative;
        }

        .team-member .thumb-container .hover-effect {
            position: absolute;
            background-color: rgba(243, 63, 63, 0.9);
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: all .5s;
        }

        .team-member .thumb-container .hover-effect .hover-content {
            position: absolute;
            display: inline-block;
            width: 100%;
            text-align: center;
            top: 50%;
            transform: translateY(-50%);
        }

        .team-member .thumb-container .hover-effect .hover-content ul.social-icons li a:hover {
            background-color: #fff;
            color: #f33f3f;
        }

        .section-heading {
            text-align: left;
            margin-bottom: 60px;
            border-bottom: 1px solid #eee;
        }

        .section-heading h2 {
            font-size: 28px;
            font-weight: 400;
            color: #1e1e1e;
            margin-bottom: 15px;
        }

        .section-heading a {
            float: right;
            margin-top: -35px;
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 700;
            color: #f33f3f;
        }

        .services .section-heading h2 {
            color: #fff;
        }

        .section .section-heading {
            margin-bottom: 45px;
        }

        .product-item {
            border: 1px solid #eee;
            margin-bottom: 30px;
        }

        .product-item .down-content {
            padding: 30px;
            position: relative;
        }

        .product-item img {
            width: 100%;
            overflow: hidden;
        }

        .product-item .down-content h4 {
            font-size: 17px;
            color: #1a6692;
            margin-bottom: 20px;
        }

        .product-item .down-content h6 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #121212;
        }

        .product-item .down-content h6 small {
            color: #999;
        }

        .product-item .down-content p {
            margin-bottom: 20px;
        }

        .product-item .down-content ul li {
            display: inline-block;
        }

        .product-item .down-content ul li i {
            color: #f33f3f;
            font-size: 14px;
        }

        .product-item .down-content span {
            position: absolute;
            right: 30px;
            bottom: 30px;
            font-size: 13px;
            color: #f33f3f;
            font-weight: 500;
        }

        .product-item .down-content span a {
            color: #f33f3f;
            display: inline-block;
            margin-bottom: 3px;
        }

        .team-member .down-content {
            padding: 30px;
            text-align: center;
        }

        .team-member .down-content h4 {
            font-size: 17px;
            color: #1a6692;
            margin-bottom: 8px;
        }

        .team-member .down-content span {
            display: block;
            font-size: 13px;
            color: #f33f3f;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .service-item .down-content {
            background-color: #fff;
            padding: 40px 30px;
        }

        .service-item .down-content h4 {
            font-size: 17px;
            color: #1a6692;
            margin-bottom: 20px;
        }

        .service-item .down-content h6 {
            margin-bottom: 15px;
        }

        .service-item .down-content p {
            margin-bottom: 25px;
        }

        @media (max-width: 768px) {
            .section-heading a {
                float: none;
                margin-top: 0px;
                display: block;
                margin-bottom: 20px;
            }

            .product-item .down-content h4 {
                margin-bottom: 20px !important;
            }
        }

        @media (max-width: 992px) {
            .product-item .down-content h4 {
                margin-bottom: 10px;
            }

            .product-item .down-content h6 {
                margin-bottom: 20px;
            }
        }

        /* ## */

        card-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            width: 200px; /* Set the width of the card container */
            height: 200px; /* Set the height of the card container */
            margin: 10px; /* Add some margin for spacing between card containers */
            
        }

        .card {
            border: 1px solid #ccc;
            width: 300px; /* Make the card width 100% of the container */
            height: 170px; /* Make the card height 100% of the container */
            position: relative;
            overflow: hidden;
        }

        .card-container h3 {
            margin-top: 20px; 
        }

        h1 {
            margin-left:227px;
            margin-top: 20px;
        }

        .line {
            width: calc(100% - 447px); 
            height: 1px;
            background-color: black;
            margin-left: 227px; 
        }
        
        #h3_1 {
            text-align: center;
        }
        #h3_2 {
            text-align: center;
        }
        #h3_3 {
            text-align: center;
        }
        .card-container img {
            width: 100%; /* Make the image width 100% of the card */
            height: 100%; /* Make the image height 100% of the card */
            object-fit: cover;
        }

        .client_container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            
        }

        @media screen and (max-width: 768px){
            .client_container {
                flex-direction: column;
            }
            .hero #client-container {
                display: none;
            }

            .hero .section-heading{
                display: none;
            }
        }

        .hero {
            width: 100%;
            padding-bottom: 52.5%;
            position: relative;
            background-image: url("images/1.jpg");
            /* background-image: url("https://picsum.photos/1000/660"); */
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }
        .hero:before {
            content: "";
            background-color: rgba(150, 80, 30, 0.5);
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
        }
        .hero__content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 2rem;
            width: 100%;
        }
        .hero__title {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: white;
        }
        
        .hero__text {
            font-size: 1.8rem;
            color: white;
        }
        
        .hero h3{
            color: white;
        }
    </style>
</head>

<body>
    <div class="slideshow-container">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="images/banner1.png" style="width:100%" onclick="window.location='shop_products.php'">
            </div>

            <div class="mySlides fade">
                <img src="images/banner2.png" style="width:100%" onclick="window.location='shop_products.php'">
            </div>

            <div class="mySlides fade">
                <img src="images/banner3.png" style="width:100%" onclick="window.location='shop_products.php'">
            </div>
            <div class="mySlides fade">
                <img src="images/banner4.png" style="width:100%" onclick="window.location='shop_products.php'">
            </div>
            <div class="mySlides fade">
                <img src="images/banner5.png" style="width:100%" onclick="window.location='shop_products.php'">
            </div>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
        </div>
    </div>
    <div class="page-content">
        <div class="content-wrap">
            <div class="container">
                <section class="products">
                    <div class="section-heading">
                        <h2>Featured Products</h2>
                        <a href="shop_products.php">view more <i class="fa fa-angle-right"></i></a>
                    </div>
                    <div class="product_container">
                        <div class="edit_form">
                            <img src="images/hunter2.jpg" alt="">
                            <div class="content">
                                <h3 id="displayname">Hunter Shoes</h3>
                                <h4 style="color: #6c757d;">Hunter</h4>
                                <div class="price">Price: &euro; 300</div>
                            </div>
                        </div>
                        <div class="edit_form">
                            <img src="images/2.png" alt="">
                            <div class="content2">
                                <h3 id="displayname">Crocs</h3>
                                <h4 style="color: #6c757d;">Crocs</h4>
                                <div class="price">Price: &euro; 150</div>
                            </div>
                        </div>
                        <div class="edit_form">
                            <img src="images/iphone.jpg" alt="">
                            <div class="content2">
                                <h3 id="displayname">Iphone 15</h3>
                                <h4 style="color: #6c757d;">Tech</h4>
                                <div class="price">Price: &euro; 1000</div>
                            </div>
                        </div>
                    </div> 
                </section>                      
            </div>
                <div class="hero">
                    <div class="hero__content">
                        <section class="products">
                    <div class="section-heading">
                        <h2>Happy Admin</h2>
                    </div>
                    <div id="client-container" class="product_container">
                        <div class="card-container">
                            <div class="card">
                                <img src="images/Joey.jpg" alt="">
                            </div>
                            <h3 id="h3_1">SANG</h3>
                        </div>
                        <div class="card-container">
                            <div class="card">
                                <img src="images/DeeDee.jpg" alt="">
                            </div>
                            <h3 id="h3_2">TRUNG</h3>
                        </div>
                        <div class="card-container">
                            <div class="card">
                                <img src="images/Marky.jpg" alt="">
                            </div>
                            <h3 id="h3_3">NHAT</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

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