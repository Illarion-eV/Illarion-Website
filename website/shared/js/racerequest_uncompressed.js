var showpicid;

function changepic(newpicid) {
	document.getElementById('racepic_m_'+showpicid).style.display='none';
	if(document.getElementById('racepic_f_'+showpicid)) { document.getElementById('racepic_f_'+showpicid).style.display='none'; }
	document.getElementById('racepic_m_'+newpicid).style.display='inline';
	if(document.getElementById('racepic_f_'+newpicid)) { document.getElementById('racepic_f_'+newpicid).style.display='inline'; }
	showpicid=newpicid;
	}