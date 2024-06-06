<!DOCTYPE html>
<html lang="lt">
    <head>
        <title>Registracija</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
    </head>
    <body>
        <form action="signup-check.php" method="post">
            <h2>Registracija</h2>
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
                Vardas
                <?php if (isset($_GET['first_name'])) { ?>
                    <input type="text"
                           name="first_name"
                           placeholder="Vardas"
                           value="<?php echo $_GET['first_name']; ?>"><br>
                <?php } else { ?>
                    <input type="text"
                           name="first_name"
                           placeholder="Vardas"><br>
                <?php } ?>
            </label>

            <label>
                Pavardė
                <?php if (isset($_GET['last_name'])) { ?>
                    <input type="text"
                           name="last_name"
                           placeholder="Pavardė"
                           value="<?php echo $_GET['last_name']; ?>"><br>
                <?php } else { ?>
                    <input type="text"
                           name="last_name"
                           placeholder="Pavardė"><br>
                <?php } ?>
            </label>

            <label>
                Pavardė
                <?php if (isset($_GET['email'])) { ?>
                    <input type="text"
                           name="email"
                           placeholder="El. paštas"
                           value="<?php echo $_GET['email']; ?>"><br>
                <?php } else { ?>
                    <input type="text"
                           name="email"
                           placeholder="El. paštas"><br>
                <?php } ?>
            </label>

            <label>
                Slaptažodis
                <input type="password"
                       name="password"
                       placeholder="Slaptažodis">
            </label>

            <label>
                Pakartoti slaptažodį
                <input type="password"
                       name="confirm_password"
                       placeholder="Pakartoti slaptažodį">
            </label>

            <button type="submit">Sign Up</button>
            <a href="index.php" class="ca">Already have an account?</a>
        </form>
    </body>
</html>