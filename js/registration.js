var subtype_valid = false;

function remove_class(find_class, remove_class) 
{
	var all_elem = document.getElementsByClassName(find_class);
	for(i = 0; i < all_elem.length; i++)
	{
	}
}	

function typeselected()
{
	//console.log("running");
	var type = document.getElementById("type");
	var selected = type.options[type.selectedIndex].value;
	var ownership=document.getElementById("ownership");
	var selected1=ownership.options[ownership.selectedIndex].value;
	var license=document.getElementById("license");
	var selected2=license.options[license.selectedIndex].value;
	//console.log("selected " + selected);
	if(selected == "Corporate")
	{
		document.getElementById("spokesubtype").className="hidden";
		subtype_valid = true;
		
		document.getElementById("subtyperow").className="hidden";
		subtype_valid = true;	
		
	}
	else if(selected == "Circle")
	{
		//console.log("selected in ");
		document.getElementById("subtyperow").className="";
		subtype_valid = true;
		
		document.getElementById("spokesubtype").className="hidden";
		subtype_valid = true;
	}
	
	else if(selected == "Spoke")
	{
		document.getElementById("spokesubtype").className="";
		subtype_valid = true;
		
		document.getElementById("subtyperow").className="hidden";
		subtype_valid = true;
	}
	else 
	{
		
	}
	
	if (selected1 == "Owned")
	{
		$(".owned").removeClass("hidden");
		$(".rented").addClass("hidden");
		$(".client").addClass("hidden");
	}
	
	else if (selected1 == "Rented")
	{
		$(".rented").removeClass("hidden");
		$(".owned").addClass("hidden");
		$(".client").addClass("hidden");
	}
	
	else if (selected1 == "Client")
	{
		$(".client").removeClass("hidden");
		$(".owned").addClass("hidden");
		$(".rented").addClass("hidden");
	}
	
	else
	{
		$(".owned").addClass("hidden");
		$(".rented").addClass("hidden");
		$(".client").addClass("hidden");
	}
	
	if (selected2 == "Shop&Establishment")
	{
		$(".shop_estab").removeClass("hidden");
		$(".trade_license").addClass("hidden");
		//document.getElementById("licenserow").className="";
	}
	
	else if (selected2 == "License")
	{
		$(".trade_license").removeClass("hidden");
		$(".shop_estab").addClass("hidden");
		//document.getElementByClass("trade_license").className="trade_license";
	}
	
	else
	{
		$(".trade_license").addClass("hidden");
		$(".shop_estab").addClass("hidden");
	}
}

/*function checkempty()
{
	console.log("checking empty fields " + arguments);
	
	for(i = 0; i < arguments.length; i++)
	{
		console.log(i + " " + arguments[i]);
		if(i == 1 && !subtype_valid) 
		{
			continue;
		}
		if(arguments[i] == "" || arguments[i] == "Select")
		{
			console.log("empty");
			alert("Please fill all required fields");
			return false;
		}
	}
	return true;
}

function submit()
{
	console.log("submitting");
	var req = new XMLHttpRequest();
	req.onreadystatechange=function()
	{
		console.log(req.status);
		console.log(req.readystate);
		if (req.readyState==4 && req.status==200)
		{
			console.log(req.responseText);
		}
    } 
	
	var parameters = "";
	var type = document.getElementById("type");
	var subtype = document.getElementById("subtype");
	var ownership = document.getElementById("ownership");
	var license = document.getElementById("license");
	
	if(!checkempty(type.options[type.selectedIndex].value, subtype.options[subtype.selectedIndex].value, document.getElementById("address").value, document.getElementById("location").value, document.getElementById("area").value, ownership.options[ownership.selectedIndex].value, license.options[license.selectedIndex].value))
		return;
	
	parameters += "type=" + type.options[type.selectedIndex].value;
	parameters += "&subtype=" + subtype.options[subtype.selectedIndex].value;
	parameters += "&address=" + document.getElementById("address").value;
	parameters += "&location=" + document.getElementById("location").value;
	parameters += "&area=" + document.getElementById("area").value;
	parameters += "&ownership=" + ownership.options[ownership.selectedIndex].value;
	parameters += "&license=" + license.options[license.selectedIndex].value;
	parameters += "&o_name=" + document.getElementById("o_name").value;
	parameters += "&o_address=" + document.getElementById("o_address").value;
	parameters += "&o_contact=" + document.getElementById("o_contact").value;
	//parameters += "o_agr_copy=" + document.getElementById("o_agr_copy").value;
	parameters += "&o_agr_exp=" + document.getElementById("o_agr_exp").value;
	parameters += "&r_name=" + document.getElementById("r_name").value;
	parameters += "&r_address=" + document.getElementById("r_address").value;
	parameters += "&r_contact=" + document.getElementById("r_contact").value;
	//parameters += "r_agr_copy=" + document.getElementById("r_agr_copy").value;
	parameters += "&r_agr_exp=" + document.getElementById("r_agr_exp").value;
	parameters += "&r_rent=" + document.getElementById("r_rent").value;
	parameters += "&c_name=" + document.getElementById("c_name").value;
	parameters += "&c_address=" + document.getElementById("c_address").value;
	parameters += "&c_contact=" + document.getElementById("c_contact").value;
	//parameters += "c_agr_copy=" + document.getElementById("c_agr_copy").value;
	parameters += "&c_agr_exp=" + document.getElementById("c_agr_exp").value;

	var final_string = "db.php?" + parameters;
	console.log(final_string);
	req.open("POST", final_string, true);
	req.send();
	
}*/