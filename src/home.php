<?php
session_start();

include "db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    $query = "SELECT users.id, users.first_name, users.last_name, users.email, COUNT(p.id) AS poke_count
                    FROM users
                    LEFT JOIN pokes p ON users.id = p.to
                    GROUP BY users.id";

    $response = mysqli_query($conn, $query);

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>Material Design Lite</title>

        <meta name="mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="192x192" href="images/android-desktop.png">

        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Material Design Lite">
        <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#3372DF">

        <link rel="shortcut icon" href="images/favicon.png">

        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Home</span>
                <div class="mdl-layout-spacer"></div>
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                    <i class="material-icons">more_vert</i>
                </button>
                <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                    <li class="mdl-menu__item">About</li>
                    <li class="mdl-menu__item">Contact</li>
                    <li class="mdl-menu__item">Legal information</li>
                </ul>
            </div>
        </header>
        <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
            <header class="demo-drawer-header">
                <img src="images/user.jpg" class="demo-avatar">
                <div class="demo-avatar-dropdown">
                    <span>Sveiki, <?php echo $_SESSION['username']; ?></span>
                    <div class="mdl-layout-spacer"></div>
                    <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons" role="presentation">arrow_drop_down</i>
                        <span class="visuallyhidden">Accounts</span>
                    </button>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                        <li class="mdl-menu__item">
                            <a href="logout.php">Atsijungti</a>
                        </li>
                        <li class="mdl-menu__item">info@example.com</li>
                        <li class="mdl-menu__item"><i class="material-icons">add</i>Add another account...</li>
                    </ul>
                </div>
            </header>
            <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                           role="presentation">home</i>Namai</a>
                <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                           role="presentation">star</i>Paspausk mane</a>
            </nav>
        </div>
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Vardas</th>
                        <th>Pavardė</th>
                        <th>Email</th>
                        <th>Poke</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($i = mysqli_fetch_assoc($response)) {
                        if ($i['id'] !== $_SESSION['id']) { ?>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo $i['first_name']; ?></td>
                                <td><?php echo $i['last_name']; ?></td>
                                <td><?php echo $i['email']; ?></td>
                                <td><?php echo $i['poke_count']; ?></td>
                                <td>
                                    <form action="poke_action.php" method="post">
                                        <input type="hidden" name="to_user_id" value="
                                    <?php echo $i['id']; ?>">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                                            Poke
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    </body>
    </html>

    <?php
} else {
    header("Location: index.php");
    exit();
}
