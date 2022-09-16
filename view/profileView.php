<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile-settings.css"/>
    <title>Document</title>
</head>
<body>
    <?php include("side_menuView.php") ?>
    <section>
        <h1>Profile</h1> <br>
        <form>
            <span> 
                <img src=""/> 
                <input type="button" value="Change"/> 
                <input type="button" value="remove"/>
            </span>
            <span>
                <label for="first-name">First name </label>
                <label for="last-name">Last name </label> 
                <br>
                <input type=text id="first-name" value=""/> 
                <input type=text id="last-name" value=""/> 
            </span>
            <span>
                <label for="username">Username</label>
                <br>    
                <input type="text" value=""></label>
            </span>
            <span>
                <label for="bio">Your bio</label>
                <br>
                <input type="textbox" value=""/>
            </span>

                
    </section>
    
</body>
</html>