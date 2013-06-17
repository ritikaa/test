// JavaScript Document
function valid(){
if(document.getElementById("type").selectedIndex==""){
hideAllErrors();
document.getElementById("typeError").style.display="inline";
document.getElementById("type").focus();
return false;
}
var type2=document.getElementById("type").value;
var spoke1=document.getElementById("spokesubtype2").value;
if((type2=='Spoke') && (spoke1==="")){
hideAllErrors();
document.getElementById("spokesubtype2Error").style.display="inline";
document.getElementById("spokesubtype2").focus();
return false;	
}
if(document.getElementById("type").options[document.getElementById("type").selectedIndex].value=="Circle"){
if(document.getElementById("subtype").selectedIndex==""){
hideAllErrors();
document.getElementById("subtypeError").style.display="inline";
document.getElementById("subtype").focus();
return false;
}
}



/*START HERE FOT THE TYPE CORPORATE*/

if(document.getElementById("resion").selectedIndex==""){
hideAllErrors();
document.getElementById("resionError").style.display="inline";
document.getElementById("resion").focus();
return false;
}
if(document.getElementById("address1").value==""){
hideAllErrors();
document.getElementById("add1Error").style.display="inline";
document.getElementById("address1").focus();
return false;
}
var add1 = document.getElementById('address1');
var filter1 = /^[a-zA-Z0-9\s\,\''\-\/ ]*$/;
if (!filter1.test(add1.value)) {
hideAllErrors();
document.getElementById("validadd1Error").style.display="inline";
document.getElementById("address1").focus();
return false;
}

if(document.getElementById("address2").value==""){
hideAllErrors();
document.getElementById("add2Error").style.display="inline";
document.getElementById("address2").focus();
return false;
}
var add2 = document.getElementById('address2');
var filter2 = /^[a-zA-Z0-9\s\,\''\-\/ ]*$/;
if (!filter2.test(add2.value)) {
hideAllErrors();
document.getElementById("validadd2Error").style.display="inline";
document.getElementById("address2").focus();
return false;
}
if((document.getElementById("address2").value)==(document.getElementById("address1").value)){
hideAllErrors();
document.getElementById("validadd2noteqError").style.display="inline";
document.getElementById("address2").focus();
return false;
}

if(document.getElementById("city").value==""){
hideAllErrors();
document.getElementById("cityError").style.display="inline";
document.getElementById("city").focus();
return false;
}
var city32 = document.getElementById('city');
var cityfilter =/^[a-zA-Z ]*$/;
if (!cityfilter.test(city32.value)) {
hideAllErrors();
document.getElementById("validcityError").style.display="inline";
document.getElementById("city").focus();
return false;
}


if(document.getElementById("Pincode").value==""){
hideAllErrors();
document.getElementById("PinError").style.display="inline";
document.getElementById("Pincode").focus();
return false;
}
var Z = document.getElementById("Pincode").value;
if(isNaN(Z)||Z.indexOf(" ")!=-1)
   {
  hideAllErrors();
 document.getElementById("vpinError").style.display="inline";
 document.getElementById("Pincode").focus();
  return false;
  }
if (Z.length<6 || Z.length>6)
  {
 hideAllErrors();
 document.getElementById("sixpinError").style.display="inline";
 document.getElementById("Pincode").focus();
return false;
}
if(document.getElementById("location").value==""){
 hideAllErrors();
 document.getElementById("locationError").style.display="inline";
document.getElementById("location").focus();
return false;
}
var locat = document.getElementById('location');
var locafilter =/^[a-zA-Z ]*$/;
if (!locafilter.test(locat.value)) {
hideAllErrors();
document.getElementById("validlcationError").style.display="inline";
document.getElementById("location").focus();
return false;
}


if(document.getElementById("area").value==""){
hideAllErrors();
 document.getElementById("areaError").style.display="inline";
document.getElementById("area").focus();
return false;
}
//var zoomValue = document.getElementById("area").value;
//if (zoomValue > 10000 || zoomValue < 2000) {
// hideAllErrors();
// document.getElementById("areaofError").style.display="inline";
// document.getElementById("area").focus();
// return false;
//}

var area=document.getElementById("area").value;
var type=document.getElementById("type").value;
var subtype=document.getElementById("subtype").value;
if(type=='Corporate'){
	if((area >= 2000) && (area <=10000)){}
	else{ 
		 hideAllErrors();
		 document.getElementById("areaocorfError").style.display="inline";
		 document.getElementById("area").focus();
		 return false; }
	}
if(type=='Spoke'){
		if((area >= 300) && (area <=700)){}
	    else{  
		 hideAllErrors();
		 document.getElementById("areaspokError").style.display="inline";
		 document.getElementById("area").focus();
		 return false; }
	
	}
if((type=='Circle') && (subtype=='Warehouse') ){
	    
		if((area >= 10000) && (area <=25000)){}
	    else{  
		 hideAllErrors();
		 document.getElementById("areaspwarehoError").style.display="inline";
		 document.getElementById("area").focus();
		 return false; }
	
	}
if((type=='Circle') && (subtype=='Office') ){
	    
		if((area >= 3000) && (area <=5000)){}
	    else{  
		 hideAllErrors();
		 document.getElementById("areaspofficeError").style.display="inline";
		 document.getElementById("area").focus();
		 return false; }
	
	}	

if(document.getElementById("ufname").value==""){
 hideAllErrors();
document.getElementById("fnameError").style.display="inline";
document.getElementById("ufname").focus();
return false;
}

var first2 = document.getElementById('ufname');
var firstfilter =/^[A-Za-z]{3,25}$/;
if (!firstfilter.test(first2.value)) {
hideAllErrors();
document.getElementById("vf2nameError").style.display="inline";
document.getElementById("ufname").focus();
return false;
}

if(document.getElementById("umname").value==""){
hideAllErrors();
document.getElementById("mnameError").style.display="inline";
document.getElementById("umname").focus();
return false;
}

var middle2 = document.getElementById('umname');
var middfilter =/^[A-Za-z ]{0,100}$/;
if (!middfilter.test(middle2.value)) {
hideAllErrors();
document.getElementById("vmidd2nameError").style.display="inline";
document.getElementById("umname").focus();
return false;
}

if(document.getElementById("ulname").value==""){
hideAllErrors();
document.getElementById("lnameError").style.display="inline";
document.getElementById("ulname").focus();
return false;
}

var last2 = document.getElementById('ulname');
var lastfilter =/^[A-Za-z]{0,100}$/;
if (!lastfilter.test(last2.value)) {
hideAllErrors();
document.getElementById("validlastError").style.display="inline";
document.getElementById("ulname").focus();
return false;
}
/*var emailadd = document.getElementById('email');
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (!filter.test(emailadd.value)) {
hideAllErrors();
document.getElementById("emailError").style.display="inline";
document.getElementById("email").focus();
return false;
}*/
if(document.getElementById("email").value==""){
hideAllErrors();
document.getElementById("emailError").style.display="inline";
document.getElementById("email").focus();
return false;
}

if(document.getElementById("u_contact").value==""){
hideAllErrors();
document.getElementById("contactError").style.display="inline";
document.getElementById("u_contact").focus();
return false;
}
var yy = document.getElementById("u_contact").value;
if(isNaN(yy)||yy.indexOf(" ")!=-1)
{
hideAllErrors();
document.getElementById("vcontactError").style.display="inline";
document.getElementById("u_contact").focus();
return false;
}
if (yy.length<10 || yy.length>10)
{
hideAllErrors();
document.getElementById("tenconError").style.display="inline";
document.getElementById("u_contact").focus();
return false;
}
var contact2 = document.getElementById('u_contact');
var contactfilter =/^[7-8-9][0-9]*$/;
if (!contactfilter.test(contact2.value)) {
hideAllErrors();
document.getElementById("contatcvalError").style.display="inline";
document.getElementById("u_contact").focus();
return false;
}


if(document.getElementById("emp_code").value==""){
hideAllErrors();
document.getElementById("empError").style.display="inline";
document.getElementById("emp_code").focus();
return false;
}
var empc2 = document.getElementById('emp_code');
var empcodfilter =/^[Ss0-9]*$/;
if (!empcodfilter.test(empc2.value)) {
hideAllErrors();
document.getElementById("validempcError").style.display="inline";
document.getElementById("emp_code").focus();
return false;
}

if(document.getElementById("ownership").options[document.getElementById("ownership").selectedIndex].value=="Owned")
{
if(document.getElementById("fileField").value=="")
{
hideAllErrors();
document.getElementById("fileFieldError").style.display="inline";
document.getElementById("fileField").focus();
return false;
}
if(document.getElementById("o_agr_exp").value==""){
hideAllErrors();
document.getElementById("o_agr_expError").style.display="inline";
document.getElementById("o_agr_exp").focus();
return false;
}

var date = new Date(); 
var date1=document.getElementById('o_agr_exp').value;
var date2 = new Date(date1);
if(date2 <= date)
{
hideAllErrors();
//alert("Entered Date is greater than Sysdate");
document.getElementById('o_agr_expDate1Error').style.display="inline";
document.getElementById('o_agr_exp').focus();
return false;
}



}else if(document.getElementById("ownership").options[document.getElementById("ownership").selectedIndex].value=="Rented")
{
if(document.getElementById("r_name").value==""){
hideAllErrors();
document.getElementById("r_nameError").style.display="inline";
document.getElementById("r_name").focus();
return false;
}

var owrname2 = document.getElementById('r_name');
var ownerfilter =/^[A-Za-z ]*$/;
if (!ownerfilter.test(owrname2.value)) {
hideAllErrors();
document.getElementById("validownerError").style.display="inline";
document.getElementById("r_name").focus();
return false;
}


if(document.getElementById("r_address").value==""){
hideAllErrors();
document.getElementById("r_addrError").style.display="inline";
document.getElementById("r_address").focus();
return false;
}
var owradd1 = document.getElementById('r_address');
var owrfilter1 = /^[a-zA-Z0-9\s\,\''\-\/ ]*$/;
if (!owrfilter1.test(owradd1.value)) {
hideAllErrors();
document.getElementById("validowraddError").style.display="inline";
document.getElementById("r_address").focus();
return false;
}

if(document.getElementById("r_contact").value==""){
hideAllErrors();
document.getElementById("r_contactError").style.display="inline";
document.getElementById("r_contact").focus();
return false;
}
var yy = document.getElementById("r_contact").value;
if(isNaN(yy)||yy.indexOf(" ")!=-1)
{
hideAllErrors();
document.getElementById("vr_conError").style.display="inline";
document.getElementById("r_contact").focus();
return false;
}
if (yy.length<10 || yy.length>10)
{
hideAllErrors();
document.getElementById("tenr_conError").style.display="inline";
document.getElementById("r_contact").focus();
return false;
}

var ownrcontact2 = document.getElementById('r_contact');
var ownrconfilter2 =/^[7-8-9][0-9]*$/;
if (!ownrconfilter2.test(ownrcontact2.value)) {
hideAllErrors();
document.getElementById("validowrcon2Error").style.display="inline";
document.getElementById("r_contact").focus();
return false;
}

if(document.getElementById("fileField2").value==""){
hideAllErrors();
document.getElementById("fileField2Error").style.display="inline";
document.getElementById("fileField2").focus();
return false;
}
if(document.getElementById("r_agr_exp").value==""){
hideAllErrors();
document.getElementById("r_agrError").style.display="inline";
document.getElementById("r_agr_exp").focus();
return false;
}

var datecl = new Date(); 
var date1cl=document.getElementById('r_agr_exp').value;
var date2cl = new Date(date1cl);
if(date2cl <= datecl)
{
hideAllErrors();
//alert("Entered Date is greater than Sysdate");
document.getElementById('r_agr_expDate1Error').style.display="inline";
document.getElementById('r_agr_exp').focus();
return false;
}


if(document.getElementById("r_rent").value==""){
hideAllErrors();
document.getElementById("r_rentError").style.display="inline";
document.getElementById("r_rent").focus();
return false;
}
var str=document.getElementById("r_rent").value;
if(isNaN(str)==true){
hideAllErrors();
document.getElementById("vr_rentError").style.display="inline";
document.getElementById("r_rent").focus();
return false;
}

var rent22value = document.getElementById("r_rent").value;
if(rent22value >= 1000){}
	else{ 
		 hideAllErrors();
		 document.getElementById("rentvalid100Error").style.display="inline";
		 document.getElementById("r_rent").focus();
		 return false; }

}else if(document.getElementById("ownership").options[document.getElementById("ownership").selectedIndex].value=="Client")
{
if(document.getElementById("c_name").value==""){
hideAllErrors();
document.getElementById("c_nameError").style.display="inline";
document.getElementById("c_name").focus();
return false;
}
var clientame2 = document.getElementById('c_name');
var client3filter =/^[A-Za-z ]*$/;
if (!client3filter.test(clientame2.value)) {
hideAllErrors();
document.getElementById("validclient2Error").style.display="inline";
document.getElementById("c_name").focus();
return false;
}

if(document.getElementById("c_address").value==""){
hideAllErrors();
document.getElementById("c_addressError").style.display="inline";
document.getElementById("c_address").focus();
return false;
}
var clientaddr5 = document.getElementById('c_address');
var clientaddfilter4 = /^[a-zA-Z0-9\s\,\''\-\/ ]*$/;
if (!clientaddfilter4.test(clientaddr5.value)) {
hideAllErrors();
document.getElementById("validclientadd4Error").style.display="inline";
document.getElementById("c_address").focus();
return false;
}


if(document.getElementById("c_contact").value==""){
hideAllErrors();
document.getElementById("c_contactError").style.display="inline";
document.getElementById("c_contact").focus();
return false;
}
var yyy = document.getElementById("c_contact").value;
if(isNaN(yyy)||yyy.indexOf(" ")!=-1)
{
hideAllErrors();
document.getElementById("vc_contError").style.display="inline";
document.getElementById("c_contact").focus();
return false;
}
if (yyy.length<10 || yyy.length>10)
{
hideAllErrors();
document.getElementById("tenc_contError").style.display="inline";
document.getElementById("c_contact").focus();
return false;
}

var clienttact2 = document.getElementById('c_contact');
var clientcon5filter2 =/^[7-8-9][0-9]*$/;
if (!clientcon5filter2.test(clienttact2.value)) {
hideAllErrors();
document.getElementById("validclitcon55Error").style.display="inline";
document.getElementById("c_contact").focus();
return false;
}

if(document.getElementById("fileField1").value==""){
hideAllErrors();
document.getElementById("fileField1Error").style.display="inline";
document.getElementById("fileField1").focus();
return false;
}
if(document.getElementById("c_agr_exp").value==""){
hideAllErrors();
document.getElementById("c_agr_expError").style.display="inline";
document.getElementById("c_agr_exp").focus();
return false;
}
var date5 = new Date(); 
var date15=document.getElementById('c_agr_exp').value;
var date25 = new Date(date15);
if(date25 <= date5)
{
hideAllErrors();
//alert("Entered Date is greater than Sysdate");
document.getElementById('c_agr_expDate1Error').style.display="inline";
document.getElementById('c_agr_exp').focus();
return false;
}


}else{
hideAllErrors();
document.getElementById("ownerError").style.display="inline";
document.getElementById("ownership").focus();
return false;
}
/*start here for the license validation*/
if(document.getElementById("license").options[document.getElementById("license").selectedIndex].value=="Shop&Establishment")
{
if(document.getElementById("se_lic_no").value==""){
hideAllErrors();
document.getElementById("se_lic_noError").style.display="inline";
document.getElementById("se_lic_no").focus();
return false;
}
var lice=document.getElementById("se_lic_no").value;
if(isNaN(lice)==true){
hideAllErrors();
document.getElementById("se_licError").style.display="inline";
document.getElementById("se_lic_no").focus();
return false;
}
if(document.getElementById("se_vlic_no").value==""){
hideAllErrors();
document.getElementById("se_vlic_noError").style.display="inline";
document.getElementById("se_vlic_no").focus();
return false;
}

if((document.getElementById("se_vlic_no").value)!=(document.getElementById("se_lic_no").value)){
hideAllErrors();
document.getElementById("confirmError").style.display="inline";
document.getElementById("se_vlic_no").focus();
return false;
}

if(document.getElementById("fileField11").value==""){
hideAllErrors();
document.getElementById("fileField11Error").style.display="inline";
document.getElementById("fileField11").focus();
return false;
}
if(document.getElementById("se_lic_exp").value==""){
hideAllErrors();
document.getElementById("se_lic_expError").style.display="inline";
document.getElementById("se_lic_exp").focus();
return false;
}
var datelliex = new Date(); 
var date1lxd=document.getElementById('se_lic_exp').value;
var date2lx = new Date(date1lxd);
if(date2lx <= datelliex)
{
hideAllErrors();
//alert("Entered Date is greater than Sysdate");
document.getElementById('se_lic_expDate1Error').style.display="inline";
document.getElementById('se_lic_exp').focus();
return false;
}


}else if(document.getElementById("license").options[document.getElementById("license").selectedIndex].value=="License")
{
if(document.getElementById("tl_lic_no").value==""){
hideAllErrors();
document.getElementById("tl_lic_noError").style.display="inline";
document.getElementById("tl_lic_no").focus();
return false;
}
var trlice=document.getElementById("tl_lic_no").value;
if(isNaN(trlice)==true){
hideAllErrors();
document.getElementById("tradeError").style.display="inline";
document.getElementById("tl_lic_no").focus();
return false;
}

if(document.getElementById("tl_vlic_no").value==""){
hideAllErrors();
document.getElementById("tl_vlic_noError").style.display="inline";
document.getElementById("tl_vlic_no").focus();
return false;
}

if((document.getElementById("tl_vlic_no").value)!=(document.getElementById("tl_lic_no").value)){
hideAllErrors();
document.getElementById("tradconfirmError").style.display="inline";
document.getElementById("tl_vlic_no").focus();
return false;
}
if(document.getElementById("fileField12").value==""){
hideAllErrors();
document.getElementById("fileField12Error").style.display="inline";
document.getElementById("fileField12").focus();
return false;
}
if(document.getElementById("tl_lic_exp").value==""){
hideAllErrors();
document.getElementById("tl_lic_expError").style.display="inline";
document.getElementById("tl_lic_exp").focus();
return false;
}

var datetra = new Date(); 
var date1tra=document.getElementById('tl_lic_exp').value;
var date2tra = new Date(date1tra);
if(date2tra <= datetra)
{
hideAllErrors();
//alert("Entered Date is greater than Sysdate");
document.getElementById('tl_lic_expDate1Error').style.display="inline";
document.getElementById('tl_lic_exp').focus();
return false;
}

}else{
hideAllErrors();
document.getElementById("licenseError").style.display="inline";
document.getElementById("license").focus();
return false;
}


return true;
}
function hideAllErrors() {
document.getElementById("typeError").style.display="none";
document.getElementById("spokesubtype2Error").style.display="none";
document.getElementById("subtypeError").style.display="none";
document.getElementById("resionError").style.display="none";
document.getElementById("add1Error").style.display="none";
document.getElementById("validadd1Error").style.display="none";
document.getElementById("add2Error").style.display="none";
document.getElementById("validadd2Error").style.display="none";
document.getElementById("validadd2noteqError").style.display="none";
document.getElementById("cityError").style.display="none";
document.getElementById("validcityError").style.display="none";

document.getElementById("PinError").style.display="none";
document.getElementById("vpinError").style.display="none";
document.getElementById("sixpinError").style.display="none";
document.getElementById("locationError").style.display="none";
document.getElementById("validlcationError").style.display="none";
document.getElementById("areaError").style.display="none";
<!--document.getElementById("areaofError").style.display="none";-->
document.getElementById("areaocorfError").style.display="none";
document.getElementById("areaspokError").style.display="none";
document.getElementById("areaspwarehoError").style.display="none"; 
document.getElementById("areaspofficeError").style.display="none";


document.getElementById("fnameError").style.display="none";
document.getElementById("vf2nameError").style.display="none";
document.getElementById("mnameError").style.display="none";
document.getElementById("vmidd2nameError").style.display="none";
document.getElementById("lnameError").style.display="none";
document.getElementById("validlastError").style.display="none";
document.getElementById("emailError").style.display="none";
document.getElementById("contactError").style.display="none";
document.getElementById("vcontactError").style.display="none";
document.getElementById("tenconError").style.display="none";
document.getElementById("contatcvalError").style.display="none";

document.getElementById("empError").style.display="none";
document.getElementById("validempcError").style.display="none";
document.getElementById("ownerError").style.display="none";
document.getElementById("fileFieldError").style.display="none";
document.getElementById("o_agr_expError").style.display="none";
document.getElementById('o_agr_expDate1Error').style.display="none";

document.getElementById("r_nameError").style.display="none";
document.getElementById("validownerError").style.display="none";
document.getElementById("r_addrError").style.display="none";
document.getElementById("validowraddError").style.display="none";

document.getElementById("r_contactError").style.display="none";
document.getElementById("vr_conError").style.display="none";
document.getElementById("tenr_conError").style.display="none";
document.getElementById("validowrcon2Error").style.display="none";

document.getElementById("fileField2Error").style.display="none";
document.getElementById("r_agrError").style.display="none";
document.getElementById('r_agr_expDate1Error').style.display="none";
document.getElementById("r_rentError").style.display="none";
document.getElementById("vr_rentError").style.display="none";
document.getElementById("rentvalid100Error").style.display="none";

document.getElementById("c_nameError").style.display="none";
document.getElementById("validclient2Error").style.display="none";
<!--document.getElementById("vc_nameError").style.display="none";-->
document.getElementById("c_addressError").style.display="none";
document.getElementById("validclientadd4Error").style.display="none";

document.getElementById("c_contactError").style.display="none";
document.getElementById("vc_contError").style.display="none";
document.getElementById("tenc_contError").style.display="none";
document.getElementById("validclitcon55Error").style.display="none";

document.getElementById("fileField1Error").style.display="none";
document.getElementById("c_agr_expError").style.display="none";
document.getElementById('c_agr_expDate1Error').style.display="none";

document.getElementById("licenseError").style.display="none";
document.getElementById("se_lic_noError").style.display="none";
document.getElementById("se_licError").style.display="none";
document.getElementById("se_vlic_noError").style.display="none";
document.getElementById("confirmError").style.display="none";
document.getElementById("fileField11Error").style.display="none";
document.getElementById("se_lic_expError").style.display="none";
document.getElementById('se_lic_expDate1Error').style.display="none";

document.getElementById("tl_lic_noError").style.display="none";
document.getElementById("tradeError").style.display="none";
document.getElementById("tl_vlic_noError").style.display="none";
document.getElementById("tradconfirmError").style.display="none";
document.getElementById("fileField12Error").style.display="none";
document.getElementById("tl_lic_expError").style.display="none";
document.getElementById('tl_lic_expDate1Error').style.display="none";

/*type == circle*/
}

