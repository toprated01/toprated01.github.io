<?php 
/** 
 * Charts 4 PHP 
 * 
 * @author Shani <support@chartphp.com> - http://www.chartphp.com 
 * @version 1.2.3 
 * @license: see license.txt included in package 
 */ 
include 'dbconnect.php';  
include 'C:\wamp\www\SwotAnalysis\lib\inc\chartphp_dist.php'; 

$p = new chartphp(); 

$p->data = array(array(array('Heavy Industry', 12),array('Retail', 9), array('Light Industry', 14), array('Out of home', 16),array('Commuting', 7), array('Orientation', 9)));
$p->chart_type = "pie"; 

// Common Options 
$p->title = "Pie Chart"; 

$out = $p->render('c1'); 
?> 
<!DOCTYPE html> 
<html> 
    <head> 
        <script src="C:\wamp\www\SwotAnalysis\lib\js\jquery.min.js"></script> 
        <script src="C:\wamp\www\SwotAnalysis\lib\jschartphp.js"></script> 
        <link rel="stylesheet" href="C:\wamp\www\SwotAnalysis\lib\js\chartphp.css"> 

    <style> 
        /* white color data labels */ 
        .jqplot-data-label{color:white;} 
    </style> 
    </head> 
     
    <body> 
        <div style="width:40%; min-width:450px;"> 
        <?php echo $out; ?> 
        </div> 
    </body> 
</html> 