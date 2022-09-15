<?php $css = "../public/css/home.css"; ?>
<?php $script = "./public/js/script.js"; ?>
<?php $title = "Dashboard" ?>

<?php ob_start();?>
    <section class="dashboard">
        <h2>Menu</h2>
        <ul>
            <li><img src="https://cdn-icons-png.flaticon.com/512/149/149071.png"/>My Account</li>
            <li><i class="fa-solid fa-house"></i>Home</li>
            <li><i class="fa-solid fa-user-group"></i>Browse</li>
            <li><i class="fa-solid fa-graduation-cap"></i>Learn</li>
            <li><i class="fa-solid fa-calendar"></i>Events</li>
            <li><i class="fa-solid fa-gear"></i>Settings</li>
        </ul>
        <div class="dashboard-bottom">
            <div>
                <p>Upgrade</p>
                <p>Learn more</p>
            </div>
            <a href="#">Sign out</a>
        </div>
    </section>
    <section class="middle-section">

        <div class="middle1">
            <h2>Home</h2>
            <p>language selector</p>
        </div>

        <div class="middle2">
            <div class="card">some info</div>
            <div class="card">some info</div>
            <div class="card">some info</div>
        </div>

        <div class="middle3">
            <div>some info</div>
            <div>some info</div>
        </div>

        <!-- blog feed -->
        <div class="middle4">
            blog feed
        </div>

    </section>
    <section class="right-section">
        <div class="right1">
            <h2>schedule</h2>
            <div>
                schedule
            </div>
        </div>
        <div class="right2">
            <p>friends</p>
            <div>
                friends list
            </div>
    </section>
    
<?php $content = ob_get_clean(); ?>

<?php require("template.php") ?>