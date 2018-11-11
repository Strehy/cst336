//*** Variable Declarations ***
const PACMAN_SPEED = 5;

//Intial variables
var output;
var pacman;
var loopTimer;
var numLoops = 0;
var wall_1;

//Key flags
var leftArrowDown = false;
var upArrowDown = false;
var rightArrowDown = false;
var downArrowDown = false;


//*** FUNCTIONS ***
function loadComplete(){
	output = document.getElementById('output');
	pacman = document.getElementById('pacman');
	
	pacman.style.left = '280px';
	pacman.style.top = '260px';
	
	loopTimer = setInterval(loop, 50);
	
	//Build wall_1
	wall_1 = document.createElement('div');
	wall_1.setAttribute('id', 'wall_1');
	wall_1.className = 'wall';
	wall_1.style.left = '200px';
	wall_1.style.top = '300px';
	wall_1.style.height = '40px';
	wall_1.style.width = '200px';
	gameWindow.appendChild(wall_1);
	
	
}

function loop(){
    numLoops++;
    
    // Move Left
    if(leftArrowDown){ 
        var pacmanX = parseInt(pacman.style.left) - PACMAN_SPEED;
        if(pacmanX < -30) pacmanX = 590;
        pacman.style.left = pacmanX + 'px'
    }
    
    // Move Up
    if(upArrowDown){ 
        var pacmanY = parseInt(pacman.style.top) - PACMAN_SPEED;
        if(pacmanY < -30) pacmanY = 390;
        pacman.style.top = pacmanY + 'px'
    }
    
    // Move Right
    if(rightArrowDown){ 
        var pacmanX = parseInt(pacman.style.left) + PACMAN_SPEED;
        if(pacmanX > 590) pacmanX = -30;
        pacman.style.left = pacmanX + 'px'
    }
    
    // Move Down
    if(downArrowDown){ 
        var pacmanY = parseInt(pacman.style.top) + PACMAN_SPEED;
        if(pacmanY > 390) pacmanY = -30;
        pacman.style.top = pacmanY + 'px'
    }
}

//*** Listeners ***
document.addEventListener('keydown', function(event){
    
    if(event.keyCode == 37){
         leftArrowDown = true;
         pacman.className = "flip-horizontal";
    }
    
    if(event.keyCode == 38){
        upArrowDown = true;
        pacman.className = "rotate270";
    } 
    
    if(event.keyCode == 39){
        rightArrowDown = true;
        pacman.className = "";
    }
    
    if(event.keyCode == 40){
        downArrowDown = true;
        pacman.className = "rotate90";
    } 
    
    
    
})

document.addEventListener('keyup', function(event){
    if(event.keyCode == 37) leftArrowDown = false;
    if(event.keyCode == 38) upArrowDown = false;
    if(event.keyCode == 39) rightArrowDown = false;
    if(event.keyCode == 40) downArrowDown = false;
})

