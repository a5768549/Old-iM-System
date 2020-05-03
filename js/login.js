function L1()
{
	var c=document.getElementById("L1");
	var cxt=c.getContext("2d");
	cxt.strokeStyle = "#FFFFFF";
	cxt.moveTo(0,0);
	cxt.lineTo(150,0);
	cxt.moveTo(150,0);
	cxt.lineTo(230,100);
	cxt.moveTo(230,100);
	cxt.lineTo(250,100);
	cxt.stroke();
}
function L2()
{
	var c=document.getElementById("L2");
	var cxt=c.getContext("2d");
	cxt.strokeStyle = "#FFFFFF";
	cxt.moveTo(0,100);
	cxt.lineTo(150,100);
	cxt.moveTo(150,100);
	cxt.lineTo(230,0);
	cxt.moveTo(230,0);
	cxt.lineTo(250,0);
	cxt.stroke();
}
function R1()
{
	var c=document.getElementById("R1");
	var cxt=c.getContext("2d");
	cxt.strokeStyle = "#FFFFFF";
	cxt.moveTo(0,100); 
	cxt.lineTo(20,100); 
	cxt.moveTo(20,100); 
	cxt.lineTo(100,0); 
	cxt.moveTo(100,0); 
	cxt.lineTo(250,0);
	cxt.stroke();
}

function R2()
{
	var c=document.getElementById("R2");
	var cxt=c.getContext("2d");
	cxt.strokeStyle = "#FFFFFF";
	cxt.moveTo(0,0);
	cxt.lineTo(20,0);
	cxt.moveTo(20,0);
	cxt.lineTo(100,100);
	cxt.moveTo(100,100);
	cxt.lineTo(250,100);
	cxt.stroke();
}

L1();
L2();
R1();
R2();