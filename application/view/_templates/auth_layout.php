<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>TEST</title>
        <meta name="description" content="testovoe zadanie">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="<?php echo URL; ?>css/admin_style.css" rel="stylesheet">
    </head>
    <body class="auth">
        <div id="auth_wrapper" class="container">
            <?php echo $this['content']; ?>
        </div>
    </body>
</html>