<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare(query: $sql);
    $stmt->bind_param("ss", $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Đăng ký thành công! <a href='login.php'>Đăng nhập ngay</a>";
    } else {
        echo "Lỗi: " . $stmt->error;
    }
    header("location: login.php");
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <h1>Đăng kí</h1>
            <form action="register.php" method="POST">

                <label for="">name: </label>
                <input type="text" name="username" id="" class="form-control"><br>
                <label for="">email: </label>
                <input type="text" name="email" id="" class="form-control"><br>
                <label for="">password: </label>
                <input type="password" name="password" id="" class="form-control"><br>
                <button type="submit" name="submit" class="btn btn-success">submit</button>

            </form>
        </div>
    </div>
</body>

</html>