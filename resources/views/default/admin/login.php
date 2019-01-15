<?php
/** @var \Ffcms\Templex\Template\Template $this */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link href="assets/npm/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/admin-login.css" rel="stylesheet">
    <meta name="robots" content="noindex, nofollow, noarchive" />
</head>
<body id="LoginForm">
<div class="container">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Admin Login</h2>
            </div>
            <form id="Login" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="Login" />
            </form>
        </div>
    </div>
</div>

<script src="assets/npm/node_modules/jquery/dist/jquery.min.js"></script>
<script src="assets/npm/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>