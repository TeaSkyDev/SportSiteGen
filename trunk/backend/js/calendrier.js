var ds_i_date = new Date();
ds_c_month = ds_i_date.getMonth() + 1;
ds_c_year = ds_i_date.getFullYear();

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
		ds_oe = ds_getel('ds_calclass');
		ds_ce = ds_getel('ds_conclass');
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

var ds_monthnames = [
'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
];

var ds_daynames = [
'Dim', 'Lun', 'Mar', 'Me', 'Jeu', 'Ven', 'Sam'
];

function ds_template_main_above(t) {
	return '<table cellpadding="3" cellspacing="1" class="ds_tbl">'
		 + '<tr>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_py();">&lt;&lt;</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_pm();">&lt;</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_hi();" colspan="3">[Fermer]</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_nm();">&gt;</td>'
		 + '<td class="ds_head" style="cursor: pointer" onclick="ds_ny();">&gt;&gt;</td>'
		 + '</tr>'
		 + '<tr>'		 + '<td colspan="7" class="ds_head">' + t + '</td>'
		 + '</tr>'
		 + '<tr>';
}

function ds_template_day_row(t) {
	return '<td class="ds_subhead">' + t + '</td>';
}

function ds_template_new_week() {
	return '</tr><tr>';
}

function ds_template_blank_cell(colspan) {
	return '<td colspan="' + colspan + '"></td>'
}

function ds_template_day(d, m, y) {
	return '<td class="ds_cell" onclick="ds_onclick(' + d + ',' + m + ',' + y + ')">' + d + '</td>';
}

function ds_template_main_below() {
	return '</tr>' + '</table>';
}

function ds_draw_calendar(m, y) {
	ds_ob_clean();
	ds_echo (ds_template_main_above(ds_monthnames[m - 1] + ' ' + y));
	for (i = 0; i < 7; i ++) {
		ds_echo (ds_template_day_row(ds_daynames[i]));
	}
	
	if (m == 1 || m == 3 || m == 5 || m == 7 || m == 8 || m == 10 || m == 12) {
		days = 31;
	}
	else if (m == 4 || m == 6 || m == 9 || m == 11) {
		days = 30;
	}
	else {
		days = (y % 4 == 0) ? 29 : 28;
	}
	var first_day = new Date(y, (m-1), 1).getDay();
	var first_loop = 1;
	ds_echo (ds_template_new_week());
	if (first_day != 0) {
		ds_echo (ds_template_blank_cell(first_day));
	}
	var j = first_day;
	for (i = 0; i < days; i ++) {
		if (j == 0 && !first_loop) {
			ds_echo (ds_template_new_week());
		}
		
		ds_echo (ds_template_day(i + 1, m, y));
		first_loop = 0;

		j ++;
		j %= 7;
	}
	
	ds_echo (ds_template_main_below()); 
	ds_ob_flush();                      
	ds_ce.scrollIntoView();             
}

function ds_sh(t) {
	ds_element = t;
	var ds_sh_date = new Date();
	ds_c_month = ds_sh_date.getMonth() + 1;
	ds_c_year = ds_sh_date.getFullYear();
	ds_draw_calendar(ds_c_month, ds_c_year);
	ds_ce.style.display = '';
	the_left = ds_getleft(t);
	the_top = ds_gettop(t) + t.offsetHeight;
	ds_ce.style.left = the_left + 'px';
	ds_ce.style.top = the_top + 'px';
	ds_ce.scrollIntoView();
}

function ds_hi() {
	ds_ce.style.display = 'none';
}

function ds_nm() {
	ds_c_month ++;
	if (ds_c_month > 12) {
		ds_c_month = 1; 
		ds_c_year++;
	}
	ds_draw_calendar(ds_c_month, ds_c_year);
}


function ds_pm() {
	ds_c_month = ds_c_month - 1;
	if (ds_c_month < 1) {
		ds_c_month = 12; 
		ds_c_year = ds_c_year - 1;
	}
	ds_draw_calendar(ds_c_month, ds_c_year);
}

function ds_ny() {
	ds_c_year++;
	ds_draw_calendar(ds_c_month, ds_c_year);
}

function ds_py() {
	ds_c_year = ds_c_year - 1;               
	ds_draw_calendar(ds_c_month, ds_c_year); 
}


function ds_format_date(d, m, y) {
	m2 = '00' + m;
	m2 = m2.substr(m2.length - 2);
	d2 = '00' + d;
	d2 = d2.substr(d2.length - 2);
	return y + '/' + m2 + '/' + d;
}

function ds_onclick(d, m, y) {
	ds_hi();
	
	if (typeof(ds_element.value) != 'undefined') {
		ds_element.value = ds_format_date(d, m, y);
	}
	else if (typeof(ds_element.innerHTML) != 'undefined') {
		ds_element.innerHTML = ds_format_date(d, m, y);
	}
	else {
		alert (ds_format_date(d, m, y));
	}
}
