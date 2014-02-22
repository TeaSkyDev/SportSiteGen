

function BinaryTree (nbNode) {
    
    this._nbNode = nbNode;
    this._textSize = "10";
    this.canvas  = document.querySelector('#arbre');
    this.context = this.canvas.getContext('2d');    
    this._height = this.canvas.offsetHeight / this._nbNode ;    
    this._canva_height = this.canvas.offsetHeight;
    this._size = 15;


    this.display = function() {
	var tmp = this._nbNode;

	for (var j = 0 ; j < Math.log(this._nbNode)/Math.LN2 + 1 ; j++) {
	    cur_height = (this._canva_height - tmp * this._height)/2;
	    alert(cur_height);
	    for (var i = 0 ; i < tmp  ; i++) {
		this.displayNode(i, (j * 110), i*this._height + (this._height/2) - this._size/2, 100, this._size);
		if ( i%2 == 0 && j != Math.log(this._nbNode)/Math.LN2 ) {
		    this.displayNode("",(j+1)*110 - 10, i * this._height + (this._height/2) - this._size/2 , 10, this._height + this._size);
		}
	    }
	    tmp = tmp/2;
	    this._height = this._height*2;
	}
    }


    


    this.displayNode = function(text, x, y, l, h) {

	this.context.fillStyle = "black";
	this.context.fillRect(x, y, l, h);
	this.context.fiont = "bold " + this._textSize + "pt Calibri";
	this.context.fillStyle = "white";
	this.context.fillText(text, x, y + h/2);
    }


}



var arbre = new BinaryTree(16);
arbre.display();