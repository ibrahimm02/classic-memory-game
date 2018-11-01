<?php
    //The PHP functions to be used is included
    include('common.php');
    //Outputs the Header and Navigation function
    outputHeader("Classic Memory - Home");
    outputNavigation("Home");
?>

<!-- Contents of the page -->
<div class="gameBack">
    <h2>Game Play</h2>
	<h4>Register and Login before starting</h4>
<!-- Game Contents -->
  
    <div id="replay-container" class="replay-container" style="visibility: hidden;">
        <div class="wellDone"><h2>Well Done!</h2><h5>Please check the High Scores by visiting the rankings page.</h5>
            <div class="replay" onclick="again()">Play Again</div>
        </div>
    </div>
    <div class="header">
    	<div id="moves">
    		<p>Moves : <span id="moves0"><b>0</b></span></p> <!-- number of moves -->
        </div>
        
        <script>storeMoves();</script>
    	<div id="pairs">
    		<p>Pairs : <span id="paired0"><b>0</b></span></p> <!-- number of pairs -->
    	</div>
    </div>
	<div id="cont" class="container">
		<div id="buttons">
		<button onclick="board(24)"></button> <!-- number of cards in the board -->
	</div>
    </div>
    
	<div id="again"></div>
	<div id="lock" class="lock" style="visibility:hidden;"></div><br>

<!-- Game Information modal window -->
<button id="btn">How to Play</button>
	<div id="gameInfo" class="info">
   
        	<div class="info-content">
    	<div class="info-header">
	 
            <h2>How to play</h2><h3>Please Register and Login before Proceding to the Game</h3><hr>
        	</div>
        	<div class="info-body">
                
            <h3>About the Game</h3>
			<p>You are required to match two identical images as quickly as possible. There are 24 cards, composed of 12 pairs, facing down in random order. You flip over two cards at a time, with the goal of flipping over a matching pair by using your memory. If the cards match, then the cards stay facing up, if the cards don’t match they automatically turn back face down. You should match all the images to complete the game.</p>
            <h3>Scoring</h3>
            <p>The scores in this game depends on the number of moves and the time taken to finish the game. The lower number of moves with less time taken to finish the game will be the top scorer.</p>
            <h3>Controls</h3>
            <p>You should use the mouse to select each card. Once a card is selected the card flips and displays an image.</p>
                
        </div>
		<span class="close">OK</span>
		</div>
	</div>
 <!-- End Game information --> 
  
</div><br> 
<!-- End Game Contents -->  
    

<script>
//Game Information
// Get the gameInfo
var modal = document.getElementById('gameInfo');
// Get the button that opens the gameInfo
var btn = document.getElementById("btn");
// Get the <span> element that closes the gameInfo
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the gameInfo 
btn.onclick = function() {
    modal.style.display = "block";
}
// When the user clicks on (OK), close the gameInfo
span.onclick = function() {
    modal.style.display = "none";
}
</script>

<?php
//Outputs the footer function
outputFooter();

