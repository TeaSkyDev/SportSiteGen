function ds_getel(id) {
	return document.getElementById(id);
}

function ds_getleft(el) {
	var tmp = el.offsetLeft;
	el = el.offsetParent
	while(el) {
		tmp += el.offsetLeft;
		el = el.offsetParent;
	}
	return tmp;
}
function ds_gettop(el) {
	var tmp = el.offsetTop;
	el = el.offsetParent
	while(el) {
		tmp += el.offsetTop;
		el = el.offsetParent;
	}
	return tmp;
}

setTimeout(
	function(){
		ds_oe = ds_getel('ds_calclas');
		ds_ce = ds_getel('ds_conclas');
	}, 100
);

var ds_ob = ''; 
function ds_ob_clean() {
	ds_ob = '';
}

function ds_ob_flush() {
	ds_oe.innerHTML = ds_ob;
	ds_ob_clean();
}

function ds_echo(t) {
	ds_ob += t;
}

var ds_element;
var ds_heure;
var ds_minute;

function template_main_above() {
	return '<table cellpadding="3" cellspacing="1" class="ds_tbl">'
		 + '<tr>'
		 + '<td class="ds_head" style="cursor: pointer">HEURES</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="cacher();" colspan="3">[Fermer]</td>'
		 + '<td class="ds_head" style="cursor: pointer">MINUTES</td>'
		 + '</tr>'
		 + '</table>';
}

function template_minute(titre, min, max) {
	return titre + ' : <input type="range" min=' + min + ' max=' + max + ' onchange="onclick_'+ titre +'(this.value)">';
}

function template_enter() {
	return '<br><br>';
}

function draw() {
	ds_ob_clean();
	ds_echo (template_main_above());
	ds_echo (template_minute ('Heure',0,23));
	ds_echo (template_enter());
	ds_echo (template_minute ('Minute',0,59));
	ds_ob_flush();                      
	ds_ce.scrollIntoView();             
}

function ds_heure(t) {
	ds_heure=0;
	ds_minute=0;
	ds_element = t;
	draw();
	ds_ce.style.display = '';
	the_left = ds_getleft(t);
	the_top = ds_gettop(t) + t.offsetHeight;
	ds_ce.style.left = the_left + 'px';
	ds_ce.style.top = the_top + 'px';
	ds_ce.scrollIntoView();
}

function cacher() {
	ds_ce.style.display = 'none';
}

function onclick_Minute(m){
	ds_minute=m;
	affiche();
}

function onclick_Heure(h){
	ds_heure=h;
	affiche();
}

function affiche() {
	if (typeof(ds_element.value) != 'undefined') {
		ds_element.value = ds_heure + ":" + ds_minute;
	}
	else if (typeof(ds_element.innerHTML) != 'undefined') {
		ds_element.innerHTML = ds_heure + ":" + ds_minute;
	}
	else {
		alert (ds_heure + ":" + ds_minute);
	}
}
