<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Lists</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Các đoạn mã CSS khác nếu cần -->
</head>
<body>
    <div class="container">
        <div class="content">
            <h2>Danh sách sinh viên</h2>
            <!-- Đoạn mã PHP để lấy và hiển thị danh sách sinh viên từ cơ sở dữ liệu -->
            <?php
                // Kết nối đến cơ sở dữ liệu và truy vấn dữ liệu sinh viên
                include "db_conn.php";
                $sql = "SELECT * FROM students";
                $result = mysqli_query($conn, $sql);

                // Hiển thị danh sách sinh viên trong một bảng HTML
                echo "<table class='table'>";
                echo "<thead><tr><th>Rollno</th><th>Student Name</th><th>Address</th><th>Email</th></tr></thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>".$row['Rollno']."</td><td>".$row['Sname']."</td><td>".$row['Address']."</td><td>".$row['Email']."</td></tr>";
                }
                echo "</tbody></table>";
            ?>
        </div>
    </div>
</body>
</html>
