var moves = 0;
var pairs = 0;
var counter;
 //the less number of moves, the higher the player is on the rankings list


// Suffle cards at the start of each time
function shuffle(q) {
    var j = 0;
    var x = 0;
    var i = 0;
    cards = [];
    for (i = 0; i < q; i++) {
        cards.push(i);
    }
    for (i = cards.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = cards[i -1];
        cards[i-1] = cards[j];
        cards[j] = x;
    }
}

function board(q) {
    shuffle(q)
    for (var i=0 ; i<q ; i++) {
        var container = document.getElementById('cont');
        var card = document.createElement('div');
        var text = document.createTextNode('');
        card.appendChild(text)
        card.setAttribute('id', cards[i]);
        card.setAttribute('class', 'front');
        card.setAttribute('onclick', 'flip('+cards[i]+')')
        container.appendChild(card);
    }

    var buttons = document.getElementById('buttons');
    buttons.setAttribute('style', 'top: 0; left:0; position: absolute; visibility: hidden; width: 0; height: 0;');
  
}

function endGame() {
    var replayContainer = document.getElementById('replay-container');
    replayContainer.setAttribute('style', 'visibility: visible;');

}

function again() {
    var replayContainer = document.getElementById('replay-container');
    replayContainer.setAttribute('style', 'visibility: hidden');
    var container = document.getElementById('cont');
    var cards = document.getElementsByClassName('blank');
    var loop = cards.length;
    while (cards[0]) {
        container.removeChild(cards[0]);
    }
    var buttons = document.getElementById('buttons');
    buttons.removeAttribute('style');
    moves = 0;
    pairs = 0;
    
    document.getElementById('moves0').innerHTML = '<b>' + moves + '</b> moves'
    document.getElementById('paired0').innerHTML = '<b>' + pairs + '</b> pairs'

}

function flip(id) 
{
	
    var card = document.getElementById(id);	
	
    card.setAttribute('class', 'back' + Math.floor(id/2));
	
    var front = document.getElementsByClassName('front');
	
    var lock = document.getElementById('lock');
	
    if (front.length % 2 === 0) 
	{
        var backed = document.querySelectorAll('div[class^="back"]');
        lock.setAttribute('style', 'visibility: visible;');
        if (backed[0].getAttribute('class') == backed[1].getAttribute('class')) {
            moves++;
            counter = '';
            if (moves != 1) 
			{
                counter = '<b>' + moves + '</b> moves';
            } else {
                counter = '<b>' + moves + '</b> move';
            }
			
			storeScore(moves);
			
            document.getElementById('moves0').innerHTML = counter;
            pairs++;
            if (pairs != 1) {
                counter = '<b>' + pairs + '</b> pairs';
            } else {
                counter = '<b>' + pairs + '</b> pair';
            }
			
			storeScore(moves);
            document.getElementById('paired0').innerHTML = counter;
			
			
            setTimeout(function() {
                backed[0].setAttribute('class', 'blank');
                backed[1].setAttribute('class', 'blank');
                    if (front.length === 0) {
                       endGame();
                    }
                lock.setAttribute('style', 'visibility: hidden;');
            }, 700);
        } 
		else 
		{
            moves++;
            counter = '';
            if (moves != 1) {
                counter = '<b>' + moves + '</b> moves';
            } else {
                counter = '<b>' + moves + '</b> move';
            }
			
			storeScore(moves);
			
            document.getElementById('moves0').innerHTML = counter;
            setTimeout(function() {
                for (var i = 0; i < backed.length; i++) {
                    backed[i].setAttribute('class', 'front');
                    lock.setAttribute('style', 'visibility: hidden;');
                }
            }, 700);
        }
    }
}

function storeScore(counter)
{
	
		//alert("moves " + counter);
	
		var email = localStorage.loggedInUsrEmail;//"user@gmail.com";
		var usrObj = JSON.parse(localStorage[email]);
		
		//var persons = JSON.parse(localStorage["carObj"]);
	 
		usrObj.score = counter;
		localStorage.setItem(email, JSON.stringify(usrObj)); 
		// alert(usrObj.userName + "/" + usrObj.score);	 
	
        //var usrObject1 = {};
		
        //usrObject1.score = document.getElementById("moves0").value;
            
        //localStorage[usrObject1.score] = JSON.stringify(usrObject1);
}


function getScore()
{
	
		//alert("moves " + counter);
	
		var email = localStorage.loggedInUsrEmail;//"user@gmail.com";
		var usrObj = JSON.parse(localStorage[email]);	
        //alert(usrObj.userName + "/" + usrObj.score);
    
		var plyrName = (usrObj.userName);	
        var plyrScore = (usrObj.score);
    
        document.getElementById("player").innerHTML = plyrName;
	    document.getElementById("score").innerHTML = plyrScore;
       
}

