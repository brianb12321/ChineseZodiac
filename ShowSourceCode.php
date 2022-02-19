<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site.css" />
    <title>Show Source Code</title>
</head>
<body>
    <?php
if(isset($_GET["source_file"])) {
    $SourceFile = file_get_contents(stripslashes($_GET["source_file"]));
    highlight_string($SourceFile);
}
else {
    echo "<p>No source file name entered</p>\r\n";
}
    ?>
</body>
</html>