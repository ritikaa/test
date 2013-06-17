<script type="text/javascript">
$(document).ready(function(){
$('#submit').click(function(){
var sirname=$('#sirname').val();
var username=$('#username').val();
var password=$('#pass').val();
var email=$('#email').val();
var users=$('#users').val();

if(sirname=="")
{
$('#dis').slideDown().html("<span>*Please Enter Sir Name!</span>");
return false;
}
if(username=="")
{
$('#dis').slideDown().html('<span id="error">*Please Enter Username!</span>');
return false;
}
if(password=="")
{
$('#dis').slideDown().html('<span id="error">*Please Enter Password!</span>');
return false;
}
if(email=="")
{
$('#dis').slideDown().html('<span id="error">*Please Enter Email Id!</span>');
return false;
}
if(users=="")
{
$('#dis').slideDown().html('<span id="error">*Please Select Users!</span>');
return false;
}

});
});
</script>
<style type="text/css">
#dis
{
text-align:none;
height: 25px;
width: 250px;
font-size:13px;
color:#ff0000;
margin-left:200px;
}
</style>
