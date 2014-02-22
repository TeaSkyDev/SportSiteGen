

function BinaryTree (nbNode) {
    
    this._nbNode = nbNode;
    this._textSize = "10";
    
    this.display = function() {
	var canvas  = document.querySelector('#arbre');
	var context = canvas.getContext('2d');
	context.fillStyle = "black";
	context.fillRect(0,0,100,100);
	context.font = "bold "+ this._textSize + "pt Calibri";
	context.fillStyle = "white";
	context.fillText("Machin", 20,50);
	this.displayNode("Truc", 150, 250, 50, 50);
    }

    this.displayNode = function(text, x, y, l, h) {
	var canvas  = document.querySelector('#arbre');
	var context = canvas.getContext('2d');
	context.fillStyle = "black";
	context.fillRect(x, y, l, h);
	context.fiont = "bold " + this._textSize + "pt Calibri";
	context.fillStyle = "white";
	context.fillText(text, x, y + h/2);
    }


}



var arbre = new BinaryTree(50);
arbre.display();