<?php 
//    session_start();

//    include("../LoginForm/php/config.php");
//    if(!isset($_SESSION['valid'])){
//     header("Location: index.php");
//    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .site-footer {
            margin-top: auto;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            display: flex;
            justify-content: space-around;
        }

        .footer-section {
            flex: 1;
            padding: 0 10px;
        }

        .footer-section p {
            margin: 5px 0;
        }

        .footer-section p:first-child {
            font-weight: bold;
        }

        .footer-section p:last-child {
            margin-bottom: 10px;
        }

        .footer-section a {
            color: white;
            text-decoration: none;
        }

        .footer-section a:hover {
            text-decoration: underline;
        }

        .sign-out{
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .btn{
            height: 35px;
            background: black;
            border: 0;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: all .3s;
            margin-top: 10px;
            padding: 0px 10px;
        }
        .btn:hover{
            opacity: 0.82;
            color: red;
        }
    </style>
</head>
<body>
    <footer class="site-footer">
        <div class="footer-section">
            <p>ABOUT US</p>
            <p>🔗 Our Story</p>
            <p>🔗 Our Mission</p>
            <p>🔗 Our Vision</p>
            <p>🔗 Our Team</p>
            <p>🔗 Our Partners</p>
            <p>🔗 Our Services</p>            
        </div>

        <div class="footer-section">
            <p>✉️ CONTACT US: Shopping@gmail.com</p>
            <p>📞 HOTLINE: 0123456789</p>
            <p>🏢 ADDRESS: 123 Shopping Street, Shopping City, Shopping Country</p>
            <p>📱 FOLLOW US ON SOCIAL MEDIA</p>
            <p>🔗 Facebook: Shopping</p>
            <p>🔗 Instagram: Shopping</p>
            <p>🔗 Twitter: Shopping</p>
        </div>


        <div class="footer-section">
            <a href="../LoginForm/logout.php"> <button class="btn">Log Out</button> </a> 
            <br>   
            <br>   
            <br>   
            <br>   
            <a href="../LoginForm/edit.php"> <button class="btn">Change Profile</button> </a>    
        </div>      
        
    </footer>
</body>
</html>