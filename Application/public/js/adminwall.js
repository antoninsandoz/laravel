/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//get with of block

window.onload = AdminwallChangeBlock;
window.onresize = AdminwallChangeBlock;

function AdminwallChangeBlock() {
	
    /*Var declaration*/
    var blockWall;
    var m=0;
    var blockWallSizeWith;
    var nbImage=4;
    var margin=4;

    
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
        margin = 5;
    }   
    else if(wallSize < 1140){
        nbImage = 4;
        margin = 5;
    }
    
    //get number of block (for loop)
    var numberOfElements = document.getElementsByClassName('wall_block');
    
    for(var i=1; i < numberOfElements.length+1; i++) { 

        //get height of block
        blockWall = document.getElementById('wall_'+i);
        //for width
        blockWallSizeWith = blockWall.offsetWidth;
        //set postion block absolute (can be in css)
        blockWall.style.position = "relative";
        
        //For each block add the width of block dacalate
        
        m=m+1;
        for(var k=1; k < 5; k++) { 
            if(m==1){
                blockWall.style.left = '0px';
            }
            if(m==k){
                blockWall.style.left = margin*m+'px';
                if(nbImage==k)
                    m=0;
            }   
        }

    }
    

}