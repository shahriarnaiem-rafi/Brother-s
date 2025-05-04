<!-- user_login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Brother's Shop</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-info text-white text-center">
                    <h4>Login to Your Account</h4>
                </div>
                <div class="card-body">
                    <form action="user_login.php" method="post">
                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="user_email" name="user_email" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="user_password" name="user_password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="user_login" class="btn btn-info text-white">Login</button>
                        </div>
                        <div class="text-center mt-3">
                            <small>Don't have an account? <a href="user_registration.php">Register here</a></small>
                        </div>
                    </form>
                </div>
            </div><br>
        </div>
    </div>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
