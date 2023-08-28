<?php
//this 1st piece of code is usefull if you only have a file based project

//add a modules directory filled with directories that contain a index.php file
//these seperate directory names will be displayed so beware

//add this to index.php

//add this to the variables list
$scandirResult = array();
$navBar = '';

//add this to the code part
$scandirResult = scandir('tempModules');
foreach($scandirResult as $dir){
    if($dir != '.' && $dir != '..'){
        $navBar .= '<a href="index.php?modules=' . $dir . '">' . $dir . '</a> ';
    }
}

// this 2nd piece of code is usefull if you have a database based project

//change the CAPS LOCK comments in the sql to what works with your database
//the records that get selected will be displayed so beware

//add this to index.php

//add this to the variables list
$navDbResult = array();
$navBar = '';

//add this to the code part
$navDbResult = db::selectSqlFunction("SELECT /*COLUMN NAME*/ FROM /*TABLE NAME*/;");
foreach($navDbResult[1] as $result){
    $navBar .= '<a href="index.php?modules=' . $result[/*COLUMN NAME delete 0*/0] . '">' . $result[/*COLUMN NAME delete 0*/0] . '</a> ';
}