function onf_text(n,val,ty) {
	if(n.value == val) {
		n.value = "";
		n.style.color = '#000';
		if(ty != '') {
		   n.type = ty;	
		}
	}
}

function onb_text(n,val,ty) {
	if(n.value == ''){
		n.value = val;
		n.style.color = '#999';
		if(ty != '') {
			n.type = ty;
		}
	}
}