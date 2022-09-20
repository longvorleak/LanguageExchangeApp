<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Image Upload Test</title>
    </head>
    <body>
        <h1>Image Upload Test</h1>
        <form action="./imageSaving.php" method="get" enctype="multipart/form-data">
            <input type="file" name="image" id="image">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>