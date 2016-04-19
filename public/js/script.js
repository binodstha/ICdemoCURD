function chk_percentage()
{
	var percent = document.getElementById('percentage').value;
	if (parseInt(percent) > 100)
		document.getElementById("percentage").value = '100';
	else if (parseInt(percent) < 0)
		document.getElementById('percentage').value = "0";
}

function chk_dob(){
	
	var badColor = "#ff6666";
	var rightnow = new Date();

	var selected = new Date(document.getElementById('dob').value);
	var message = document.getElementById('confirmMessage');
	if (rightnow < selected) {
		message.style.color = badColor;
		message.innerHTML = "DOB must be less then today";
		document.getElementById("submit").disabled = true;
	}else {
		message.innerHTML = "";
		document.getElementById("submit").disabled = false;
	}
}