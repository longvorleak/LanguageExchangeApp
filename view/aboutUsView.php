<?php $css = "./public/css/aboutUs.css"; ?>
<?php $title = "About Us"; ?>

<?php ob_start(); ?>

<div class="dark">
    <div class="section-header">
        <h1>Who We Are</h1>
    </div>
    <p>We're a global team of language and technology lovers, with offices and team members in nearly every continent! Our mission is to connect the world through language, culture, and community. With over 30 million members, you're in good company.</p>
</div>

<div class="light">
    <div class="section-header">
        <h1>The Team</h1>
    </div>
    <div class="team">
        <div class="member">
            <img src="https://i.pravatar.cc/250?img=2 ?>" alt="member" title="member picture" class="profile" />
            <p class="name">Mike</p>
            <p class="position">Team member</p>
        </div>
        <div class="member">
            <img src="https://i.pravatar.cc/250?img=33 ?>" alt="member" title="member picture" class="profile" />
            <p class="name">Sam</p>
            <p class="position">Team member</p>
        </div>
        <div class="member">
            <img src="https://i.pravatar.cc/250?img=<?= rand(1, 70) ?>" alt="member" title="member picture" class="profile" />
            <p class="name">Sude</p>
            <p class="position">Team member</p>
        </div>
        <div class="member">
            <img src="https://i.pravatar.cc/250?img=54" alt="member" title="member picture" class="profile" />
            <p class="name">Vorleak</p>
            <p class="position">Team member</p>
        </div>
    </div>
</div>

<div class="dark">
    <div class="section-header">
        <h1>Contact Us</h1>
    </div>
    <div class="contact">
        <div>
            <h4>General Inquiries</h4>
            <i class="fa-solid fa-comment-dots"></i>
            <p class="contact-text">You can reach us by email for press, partnerships, and any other general inquiries. We'd love to hear from you!</p>
            <a href="mailto:" class="about-button">Contact us</a>
        </div>
        <div>
            <h4>Customer Support</h4>
            <i class="fa-solid fa-envelope"></i>
            <p class="contact-text">Please send us your feedback, feature suggestion or let us know is something is not working as expected.</p>
            <a href="mailto:" class="about-button">Email us</a>
        </div>
        <div>
            <h4>Careers</h4>
            <i class="fa-solid fa-briefcase"></i>
            <p class="contact-text">You don't want just another job. Well, we're not just another company.</p>
            <a href="#" class="about-button">Join us</a>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("template.php") ?>