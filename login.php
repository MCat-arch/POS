<?php

    session_start();

    $error_message = '';
    // Display logout message if present
    if (isset($_GET['message']) && $_GET['message'] === 'logout_success') {
        $error_message = "You have been logged out successfully.";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    include('database/connection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = 'SELECT * FROM users WHERE users.first_name = :username AND users.password = :password LIMIT 1';
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetchAll()[0];
        $_SESSION['user'] = $user;

        header('Location: http://localhost/pos/dashboard.php');
        exit; // Important to stop further script execution
    } else {
        $error_message = "Invalid Credentials!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container">
    <div id="toast" class="toast hide">
        <span id="toast-message"></span>
    </div>

        <!-- Bagian Form Login -->
        <div class="login">
            <h1>System Management Inventory</h1>
            <h3>Kutoarjo Grosir</h3>
        </div>

         <!-- Bagian Gambar -->
        <div class="content">
         <div class="login_img">
            <img src="images/login_img.png" alt="Login Image">
        </div>

        <div class="login_form">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="form-control" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
        </div>
    </div>
<script>
   function showToast(message) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            
            toastMessage.innerText = message;
            toast.classList.remove('hide');
            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
                toast.classList.add('hide');
            }, 3000);
        }

        <?php if (!empty($error_message)): ?>
            showToast("<?= $error_message ?>");
        <?php endif; ?>
</script>
</body>
</html>
