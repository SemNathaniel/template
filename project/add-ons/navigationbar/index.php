<?php
//this 1st piece of code is usefull if you only have a file based project

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
echo $navBar;