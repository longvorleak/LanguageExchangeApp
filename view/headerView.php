<header>
    <div id="hamburger">
        <input type="checkbox" />
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>

        <ul id="hamburger-menu">
            <a href=<?= BASE . "/index.php?action=login" ?>>
                <li class="li-menu">Log In/Up</li>
            </a>
            <a href=<?= BASE . "/index.php?action=landing" ?>>
                <li class="li-menu">Home</li>
            </a>
            <a href=<?= BASE . "/index.php?action=aboutUs" ?>>
                <li class="li-menu">About Us</li>
            </a>
            <a href=<?= BASE . "/index.php?action=premium" ?>>
                <li class="li-menu">Premium</li>
            </a>
            <a href=<?= BASE . "/index.php?action=profileEdit" ?>>
                <li class="li-menu">Profile Edit</li>
            </a>

            <a href="#" class="language" class="menu">
                <li>Language</li>
            </a>
            <ul class="language-popup">
                <li class="li-menu"><a href="#">English</a></li>
                <li class="li-menu"><a href="#">Korean</a></li>
                <li class="li-menu"><a href="#">Spanish</a></li>
                <li class="li-menu"><a href="#">Dutch</a></li>
            </ul>
        </ul>
    </div>

    <div id="no-hamburger">
        <a href="./index.php">
            <div class="logo">
                <img src="https://4m4you.com/wp-content/uploads/2020/06/logo-placeholder-300x120.png" id="logo-img">
            </div>
        </a>
        <div>
            <span class="header-right">
                <span class="header-animation"><a href=<?= BASE . "/index.php?action=aboutUs" ?> class="menu">About us</a></span>
                <span class="header-animation"><a href=<?= BASE . "/index.php?action=premium" ?> class="menu">Premium</a></span>
                <span class="header-animation">
                    <a href="#" id="language" class="menu">Language</a>
                    <ul class="language-popup">
                        <li class="li-menu"><a href="#">English</a></li>
                        <li class="li-menu"><a href="#">Korean</a></li>
                        <li class="li-menu"><a href="#">Spanish</a></li>
                        <li class="li-menu"><a href="#">Dutch</a></li>
                        <li class="li-menu"><a href="#">Turkish</a></li>
                    </ul>
                </span>

                <a href=<?= BASE . "/index.php?action=login" ?> id="signInUp">Sign In/Sign up</a>
            </span>
        </div>
    </div>
</header>