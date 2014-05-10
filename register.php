<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MOTHIBA- Registration</title>
<script type="text/javascript">
	var httpobj = false;
	if (window.XMLHttpRequest) 
		{
			httpobj = new XMLHttpRequest();
		}
	else if (window.ActiveXObject)
		{
			httpobj = new ActiveXObject("Microsoft.XMLHTTP");
		}
function register_user(txtuser_title,txtFirst_Name,txtLast_Name,txtID_Number,txtE_mail,txtContact_Number,txtUser_name,txtGender,txtUser_password,txtresults_div)
{
	if(httpobj)
	{
	 
		var user_title1 = document.getElementById(txtuser_title); 
		var First_Name1 = document.getElementById(txtFirst_Name); 
		var Last_Name1 = document.getElementById(txtLast_Name); 
		var ID_Number1 = document.getElementById(txtID_Number); 
		var E_mail1 = document.getElementById(txtE_mail); 
		var Contact_Number1 = document.getElementById(txtContact_Number); 
		var User_name1 = document.getElementById(txtUser_name);
		var User_password1 = document.getElementById(txtUser_password);
		var gender1 = document.getElementById(txtGender);
		var id = document.getElementById(txtresults_div); 
		httpobj.open("GET",  "register_user.php?user_title="+ user_title1.value +"&First_Name=" + First_Name1.value+"&Last_Name=" +Last_Name1.value +"&ID_Number=" + ID_Number1.value+"&E_mail="+ E_mail1.value +"&Contact_Number=" + Contact_Number1.value+"&User_name=" + User_name1.value+"&User_Password=" + User_password1.value+"&gender="+ gender1.value ); 
		httpobj.onreadystatechange = function()
		{
	   	 if (httpobj.readyState == 4 && httpobj.status == 200)
				{
					 id.innerHTML = httpobj.responseText;
				}
			else
				{
					id.innerHTML = "erroo";
				}
		 }
		httpobj.send(null);
	}
}
</script>
</head>
 
<table width="644" height="624" border="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td   align="center"  ><?php  require('buttons.php');  ?></td>
  </tr>
  <tr>
    <td width="352" rowspan="2" valign="top" ><table width="auto" height="auto" border="0" bgcolor="#666666" cellpadding="5" cellspacing="5" align="center">
	  <tr>
        <td colspan="2"><br/>
            <hr/>
          <br/></td>
      </tr>
      <tr>
        <td>Title: </td>
        <td><label>
          <select id="titles">
            <option value="Mr">Mr</option>
            <option value="Mrs">Mrs</option>
            <option value="Miss">Miss</option>
            <option value="Dr">Dr</option>
            <option value="Prof">Prof</option>
          </select>
        </label></td>
      </tr>
      <tr>
        <td>First Name: </td>
        <td><label>
          <input type="text" id="First_Name" name="First Name" />
        </label></td>
      </tr>
      <tr>
        <td>ID Number: </td>
        <td><label>
          <input type="text" id="ID_Number"  name="ID Number"/>
        </label></td>
      </tr>
      <tr>
        <td>Last Name: </td>
        <td><label>
          <input type="text" id="Last_Name"  name="Last Name"/>
        </label></td>
      </tr>
      <tr>
        <td>E-mail: </td>
        <td><label>
          <input  type="text" id="E_mail"  name="E-mail"/>
        </label></td>
      </tr>
      <tr>
        <td>Contact Number : </td>
        <td><label>
          <input type="text" id="Contact_Number"  name="Contact Number"/>
        </label></td>
      </tr>
      <tr>
        <td>Username</td>
        <td>
		 <input type="text" id="User_name"  name="username"/></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" id="User_Password"  name="user password"/></td>
      </tr>
      <tr>
        <td valign="top">Gender : </td>
        <td><label>
          <select  id="Gender">
            <option value="Male" selected="selected">Male</option>
            <option value="Female">Female</option>
          </select>
        </label>
          <br />        </td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="button"  value="Register"  width="50px" onclick="register_user('titles','First_Name','Last_Name','ID_Number','E_mail','Contact_Number','User_name','Gender','User_Password','results_div')"/>
          &nbsp; &nbsp;
          <input type="reset" value="Clear" width="50px"/>  </td> 
      </tr>
    </table>      </td>
    <td valign="top" align="left">Welcome to our registration page, this process will only take a few moments and will provide you with access to our testing facility.</td>
  </tr>
  <tr>
    <td width="241" align="left" valign="top"><br/>
      <br/><br/>
    <div id="results_div"><br/>
    </div></td>
  </tr>
</table>

<?php  require('foooter.php'); ?>
</body>
</html>
