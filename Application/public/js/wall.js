/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//get with of block

window.onload = wallChangeBlock;
window.onresize = wallChangeBlock;

function wallChangeBlock() {
	
    /*Var declaration*/
    var blockWallSize;
    var blockWallSizeTotal;
    var blockWall;
    var n=0;
    var m=0;
    var blockWallSizeWith;
    var nbImage=4;
    var margin=4;
    var marginZ = 0;
    
    //get element and size hieght
    var wall = document.getElementById("wall");
    var wallSize = wall.offsetWidth;
    
    /*for different screen , do responsive*/
    /*Mobile XS 768px max */
    /* Small devices (tablets, 768px and up) */
    /* Medium devices (desktops, 992px and up) */
    /* Large devices (large desktops, 1200px and up) */

    if(wallSize < 720){
        nbImage = 2;
        margin = 8;
    }   
    else if(wallSize < 940){
        nbImage = 3;
        margin = 6;
    }   
    else if(wallSize < 1140){
        nbImage = 4;
        margin = 4;
    }
    
    //get number of block (for loop)
    var numberOfElements = document.getElementsByClassName('wall_block');
    //Array for all size height
    var blockWallSize = new Array(numberOfElements+10);
    var blockWallSizeTotal = new Array(numberOfElements+10);
    //Array for all size of colonne
    var colHeight = new Array(0,0,0,0,0);
    var colHeightTotal = new Array(0,0,0,0,0);
    
    for(var i=1; i < numberOfElements.length+1; i++) { 

        //get height of block
        blockWall = document.getElementById('wall_'+i);
        blockWall_size = document.getElementById('wall_size'+i);
        //Offset for get image before
        blockWallSize[i+nbImage] = blockWall_size.offsetHeight;
        //for calculate total height at the end
        blockWallSizeTotal[i] = blockWallSize[i+nbImage];
        //for width
        blockWallSizeWith = blockWall.offsetWidth;
        //set postion block absolute (can be in css)
        blockWall.style.position = "absolute";
        
        //Height
        //first hight at 0px and margin 0
        if(i<nbImage+1){
            blockWallSize[i]=0;
            marginZ = 0;
        }
        else{
            marginZ = 12;
        }
        
        //For each block add the hieght of block on top
        //separted in different colonne
        
        n=n+1;
        for(var j=1; j < 5; j++) { 
            if(n==j){
                colHeight[n] = colHeight[n]+blockWallSize[i]+marginZ;
                colHeightTotal[n] = colHeightTotal[n]+blockWallSizeTotal[i]+marginZ;
                blockWall.style.top = colHeight[n]+'px';
                if(nbImage==j)
                   n=0;
            }
        }
        
        //For each block add the width of block dacalate
        
        m=m+1;
        for(var k=1; k < 5; k++) { 
            if(m==k){
            colWith = (blockWallSizeWith+margin)*(k-1);
            blockWall.style.left = colWith+'px';
            if(nbImage==k)
                m=0;
            }   
        }

    }
    
    //max height for total windows height
    var totalWallHeight = Math.max.apply(Math, colHeightTotal);
    //set total height for div.wall on the DOM
    wall.style.height = totalWallHeight+10+'px';

}