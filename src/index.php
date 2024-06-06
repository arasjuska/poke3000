<!DOCTYPE html>
<html lang="lt">
    <head>
        <title>Prisijungimas</title>
        <link rel="stylesheet" type="text/css" href="./css/styles.css">
    </head>
    <body>
        <form action="login.php" method="post">
            <h2>Prisijungimas</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <label>
                Vartotojo vardas
                <?php if (isset($_GET['username'])) { ?>
                    <input type="text"
                           name="name"
                           placeholder="Vartotojo vardas"
                           value="<?php echo $_GET['username']; ?>"><br>
                <?php } else { ?>
                    <input type="text"
                           name="username"
                           placeholder="Vartotojo vardas"><br>
                <?php } ?>
            </label>

            <label>
                Slaptažodis
                <input type="password"
                       name="password"
                       placeholder="Slaptažodis">
            </label>

            <button type="submit">Prisijungti</button>
            <a href="signup.php" class="ca">Nauja paskyra</a>
        </form>
    </body>
</html>