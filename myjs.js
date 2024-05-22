function myCompute() {
	var No = 0;
	var Yes = 30;
	var Small = 0;
	var Medium = 20;
	var Large = 35;
	var ExtraLarge = 45;
	var Regular = 0;
	var Express = 50;

	var temp1;
	var temp2;
	var temp3;

	var method;



	var qtyFragile = document.getElementById("qtyFragile").value;
	var qtySize = document.getElementById("qtySize").value;
	var qtyDeal = document.getElementById("qtyDeal").value;


	if (qtyFragile == "Yes") {
		temp1 = Yes;
	} else {
		temp1 = No;
	}

	if (qtySize == "Small") {
		temp2 = Small;
	}
	else if(qtySize == "Medium"){
		temp2 = Medium;
	}
	else if(qtySize == "Large"){
		temp2 = Large;
	}
	else {
		temp2 = ExtraLarge;
	}

	if (qtyDeal == "Regular") {
		temp3 = Regular;
		method = "4-8 days";
	}
	else{
		temp3 = Express;
		method = "1-2 days";
	}



	var TotalPrice = 120 + temp1 + temp2 + temp3;

	document.getElementById("Amount").value = TotalPrice;
	document.getElementById("ETA").value = method;
	alert("Order Total: " + TotalPrice + " pesos");




}