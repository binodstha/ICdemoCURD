function chk_percentage()
{
	var percent = document.getElementById('percentage').value;
	if (parseInt(percent) > 100)
		document.getElementById("percentage").value = '100';
	else if (parseInt(percent) < 0)
		document.getElementById('percentage').value = "0";
}

function chk_dob(){
	// var q = new Date();
	// var m = q.getMonth()+1;
	// var d = q.getDay();
	// var y = q.getFullYear();

var rightnow = new Date();
var backthen = new Date(document.getElementById('dob').value);
 if (rightnow>backthen)
 {
 document.write(rightnow + " is later than " + backthen + ".");
 }
 else
 {
 document.write("Oh, no! Time is reversed! " + backthen + " is later than " + rightnow + "!");
 }
}