//*** Variable Declarations ***
const PACMAN_SPEED = 5;

//load variables
var output;
var pacman;
var gameWindow;
var loopTimer;
var numLoops = 0;
var wall;
var walls = new Array();
var direction;

//Key flags
var leftArrowDown = false;
var upArrowDown = false;
var rightArrowDown = false;
var downArrowDown = false;
var wKeyDown = false;
var aKeyDown = false;
var sKeyDown = false;
var dKeyDown = false;


//*** FUNCTIONS ***
function loadComplete(){
	output = document.getElementById('output');
	pacman = document.getElementById('pacman');
	gameWindow = document.getElementById('gameWindow');
	
	pacman.style.left = '280px';
	pacman.style.top = '240px';
	pacman.style.width = '40px';
	pacman.style.height = '40px';
	
	loopTimer = setInterval(loop, 50);
	
	//***BUILD WALLS ***
	
	// top wall
	createWall(-20, 0, 640, 40);
	
	// inside walls
	createWall(200, 280, 200, 40);
	
	// left side walls
	createWall(0, 0, 40, 180);
	createWall(0, 220, 40, 180);
	
	// right side walls
	createWall(560, 0, 40, 180);
	createWall(560, 220, 40, 180);
	
	//bottom wall
	createWall(-20, 360, 640, 40);
	
}	
function createWall(left, top, width, height){	
	//Build wall_1
	var wall = document.createElement('div');
	wall.className = 'wall';
	wall.style.left = left + 'px';
	wall.style.top = top + 'px';
	wall.style.width = width + 'px';
	wall.style.height = height + 'px';
	gameWindow.appendChild(wall);
	
	walls.push(wall);
}

function loop(){
    numLoops++;
    
    tryToChangeDirection();
    
    var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    
    // Move Left
    if(direction == 'left'){ 
        var pacmanX = parseInt(pacman.style.left) - PACMAN_SPEED;
        if(pacmanX < -30) pacmanX = 590;
        pacman.style.left = pacmanX + 'px'
    }
    
    // Move Up
    if(direction == 'up'){ 
        var pacmanY = parseInt(pacman.style.top) - PACMAN_SPEED;
        if(pacmanY < -30) pacmanY = 390;
        pacman.style.top = pacmanY + 'px'
    }
    
    // Move Right
    if(direction == 'right'){ 
        var pacmanX = parseInt(pacman.style.left) + PACMAN_SPEED;
        if(pacmanX > 590) pacmanX = -30;
        pacman.style.left = pacmanX + 'px'
    }
    
    // Move Down
    if(direction == 'down'){ 
        var pacmanY = parseInt(pacman.style.top) + PACMAN_SPEED;
        if(pacmanY > 390) pacmanY = -30;
        pacman.style.top = pacmanY + 'px'
    }
    
    // Test Collision
    if(hittest(wall, pacman)){
        pacman.style.left = originalLeft;
        pacman.style.top = originalTop;
    }
}

function hittest(a, b){
    var ax1 = parseInt(a.style.left);
    var ay1 = parseInt(a.style.top);
    var ax2 = ax1 + parseInt(a.style.width) - 1;
    var ay2 = ay1;
    var ax3 = ax1;
    var ay3 = ay1 + parseInt(a.style.height) - 1;
    var ax4 = ax2;
    var ay4 = ay3;
    
    var bx1 = parseInt(b.style.left);
    var by1 = parseInt(b.style.top);
    var bx2 = bx1 + parseInt(b.style.width) - 1;
    var by2 = by1;
    var bx3 = bx1;
    var by3 = by1 + parseInt(b.style.height) - 1;
    var bx4 = bx2;
    var by4 = by3;
    
    var hOverlap = true;
    if(ax1 < bx1 && ax2 < bx1) hOverlap = false;
    if(ax1 > bx2 && ax2 > bx2) hOverlap = false;
    
    var vOverlap = true;
    if(ay1 < by1 && ay3 < by1) vOverlap = false;
    if(ay1 > by2 && ay3 > by3) vOverlap = false;
    
    if(hOverlap && vOverlap) return true;
    else return false;
}

function hitWall(){
    var hit = false;
    
    for(let i in walls){
        if(hittest(walls[i], pacman)){
            hit = true;
            
        }
    }
    output.innerHTML = "hit: " + hit;
    return hit;
}

function tryToChangeDirection(){
    
    var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    
    //Left
    if(leftArrowDown || aKeyDown){
         pacman.style.left = parseInt(pacman.style.left) - PACMAN_SPEED + 'px';
         if(!hitWall()){
             direction = 'left';
             pacman.className = "flip-horizontal";
        }   
        
    }
    
    //up
    if(upArrowDown || wKeyDown){
        pacman.style.top = parseInt(pacman.style.top) - PACMAN_SPEED + 'px';
        if(!hitWall()){
            direction = 'up';
            pacman.className = "rotate270";
         }    
    } 
    
    //right
    if(rightArrowDown || dKeyDown){
        pacman.style.left = parseInt(pacman.style.left) + PACMAN_SPEED + 'px';
        if(!hitWall()){
            direction = 'right';
            pacman.className = "";
        }    
    }
    
    //down
    if(downArrowDown || sKeyDown){
        pacman.style.top = parseInt(pacman.style.top) + PACMAN_SPEED + 'px';
        if(!hitWall()){
            direction = 'down';
            pacman.className = "rotate90";
        }    
    }
    
    pacman.style.left = originalLeft;
    pacman.style.top = originalTop;
}

//*** Listeners ***
document.addEventListener('keydown', function(event){
    
    //Arrow keys
    if(event.keyCode == 37) leftArrowDown = true;
    if(event.keyCode == 38) upArrowDown = true;
    if(event.keyCode == 39) rightArrowDown = true;
    if(event.keyCode == 40) downArrowDown = true;
    
    //WASD
    if(event.keyCode == 65) aKeyDown = true;
    if(event.keyCode == 87) wKeyDown = true;
    if(event.keyCode == 68) dKeyDown = true;
    if(event.keyCode == 83) sKeyDown = true;
});

document.addEventListener('keyup', function(event){
    
    //Arrow keys
    if(event.keyCode == 37) leftArrowDown = false;
    if(event.keyCode == 38) upArrowDown = false;
    if(event.keyCode == 39) rightArrowDown = false;
    if(event.keyCode == 40) downArrowDown = false;
    
    //WASD
    if(event.keyCode == 65) aKeyDown = false;
    if(event.keyCode == 87) wKeyDown = false;
    if(event.keyCode == 68) dKeyDown = false;
    if(event.keyCode == 83) sKeyDown = false;
});

