<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trường Đại học ABC</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .menu {
            background-color: #343a40;
            padding: 10px 0;
        }
        .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .menu ul li {
            display: inline;
        }
        .menu ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }
        .menu ul li a:hover {
            background-color: #666;
        }
        .content {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Trường Đại học ABC</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="studentlistuser.php">StudentLists</a></li>
            <li><a href="logincheck.php">Login</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="content">
            <h2>Chào mừng bạn đến với Trường Đại học ABC</h2>
            <p>Trường Đại học ABC cam kết cung cấp một môi trường học tập và nghiên cứu chất lượng cao, giúp sinh viên phát triển toàn diện về kiến thức và kỹ năng.</p>
            <p>Hãy khám phá thêm về chúng tôi và các chương trình học tại trường.</p>
        </div>
    </div>

    <div class="footer">
        <p>&copy; <?php echo date("Y"); ?> Trường Đại học ABC. All rights reserved.</p>
    </div>
</body>
</html>
