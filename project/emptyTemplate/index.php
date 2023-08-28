<?php
//file imports
require_once('config.php');
require_once(DIRPATH . 'classes' . DIRECTORY_SEPARATOR . 'db.static.php');
require_once(DIRPATH . 'classes' . DIRECTORY_SEPARATOR . 'error.static.php');

//define variables
$tabTitle = '';
$content = '';
$html = '';

//index.php code
// make sure to keep this code limited make controllers in a separate file just like functions
$content = db::selectSqlFunction("SELECT paginaTitel FROM paginadata");
print_r($content);

//prepare html
$html .= '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $tabTitle . '</title>
    <style rel="stylesheet" href="style.css"></style>
</head>
<body>
    <header>
    </header>
    <main>
        ' . $content . '
    </main>
    <footer>
    </footer>
</body>
</html>
';

//print html
echo $html;
?>