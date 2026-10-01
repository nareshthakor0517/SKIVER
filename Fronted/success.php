<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.4/lottie.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .success-box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .lottie-container {
            width: 150px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="success-box">
        <div class="lottie-container" id="success-animation"></div>
        <h2 class="text-success">Order Placed Successfully!</h2>
        <p>Thank you for your purchase. Your order has been successfully placed.</p>
        <a href="../Home_page/home_page.php" class="btn btn-primary">Back to Home</a>
    </div>

    <script>
        var animation = lottie.loadAnimation({
            container: document.getElementById('success-animation'),
            renderer: 'svg',
            loop: false,
            autoplay: true,
            path: 'https://assets3.lottiefiles.com/packages/lf20_jtbfg2nb.json'
        });
    </script>
</body>
</html>
