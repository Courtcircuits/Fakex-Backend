<nav>
    <div>
        <a href="frontController.php?action=readAll&controller=modele" style="color: inherit; text-decoration: none;"><img src="./img/logo.png" alt="dennis ritchie" ></a>
        <div id="logo" >
            <a href="frontController.php?action=readAll&controller=modele" style="color: inherit; text-decoration: none;">
                <p>FA<sup>TM</sup></p>
                <p>KEX</p>
            </a>
        </div>
    </div>
    <div>
        <ul>
            <li><a href="frontController.php?action=connexionCreateur&controller=utilisateur">Creators</a></li>
            <li><a href="frontController.php?action=readMen&controller=modele">Men</a></li>
            <li><a href="frontController.php?action=readWomen&controller=modele">Women</a></li>
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                // L'utilisateur est connecté
                echo '<li><a href="frontController.php?action=deconnexion&controller=utilisateur">Log out</a></li><li><a>' . $_SESSION['login'] . '</a</li>';
            } else {
                // L'utilisateur n'est pas connecté
                echo '<li><a href="frontController.php?action=connexionUtilisateur&controller=utilisateur">Log in</a></li>';
            }
            ?>

        </ul>

    </div>
    <div id="icons">
        <li id="showCart"><p>
                <?php
                require __DIR__."/../../web/img/cart.svg";
                ?>
            </p>
        </li>
        <li id="searchbar" class="deactivated">
            <form>
                <input type="text" placeholder="Rechercher..." id="searchbar-input">
            </form>
            <div id="suggestions">
                <ol>

                </ol>
            </div>

            <a id="trigger">
                <?php
                require __DIR__."/../../web/img/magnify.svg";
                ?>
            </a></li>
        <li><a href="fav">
                <?php
                require __DIR__."/../../web/img/heart.svg";
                ?>
            </a></li>
    </div>
</nav>