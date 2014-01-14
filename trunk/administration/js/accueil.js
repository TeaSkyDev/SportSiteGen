function showmenu(menu, name) {
	if (menu.style.display == 'none'){
		menu.style.display = 'block';
		document.images[name].src="././Images/ouvert.png";
	}
	else{
		menu.style.display = 'none';
		document.images[name].src="././Images/fermer.png";
	}
}

