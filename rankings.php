<?php
    //Includes the PHP function to be used
    include('common.php');
    //Outputs the Header and Navigation function
    outputHeader("Classic Memory - Rankings");
    outputNavigation("Rankings");
?>

<!-- Contents of the page -->

<div class="row2">
    <h2>High Scores</h2>
    <!-- <table id="rankingsTable" onload="generateTable()"> -->
    <table>
       <tr>
	       <th>NAME</th>
	       <th>SCORE</th>
        </tr>
        <tr>
	       <td><span id="player"><b>Player 1</b></span></td>
	       <td><span id="score"><b>0</b></span></td>
        </tr>
        <tr>
	       <td>Player 2</td>
	       <td>0</td>
        </tr>
        <tr>
	       <td>Player 3</td>
	       <td>0</td>
        </tr>
        <tr>
	       <td>Player 4</td>
	       <td>0</td>
        </tr>
        <tr>
	       <td>Player 5</td>
	       <td>0</td>
        </tr>
        <tr>
	       <td>Player 6</td>
	       <td>0</td>
        </tr>    
        
    </table>
</div>


<script>

/* function generateTable() 
{
	var table = document.getElementById("rankingsTable");
	var generatedTable = '';
	generatedTable ='<tr><th>Player Name</th><th>Score</th></tr>'
	table.innerHtml = generatedTable;
 */

getScore(); //displays the scores in the table
    
</script>
<?php
//Outputs the footer function
outputFooter();