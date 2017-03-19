<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>TEST</title>
        <meta name="description" content="testovoe zadanie">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper" class="container">
            <?php require_once APP . 'view/_templates/header.php';?>
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <?php echo $this['content']; ?>
                    </div>
            <?php require_once APP . 'view/_templates/footer.php';?>
        </div>   
    </body>
</html>