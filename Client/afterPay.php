<!DOCTYPE html>
<html>
<head>
    <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }

    .container {
      text-align: center;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #fff;
    }

    button {
      margin-top: 20px;
      padding: 10px 20px;
      border: none;
      background-color: #4CAF50;
      color: #fff;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
    </style>
</head>
<body>

    <div class="container">
        <h2>Bạn đã mua hàng thành công</h2>
        <button onclick="location.href='shop_products.php'">Quay lại cửa hàng</button>
    </div>

</body>
</html>
