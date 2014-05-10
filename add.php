<?php
 	 //echo $submit = $_POST['submit'];
 	// $Role_ID =$_GET['Role_ID'];
     $addu=$_GET['btn'];  
 		echo $Role_ID= $_GET['Role_ID'];
 if($addu=='Add User') 
	{
		require('connecta.php');
?>
					 
<table align="center">
 </td><tr>
   <td align="center" colspan="4">Enter all of the fields below...</td>
    </tr><br/><tr>
      <td colspan="2"><label> Name  </label> </td><td > &nbsp;&nbsp;<input type="text" name="user" id="user"/> </td>
       </tr><tr>
         <td colspan="2"><label> Password</label></td><td>&nbsp;&nbsp;<input type=" pass" name="pass" id="pass"/> </td>
          </tr><tr>
            <td colspan="2"><label> Role   </label></td><td>&nbsp;&nbsp;<select name="role">
               <?php $query1 = mysql_query("SELECT DISTINCT Role FROM roles")or die(mysql_error());            
			    $rows= mysql_affected_rows();
				if($rows>0)
				{					
			      for($i=0; $i<$rows;$i++) 
			       {				
				      $roles = mysql_fetch_array($query1) or die(mysql_error()); 
                      ?> <option value="<?php echo $roles[0];  ?>"><?php echo $roles[0];  ?></option>
           
              <?php }
				}
			  ?> </select></td> 
             </tr><tr>           
              <td colspan="2"><label> Branch  </label></td><td>&nbsp;&nbsp;<select name="branch">
             <?php $query = mysql_query("SELECT Branch_Name FROM branches")or die(mysql_error());            
			    $rows= mysql_affected_rows();
				if($rows>0)
				{
			      for($i=0; $i<$rows;$i++) 
			       {				
				      $SE = mysql_fetch_array($query) or die(mysql_error()); 
                      ?> <option value="<?php echo $SE[0];  ?>"><?php echo $SE[0];  ?></option>
              
              <?php }
			  }
			  ?> </select> 
               </tr><tr> 
                <td align="center" colspan="3">Click here to have details:<input name="Save" type="submit" value="Save" onClick="addm('dvresult','user','pass','role','branch')"/></td>
				 <td><div id="dvresult"></div></td>
                  </tr>
                    </table>
<?php
	} 
?>