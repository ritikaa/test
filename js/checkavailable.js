// JavaScript Document

function validateEmail()
{
	var emailcheck = "";
	document.getElementById('prod_name_indicator').innerHTML="";
	emailcheck=document.getElementById('email').value;
	if(emailcheck!="")
	{
		$.post("ajaxRespose.php",{process:'checkemail',emailcheck:emailcheck},function(data){
		    if(data==1)
			{   
				document.getElementById('prod_name_indicator').innerHTML="<img src='images/cross.png'>";
				//alert('This email id already exist' );
				//document.getElementById('email').value="";
			}
			else{  document.getElementById('prod_name_indicator').innerHTML="<img src='images/check.gif'>";}
  		});
	}
}	
	
function validatelocation()
{	
var location1 = "";
	document.getElementById('prod_name_indicator2').innerHTML="";
	location1=document.getElementById('location').value;
	if(location1!="")
	{
		$.post("ajaxRespose.php",{process:'checklocation',location1:location1},function(data){  
		    if(data==1)
			{   
				document.getElementById('prod_name_indicator2').innerHTML="*Already Register its Location.";
				//alert('This email id already exist' );
				//document.getElementById('location').value="";
			}
			else{  document.getElementById('prod_name_indicator2').innerHTML="<img src='images/check.gif'>";}
  		});
	}
	}
function chackCirclelocation()
{
	var circleloc = "";
	document.getElementById('prod_name_indicator25').innerHTML="";
	circleloc=document.getElementById('spokesubtype2').value;
	if(circleloc!="")
	{
		$.post("ajaxRespose.php",{process:'checkcircle',circleloc:circleloc},function(data){  
		    if(data==0)
			{   
				document.getElementById('prod_name_indicator25').innerHTML="*Circle Location Invalid.";
				//alert('This email id already exist' );
				//document.getElementById('spokesubtype2').value="";
			}
			else{  document.getElementById('prod_name_indicator25').innerHTML="<img src='images/check.gif'>";}
  		});
	}
}
