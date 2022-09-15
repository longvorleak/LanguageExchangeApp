
<?php $title = "splash" ?>

<?php ob_start();?>

    <!-- SECTION 1 -->
    <section class="section uneven">
        <div class="section-img">
            <img src="../public/images/undraw_Community_re_cyrm.png" alt="splash" title="splash" class="splash-img" />
        </div>
        <div class="section-text">
            <h1>Learn a new language</h1>
            <div class="line"></div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel beatae id perferendis ex dolor eveniet neque. Laudantium, tempore hic numquam ab et rerum ipsum cumque dolore voluptate impedit soluta unde.</p>
            <br/>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea explicabo, reiciendis, in doloremque expedita dolore, earum sunt veniam voluptates iure molestiae unde. Quos voluptatum mollitia odio assumenda accusantium alias ratione?</p>
        </div>
    </section>
    <!-- SECTION 2 -->
    <section id="section2">
        <div class="section2-header">
            <h1>The Ultimate Language Exchange</h1>
            <p>Learn a language, explore new cultures, and make friends</p>
        </div>
        <div class="section2-div">
            <div>
                <i class="fa-solid fa-earth-americas"></i>
                <h4>Global reach</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci libero nihil debitis omnis, quae aliquam nemo iure vitae voluptates error totam deserunt enim atque architecto animi dignissimos ipsa, maiores natus.</p>
            </div>
            <div>
                <i class="fa-solid fa-film"></i>
                <h4>Memories</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis animi distinctio veritatis, nostrum totam officia placeat obcaecati pariatur rerum deserunt aperiam eveniet asperiores quisquam recusandae, qui tempore excepturi nulla maxime.</p>
            </div>
        </div>
        <div class="section2-div">
            <div>
                <i class="fa-solid fa-language"></i>
                <h4>Advance language tools</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam deserunt eligendi nisi natus! Quam nemo magni rem accusamus quas perferendis dignissimos ex hic laudantium illum, ipsa dolorem culpa harum earum.</p>
            </div>
            <div>
                <i class="fa-solid fa-champagne-glasses"></i>
                <h4>Social meet ups</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, laboriosam corrupti modi enim architecto exercitationem ratione accusamus sequi porro ea doloremque, dolor sed perspiciatis suscipit esse. Blanditiis voluptatum modi sapiente?</p>
            </div>
        </div>
    </section>
    <!-- SECTION 3 -->
    <section class="section uneven">
        <div class="section-text">
            <h1>Learn from qualified instructors!</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit eum explicabo nobis ex distinctio itaque possimus eligendi! Ullam vero similique, ab illum dignissimos ut laudantium iste quaerat quo quis accusamus?</p>
        </div>
        <div class="section-img">
            <img src="../public/images/langEx4.png" alt="splash" title="splash" class="splash-img" />
        </div>
    </section>
    <!-- SECTION 4 -->
    <section class="section even">
        <div class="section-img">
            <img src="../public/images/langEx2.png"
            alt="splash" title="splash" class="splash-img" />
        </div>
        <div class="section-text">
            <h1>Join live events!</h1>
            <div class="line"></div>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit eum explicabo nobis ex distinctio itaque possimus eligendi! Ullam vero similique, ab illum dignissimos ut laudantium iste quaerat quo quis accusamus?</p>
        </div>
    </section>
    <!-- SECTION 5 -->
    <section class="section uneven">
        <div class="section-text">
            <h1>See what your friends are up to!</h1>
            <div class="line"></div>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit eum explicabo nobis ex distinctio itaque possimus eligendi! Ullam vero similique, ab illum dignissimos ut laudantium iste quaerat quo quis accusamus?</p>
        </div>
        <div class="section-img">
            <img src="../public/images/undraw_Chatting_re_j55r.png"
            alt="splash" title="splash" class="splash-img" />
        </div>
    </section>
    <!-- SECTION 6 -->
    <section class="section even">
        <div class="section-img">
            <img src="../public/images/langEx3.png"
            alt="splash" title="splash" class="splash-img" />
        </div>
        <div class="section-text">
            <h1>Make new friends!</h1>
            <div class="line"></div>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit eum explicabo nobis ex distinctio itaque possimus eligendi! Ullam vero similique, ab illum dignissimos ut laudantium iste quaerat quo quis accusamus?</p>
        </div>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require("template.php")?>

