<link rel="stylesheet" href=<?= BASE . "/public/css/side_menu.css" ?>>

<section class="dashboard">
    <h2>Menu</h2>
    <nav role='navigation'>
        <div id="menuToggle">

            <input id="hamburger-checkbox" type="checkbox" />

            <span class="hamburger-span"></span>
            <span class="hamburger-span"></span>
            <span class="hamburger-span"></span>
            <ul id="menu">
                <a href="#">
                    <li><img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" />My Account</li>
                </a>
                <a href=<?= BASE . "/index.php?action=profileEdit" ?>>
                    <?php if (!$_SESSION['photo']) {
                    ?>
                        <li><i class="fa-solid fa-user"></i>Profile Photo</li>
                    <?php
                    } else {
                    ?>
                        <li id="menu-photo">
                            <img src=<?php
                                        if (str_contains($_SESSION['photo'], "https")) {
                                            echo $_SESSION['photo'];
                                        } else {
                                            echo  "./public/uploadedImages/{$_SESSION['photo']}" ?> class="profile-photo" ; } ?>
                            Profile Photo
                        </li>
                <?php
                                        }
                                    }
                ?>
                </a>
                <a href="#">
                    <li><i class="fa-solid fa-house home-icon"></i>Dashboard</li>
                </a>
                <a href="#">
                    <li><i class="fa-solid fa-user-group home-icon"></i>Browse</li>
                </a>
                <a href="#">
                    <li><i class="fa-solid fa-graduation-cap home-icon"></i>Learn</li>
                </a>
                <a href="#">
                    <li><i class="fa-solid fa-calendar home-icon"></i>Events</li>
                </a>
                <a href=<?= BASE . "/index.php?action=settings" ?>>
                    <li><i class="fa-solid fa-gear home-icon"></i>Settings</li>
                </a>
                <br>
                <a href="#">
                    <li>Upgrade</li>
                </a>
                <br>
                <a href=<?= BASE . "/index.php?action=signOut" ?> class="g_id_signout">
                    <li>Sign out</li>
                </a>
            </ul>
        </div>
    </nav>
</section>