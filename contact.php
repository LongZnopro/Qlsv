<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 30px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            height: 150px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .contact-info {
            margin-top: 30px;
        }
        .contact-info p {
            margin-bottom: 10px;
            color: #666;
        }
        .social-links {
            text-align: center;
            margin-top: 20px;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #333;
            text-decoration: none;
            font-size: 20px;
            transition: color 0.3s;
        }
        .social-links a:hover {
            color: #007bff;
        }
        .success-message {
            text-align: center;
            color: #007bff;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Xử lý form khi submit
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            // Kiểm tra xem các trường đã được điền đầy đủ chưa
            if (!empty($name) && !empty($email) && !empty($message)) {
                // Gửi email hoặc lưu vào cơ sở dữ liệu
                // Ở đây chỉ hiển thị thông báo thành công
                echo "<div class='success-message'>Thank you for your feedback!</div>";
            }
        }
        ?>
        <form action="#" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" value="Send Message">
        </form>

        <div class="contact-info">
            <p><i class="fas fa-map-marker-alt"></i> University Address, City, Country</p>
            <p><i class="fas fa-phone-alt"></i> +123456789</p>
            <p><i class="fas fa-envelope"></i> info@university.com</p>
        </div>

        <div class="social-links">
            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</body>
</html>
