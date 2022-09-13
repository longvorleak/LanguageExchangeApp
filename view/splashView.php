
<?php $title = "splash" ?>

<?php ob_start();?>

<?php include("headerView.php"); ?>
<?php include("sectionsView.php"); ?>
<?php include("footerView.php"); ?>


<?php $content = ob_get_clean(); ?>

<?php require("template.php")?>
