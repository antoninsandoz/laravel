/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//get with of block

var wall = document.getElementById("wall");

var wallSize = wall.offsetWidth;

var numberOfElements = document.getElementsByClassName('wall_block');

//alert(numberOfElements.length);

/*Mobile XS 768px max */
/* Small devices (tablets, 768px and up) */
/* Medium devices (desktops, 992px and up) */
/* Large devices (large desktops, 1200px and up) */
var nbImage;
if(wallSize <= 768)
    nbImage = 2;

else if(wallSize <= 992)
    nbImage = 3;

else if(wallSize <= 1200)
    nbImage = 4;

else if(wallSize > 1201)
    nbImage = 4;

//alert(nbImage);

var blockWallSize;
var blockWall;

for(var i=1; i < numberOfElements.length; i++) { 
    
    //get height of block
    blockWall = document.getElementById('wall_'+i);
    blockWallSize = blockWall.offsetHeight;
    alert(blockWallSize);
    
}


//alert(blockWallSize);
//alert(wallSize);

