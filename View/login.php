<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/main.css">
    <title>MVC</title>
</head>

<body>
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="text-display">
            <?php if (!empty($_SESSION['error'])) { ?>
                <p style="color: red;"><?php echo $_SESSION['error'] ?></p>
            <?php } ?>
        </div>
    <?php } ?>

    <h1 class="text-page">Login</h1>

    <form action="../Controller/User/user_proc.php" method="post" class="form-control">

        <div class="mt-3">
            <label class="col-sm-2 col-form-label">Name</label>
            <input class="form-control form-control-sm" type="text" name="name" placeholder="John Doe">
        </div>

        <div class="mt-3">
            <!-- <label class="col-sm-2 col-form-label">Age</label> -->
            <input class="form-control form-control-sm" type="hidden" name="age" value="20" placeholder="6">
        </div>

        <div class="mt-3">
            <label class="col-sm-2 col-form-label">Password</label>
            <input class="form-control form-control-sm" name="password" type="text">
        </div>
        <div class="mt-3">
            <input type="submit" name="action" value="Login" class="mt-2">
        </div>

        <a href="register.php" class="mt-4">Don't have an account?</a>

    </form>
</body>
<script src="../Functions/main.js"></script>

</html>