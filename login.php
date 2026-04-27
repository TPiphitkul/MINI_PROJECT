<?php
require 'config.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $_POST['username'], $_POST['password']);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $_SESSION['login'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Username หรือ Password ไม่ถูกต้อง";
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Login | Book Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #2196f3, #e3f2fd);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        .login-card {
            width: 500px;
            background: rgba(255,255,255,0.95);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(33,150,243,0.3);
        }

        .login-title {
            color: #1976d2;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #1976d2;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1565c0;
        }
    </style>
</head>
<body>

<div class="login-card p-4">
    <h4 class="text-center login-title mb-3">
        📘 ระบบจัดการหนังสือ
    </h4>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input class="form-control" name="username" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <button class="btn btn-primary w-100">Login</button>

        <?php if ($error): ?>
            <div class="text-danger text-center mt-3">
                <?= $error ?>
            </div>
        <?php endif; ?>
    </form>
</div>

</body>
</html>