

function BinaryTree (nbNode, tab) {
    
    this._equipe = tab;
    this._nbNode = nbNode;
    this._textSize = "10";
    this.canvas  = document.querySelector('#arbre');
    this.context = this.canvas.getContext('2d');    
    this._height = this.canvas.offsetHeight / this._nbNode ;    
    this._canva_height = this.canvas.offsetHeight;
    this._size = 15;


    this.display = function() {
	if ( Math.log(this._nbNode)/Math.LN2*10%10 == 0 ) {
	    var tmp = this._nbNode;
	    
	    for (var j = 0 ; j < Math.log(this._nbNode)/Math.LN2 + 1 ; j++) {
		cur_height = (this._canva_height - tmp * this._height)/2;

		for (var i = 0 ; i < tmp  ; i++) {
		    var color, textcolor, antcolor;
		    if ( this._equipe[j][i]['gagne'] == "true" ) {
			color = "gold";
			antcolor = "black";
			textcolor = "black";
		    } else {
			color = "black";
			antcolor = "gold";
			textcolor = "white";
		    }
		    this.displayNode(this._equipe[j][i]['nom'], 
				     (j * 110), i*this._height + (this._height/2) - this._size/2, 
				     100,
				     this._size, 
				     color, textcolor);
		    
		    if ( i%2 == 0 && j != Math.log(this._nbNode)/Math.LN2 ) {
			this.displayNode("",
					 (j+1)*110 - 10,
					 i * this._height + (this._height) - this._size/2, 
					 10, 
					 this._height/2 + this._size, 
					 antcolor, "white");
			
			this.displayNode("",
					 (j+1)*110 - 10, 
					 i * this._height + (this._height/2) - this._size/2 , 
					 10, 
					 this._height/2 + this._size/2, 
					 color, "white");
			
		    }
		}
		tmp = tmp/2;
		this._height = this._height*2;
	    }
	} else {
	    alert("Pas possible arbre mal forme");
	}
    }


    


    this.displayNode = function(text, x, y, l, h, color, textcolor) {

	this.context.fillStyle = color;
	this.context.fillRect(x, y, l, h);
	this.context.fiont = "bold " + this._textSize + "pt Calibri";
	this.context.fillStyle = textcolor;
	this.context.fillText(text, x, y + h/2);
    }


}



var arbre = new BinaryTree(8, tab);
arbre.display();
