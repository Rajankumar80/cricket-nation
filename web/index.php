<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricket Nation</title>

</head>
<body>
    
    <h1>Cricket Nation</h1>
    <p>Links:</p>
    <ul>
        <?php
        require_once('config.php');
        foreach ($TsURLs as $key => $value) {
            echo "<li><a href='/play.php?l=$key'>$key</a></li>";
        }
        ?>
    </ul>
    <script src="./scipt.js"></script>
</body>
</html>

