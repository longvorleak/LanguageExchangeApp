<link rel="stylesheet" href=<?= BASE . "/public/css/imageForm.css" ?>>
<script src=<?= BASE . "/public/js/imageUpload.js" ?> defer></script>

<!-- <?php session_start(); ?> -->
<?php $title = "SpeakEasy - Profile Image Upload"; ?>

<?php ob_start(); ?>

<div class="container">
    <h1>Profile Image Upload</h1>
    <h3><?= $_SESSION['username'] ?></h3>
    <form method="POST" action=<?= BASE . "/index.php?action=profilePhotoUpload" ?> enctype="multipart/form-data" id="form-container">
        <div class="avatar-upload">
            <div class="avatar-edit">
                <input type='file' id="image-upload" name="fileToUpload" accept=".png, .jpg, .jpeg" />
                <!-- <input type='file' id="image-upload" name="fileToUpload" accept=".png, .jpg, .jpeg" multiple/> -->
                <label for="image-upload"></label>
            </div>
            <div class="avatar-preview">
                <div id="image-preview"></div>
            </div>
        </div>
        <button type="submit">Save Photo</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>