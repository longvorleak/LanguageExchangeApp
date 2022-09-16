<header>
    <div id="hamburger">
        <input type="checkbox" />
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>

        <ul id="hamburger-menu">
            <a href=<?= BASE . "./index.php?action=loginSignUp" ?>>
                <li>Log In</li>
            </a>
            <a href=<?= BASE . "./index.php?action=loginSignUp" ?>>
                <li>Sign Up</li>
            </a>
            <a href=<?= BASE . "./index.php?action=landing" ?>>
                <li>Home</li>
            </a>
            <a href=<?= BASE . "./index.php?action=aboutUs" ?>>
                <li>About Us</li>
            </a>
            <a href=<?= BASE . "./index.php?action=premium" ?>>
                <li>Premium</li>
            </a>

            <a href="#" class="language" class="menu">
                <li>Language</li>
            </a>
            <ul class="language-popup">
                <li><a href="#">English</a></li>
                <li><a href="#">Korean</a></li>
                <li><a href="#">Spanish</a></li>
                <li><a href="#">Dutch</a></li>
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
                <span class="header-animation"><a href=<?= BASE . "./index.php?action=aboutus" ?> class="menu">About us</a></span>
                <span class="header-animation"><a href=<?= BASE . "./index.php?action=premium" ?> class="menu">Premium</a></span>
                <span class="header-animation">
                    <a href="#" id="language" class="menu">Language</a>
                    <ul class="language-popup">
                        <li><a href="#">English</a></li>
                        <li><a href="#">Korean</a></li>
                        <li><a href="#">Spanish</a></li>
                        <li><a href="#">Dutch</a></li>
                    </ul>
                </span>

                <a href=<?= BASE . "./index.php?action=login" ?> id="login">Log in</a>
                <a href=<?= BASE . "./index.php?action=login" ?> id="signup">Sign up</a>

            </span>
        </div>
    </div>
</header>