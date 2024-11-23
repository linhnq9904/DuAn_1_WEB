<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            echo "Đăng nhập thành công!";
        } else {
            echo "Sai mật khẩu!";
        }
    } else {
        echo "Tài khoản không tồn tại!";
    }
    header("location: ../index.html");

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
            <h1>Login</h1>
            <form action="login.php" method="POST">

                <label for="">email: </label>
                <input type="text" name="email" id="" class="form-control"><br>
                <label for="">password: </label>
                <input type="password" name="password" id="" class="form-control"><br>
                <button type="submit" name="submit" class="btn btn-success">login</button>

            </form>
        </div>
    </div>
</body>

</html>