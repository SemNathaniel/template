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
    $navBar .= '<a href="index.php?modules=' . $result[/*ARRAY KEY*/0] . '">' . $result[/*ARRAY KEY*/0] . '</a> ';
}

// this 3rd piece of code is usefull to make a combination

//change the CAPS LOCK comments in the sql to what works with your database
//add a modules directory filled with directories that contain a index.php file
//the records and directory names that get selected will be displayed so beware

//add this to index.php

//add this to the variables list
$scandirResult = array();
$navDbResult = array();
$navBar = '';
$allNavBar = array();

//add this to the code part
$navDbResult = db::selectSqlFunction("SELECT /*COLUMN NAME*/ FROM /*TABLE NAME*/;");
$scandirResult = scandir('tempModules');
$allNavBar = array_merge($navDbResult, $scandirResult);
foreach($allNavBar as $result){
    try{
        $navBar .= '<a href="index.php?modules=' . $result[0] . '">' . $result[0] . '</a> ';
    } catch(Exception){

    } finally {
        $navBar .= '<a href="index.php?modules=' . $result . '">' . $result . '</a> '; 
    }
}