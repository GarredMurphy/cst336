var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;
var computerChoice;
var playerChoice;

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	btnRock = document.getElementById("btnRock");
	btnPaper = document.getElementById("btnPaper");
	btnScissors = document.getElementById("btnScissors");
	btnGo =  document.getElementById('btnGo');
	deselectAll();
}
	
function deselectAll(){
	btnScissors.style.backgroundColor = 'silver';
	btnPaper.style.backgroundColor = 'silver';
	btnRock.style.backgroundColor = 'silver';
	
	
}

function select(choice){
	playerChoice = choice;
	imgPlayer.src = 'images/' + choice + '.png';
	deselectAll();
	if (choice=='rock') btnRock.style.backgroundColor = '#888888';
	if (choice=='paper') btnPaper.style.backgroundColor = '#888888';
	if (choice=='scissors') btnScissors.style.backgroundColor = '#888888';
	

	btnGo.style.display = 'block';
}

function go(){
	var txtEndTitle = document.getElementById('txtEndTitle')
	var txtEndMessage = document.getElementById('txtEndMessage')
	
	var numChoice = Math.floor(Math.random()*3);
	var imgComputer = document.getElementById('imgComputer');
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	if(numChoice==0){
		computerChoice = 'rock';
		document.getElementById('lblRock').style.backgroundColor = 'yellow';
	} 
	if(numChoice==1){
		computerChoice = 'paper';
		document.getElementById('lblPaper').style.backgroundColor = 'yellow';
		
	}
	if(numChoice==2){
		computerChoice = 'scissors';
		document.getElementById('lblScissors').style.backgroundColor = 'yellow';
	}
	imgComputer.src = 'images/' + computerChoice + '.png';
	
	
	if (playerChoice == computerChoice) {
		if (playerChoice == 'rock') txtEndTitle.innerHTML = "Fist Bump";
		if (playerChoice == 'paper') txtEndTitle.innerHTML = "High Five";
		if (playerChoice == 'scissors') txtEndTitle.innerHTML = "Peace";
		txtEndMessage.innerHTML = "TIE";
	}
	else {
		if (playerChoice == 'rock' && computerChoice == 'scissors'){
			txtEndTitle.innerHTML = "Rock smashes Scissors";
			txtEndMessage.innerHTML = "YOU WIN";
		} else
		if (playerChoice == 'paper' && computerChoice == 'rock'){
			txtEndTitle.innerHTML = "Paper covers Rock";
			txtEndMessage.innerHTML = "YOU WIN";
		} else
		if (playerChoice == 'scissors' && computerChoice == 'paper') {
			txtEndTitle.innerHTML = "Scissors cuts Paper";
			txtEndMessage.innerHTML = "YOU WIN";
		} else {
			if (playerChoice == 'rock') txtEndTitle.innerHTML = "Paper covers Rock";
			if (playerChoice == 'paper') txtEndTitle.innerHTML = "Scissors cuts Paper";
			if (playerChoice == 'scissors') txtEndTitle.innerHTML = "Rock smashes Scissors";
			txtEndMessage.innerHTML = "YOU LOSE";
		}
		
	}
	
	
	
	document.getElementById('endScreen').style.display = 'block';
	
}

function startGame(){
	document.getElementById('introScreen').style.display = 'none';
}

function replay(){
	document.getElementById('endScreen').style.display = 'none';
}
