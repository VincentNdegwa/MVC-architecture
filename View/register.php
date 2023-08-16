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
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="text-display">
            <?php if (!empty($_SESSION['message'])) { ?>
                <p style="color: green;"><?php echo $_SESSION['message'] ?></p>
            <?php } ?>
        </div>
    <?php } ?>

    <h1 class="text-page">Register</h1>
    <form action="../Controller/User/user_proc.php" method="post" class="form-control">

        <div class="mt-3">
            <label class="col-sm-2 col-form-label">Name</label>
            <input class="form-control form-control-sm" type="text" name="name" placeholder="John Doe">
        </div>

        <div class="mt-3">
            <label class="col-sm-2 col-form-label">Age</label>
            <input class="form-control form-control-sm" type="number" name="age" placeholder="6">
        </div>

        <div class="mt-3">
            <label class="col-sm-2 col-form-label">Password</label>
            <input class="form-control form-control-sm" name="password" type="text">
        </div>
        <div class="mt-3">
            <label class="col-sm-2 col-form-label">Conf-Password</label>
            <input class="form-control form-control-sm" name="confpassword" type="text">
        </div>
        <div class="mt-3">
            <input type="submit" name="action" value="Register" class="mt-2">
        </div>
        <a href="login.php" class="mt-4">Have an account?</a>
    </form>
</body>
<script src="../Functions/main.js"></script>

</html>