<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background-color: #fff;
        }
        caption {
            font-size: 24px;
            margin-bottom: 10px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"], input[type="reset"], .cancel-btn {
            padding: 10px 20px;
            margin: 10px 5px 0 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover, input[type="reset"]:hover, .cancel-btn:hover {
            background-color: #218838; /* Màu nền xanh lá cây nhạt khi hover */
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
    include "db_conn.php";

    // Xử lý thêm sinh viên
    if(isset($_POST['btnAdd'])) {
        $Rollno = $_POST['Rollno'];
        $Sname = $_POST['Sname'];
        $Address = $_POST['Address'];
        $Email = $_POST['Email'];
        
        if($Rollno=="" || $Sname=="" || $Address=="" || $Email=="") {
            echo "<div class='error'>(*) is not empty</div>";
        } else {
            $sql = "SELECT Rollno FROM students WHERE Rollno='$Rollno'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)==0) {
                $sql = "INSERT INTO students VALUES ('$Rollno', '$Sname', '$Address', '$Email')";
                mysqli_query($conn,$sql);
                echo '<meta http-equiv="refresh" content="0; URL=StudentList.php">';
            } else {
                echo "<div class='error'>Existed student in list</div>";
            }
        }
    }

    // Xử lý xóa sinh viên
    if(isset($_GET['action']) && isset($_GET['Rollno']) && $_GET['action'] == 'delete') {
        $Rollno = $_GET['Rollno'];
        $sql = "DELETE FROM students WHERE Rollno='$Rollno'";
        mysqli_query($conn, $sql);
        echo '<meta http-equiv="refresh" content="0; URL=StudentList.php">';
    }

    // Xử lý tìm sinh viên theo tên hoặc email
    if(isset($_POST['btnSearch'])) {
        $searchKeyword = $_POST['searchKeyword'];
        $sql = "SELECT * FROM students WHERE Sname LIKE '%$searchKeyword%' OR Email LIKE '%$searchKeyword%'";
        $result = mysqli_query($conn, $sql);
    } else {
        // Nếu không có dữ liệu tìm kiếm, hiển thị tất cả sinh viên
        $sql = "SELECT * FROM students";
        $result = mysqli_query($conn, $sql);
    }

    // Xử lý chỉnh sửa sinh viên
    if(isset($_GET['action']) && isset($_GET['Rollno']) && $_GET['action'] == 'edit') {
        $Rollno = $_GET['Rollno'];
        $sql = "SELECT * FROM students WHERE Rollno='$Rollno'";
        $result_edit = mysqli_query($conn, $sql);
        $row_edit = mysqli_fetch_assoc($result_edit);
        ?>

        <!-- Form chỉnh sửa thông tin sinh viên -->
        <form method="post" id="EditStudent">
            <table align="center" border="0" cellpadding="1" cellspacing="1">
                <caption align="center"><b>Edit Student</b></caption> 
                <tr>
                    <td>Rollno</td>
                    <td><input type="text" name="Rollno" value="<?php echo $row_edit['Rollno']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Student Name</td>
                    <td><input type="text" name="Sname" value="<?php echo $row_edit['Sname']; ?>"></td>
                </tr>
                <tr>
                    <td>Student Address</td>
                    <td><input type="text" name="Address" value="<?php echo $row_edit['Address']; ?>"></td>
                </tr>
                <tr>
                    <td>Student Email</td>
                    <td><input type="text" name="Email" value="<?php echo $row_edit['Email']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Save" name="btnSave">
                        <a href="StudentList.php" class="cancel-btn">Cancel</a>
                    </td>
                </tr>
            </table>
        </form>

    <?php
    }

    // Xử lý lưu thông tin sau khi chỉnh sửa
    if(isset($_POST['btnSave'])) {
        $Rollno = $_POST['Rollno'];
        $Sname = $_POST['Sname'];
        $Address = $_POST['Address'];
        $Email = $_POST['Email'];

        $sql = "UPDATE students SET Sname='$Sname', Address='$Address', Email='$Email' WHERE Rollno='$Rollno'";
        mysqli_query($conn, $sql);
        echo '<meta http-equiv="refresh" content="0; URL=StudentList.php">';
    }
    ?>

    <form method="post" id="SearchStudent">
        <caption align="center"><b>Search Student</b></caption> 
        <tr>
            <td><input type="text" name="searchKeyword" placeholder="Enter name or email to search"></td>
            <td><input type="submit" value="Search" name="btnSearch"/></td>
        </tr>
    </form>

    <!-- Form thêm sinh viên -->
    <?php
    if(isset($_GET['action']) && $_GET['action'] == 'add') {
    ?>
    <form method="post" id="AddStudent">
        <table align="center" border="0" cellpadding="1" cellspacing="1">
            <caption align="center"><b>Adding Student</b></caption> 
            <tr>
                <td>Rollno</td>
                <td><input type="text" name="Rollno"/></td>
            </tr>

            <tr>
                <td>Student Name</td>
                <td><input type="text" name="Sname"/></td>
            </tr>

            <tr>
                <td>Student Address</td>
                <td><input type="text" name="Address"/></td>
            </tr>

            <tr>
                <td>Student Email</td>
                <td><input type="text" name="Email"/></td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Add" name="btnAdd"/>
                    <a href="StudentList.php" class="cancel-btn">Cancel</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>

    <!-- Nút hiển thị form thêm sinh viên -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="?action=add" style="text-decoration: none; color: #fff; background-color: #007bff; padding: 10px 20px; border-radius: 5px;">Add Student</a>
    </div>

    <!-- Hiển thị danh sách sinh viên -->
    <table align="center" border="1px" cellpadding="0" cellspacing="0">
        <caption align="center">Student List</caption>
        <tr>
            <th>Rollno</th>
            <th>Student Fullname</th>
            <th>Address</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {        
        ?>
        <tr>
            <td><?php echo $row['Rollno']; ?></td>
            <td><?php echo $row['Sname']; ?></td>
            <td><?php echo $row['Address']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td>
                <!-- Nút chỉnh sửa -->
                <a href="?action=edit&Rollno=<?php echo $row['Rollno']; ?>">Edit</a>
                <!-- Nút xóa -->
                <a href="?action=delete&Rollno=<?php echo $row['Rollno']; ?>" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

    <!-- Nút đăng xuất -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="logout.php" style="text-decoration: none; color: #fff; background-color: #dc3545; padding: 10px 20px; border-radius: 5px;">Logout</a>
    </div>

</body>
</html>
