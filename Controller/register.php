<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $re_enter = trim($_POST['re_enter']);
    $username = trim($_POST['username']);

    $errorRequire = $errorEmail = $errorRe_enter = "";
    $errorCount =   0;

    if (empty($username) || empty($email) || empty($password) || empty($re_enter)) {
        $errorRequire = 'không được để trống!';
        $errorCount += 1;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = 'không đúng định dạng email!';
        $errorCount += 1;
    }

    if ($password !== $re_enter) {
        $errorRe_enter = 'Passwords do not match!';
        $errorCount += 1;
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (email, password, username) VALUES (?, ?, ?)";
    $stmt = $conn->prepare(query: $sql);
    $stmt->bind_param("sss", $email, $hashed_password, $username);

    if ($stmt->execute()) {
        exit();
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
            <form action="register.php<?= $_SERVER['PHP_SELF'] ?>" method="POST">

                <label for="">name: </label>
                <input type="text" name="username" id="" class="form-control"><br>
                <span style="color: red;"><?= $errorRequire ?></span><br>
                <label for="">email: </label>
                <input type="text" name="email" id="" class="form-control"><br>
                <span style="color: red;"><?= $errorRequire ?></span>
                <span style="color: red;"><?= $errorEmail ?></span><br>
                <label for="">password: </label>
                <input type="password" name="password" id="" class="form-control"><br>
                <span style="color: red;"><?= $errorRequire ?></span><br>
                <label for="">re-enter password: </label>
                <input type="password" name="re_enter" id="" class="form-control"><br>
                <span style="color: red;"><?= $errorRequire ?></span>
                <span style="color: red;"><?= $errorRe_enter ?></span><br>
                <button type="submit" name="submit" class="btn btn-success">submit</button>

            </form>
        </div>
    </div>
</body>

</html>