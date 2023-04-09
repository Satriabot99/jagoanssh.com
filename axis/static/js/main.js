function selectMenu(id){
	id1 = document.getElementById("formInject1");
	id2 = document.getElementById("formInject2");
	id3 = document.getElementById("formInject3");
	id4 = document.getElementById("formInject4");
	id5 = document.getElementById("formInject5");
	id6 = document.getElementById("formInject6");
	
	id1.style.display = "none";
	id2.style.display = "none";
	id3.style.display = "none";
	id4.style.display = "none";
	id5.style.display = "none";
	id6.style.display = "none";
	
	document.getElementById("formInject"+id).style.display = "block";
}