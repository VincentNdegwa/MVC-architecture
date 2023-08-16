<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/main.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Home</title>
</head>

<body>
    <header>
        <a href="" class="header-item">
            <i class='bx bx-edit'></i>
        </a>

        <a href="" class="header-item">
            <i class='bx bx-trash'></i>
        </a>

        <a href="" class="header-item">
            <i class='bx bx-happy-beaming'></i>
        </a>

        <a href="../logout.php" class="header-item">
            <i class='bx bxs-exit'></i>
        </a>


    </header>

    <?php if (isset($_SESSION['message']) || isset($_SESSION['error'])) { ?>
        <div class="text-display">
            <?php if (!empty($_SESSION['message'])) { ?>
                <p style="color: green;"><?php echo $_SESSION['message'] ?></p>
            <?php } elseif (!empty($_SESSION['error'])) { ?>
                <p style="color: red;"><?php echo $_SESSION['error'] ?></p>
            <?php } ?>
        </div>
    <?php } ?>

    <main>
        <h1>hello</h1>
    </main>
</body>
<script src="../Functions/main.js"></script>

</html>