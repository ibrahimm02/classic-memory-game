<?php

//Outputs the header and the body tag
function outputHeader ($title){
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name = "viewport" content = "width=device">';
    echo '<meta name = "description" content = "Classic Memory">';
    echo '<meta name = "author" content = "Ibrahim Mathivanan">';    
    echo '<title>' . $title . '</title>';
    echo '<!-- Link to external style sheet -->';
    echo '<link rel="stylesheet" type="text/css" href="styles/layout.css">';
    echo '<link rel="stylesheet" type="text/css" href="styles/game.css">';
    echo '<link rel="stylesheet" type="text/css" href="styles/form.css">';
    echo '<link rel="stylesheet" type="text/css" href="styles/modal.css">';
    echo '<script type="text/javascript" src="javascript/game.js"></script>';
    echo '<link href="https://fonts.googleapis.com/css?family=BioRhyme|Fontdiner+Swanky|Montez|Yellowtail|Arima+Madurai" rel="stylesheet">';
	echo '</head>';
    echo '<body onload="checkLogin()">';
    echo "<h1>CLASSIC MEMORY</h1>";
} 
//End of Header function

//Outputs the navigation bar
//The active class is applied to the page that matches the page variable
function outputNavigation($pageNames){
        
    echo '<div class="navigation">';
    echo '<div class="table">';
    echo '<ul id="horizontal-list">';
    
    //An array of pages to link to
    $linkNames = array("Home", "Registration", "Login", "Rankings");
    $linkAddresses = array("index.php", "registration.php", "login.php", "rankings.php");
    
    //This Outputs the Navigation
    for($x = 0; $x < count($linkNames); $x++){
        echo '<li><a ';
        if($linkNames[$x] == $pageNames){
            echo 'class="active" ';
        }
		//Rest of the link is the same for all links.
        echo 'href="' . $linkAddresses[$x] . '">' . $linkNames[$x] . '</a></li>';
    
    }
    //Close the div
	echo '</ul>';
    echo '</div>';
    echo '</div>';
}
//End of Navigation function


//Outputs footer and closing body and HTML tag
function outputFooter(){
    echo '<div class="footer">';
    echo '<h4>Copyright &copy; '; 
	echo date("Y");
	echo ' Ibrahim Mathivanan</h4>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
}
//End of Footer function