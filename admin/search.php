<?php

include("../config/db.php");

    $query = $_GET['query'];
    $min_length = 1;
     if(strlen($query) >= $min_length)
     {
        $query = htmlspecialchars($query);
        $query = mysql_real_escape_string($query); 
       
   $raw_results = mysql_query("SELECT * FROM product WHERE 
(`pro_name` LIKE '%".$query."%')");
        if(mysql_num_rows($raw_results)>0)
        {
            while($results = mysql_fetch_array($raw_results))
            {
             echo "<tr align='center' bgcolor='#0f7ea3'>
             <td height='25px'>".$results['title']."</td>
            <td>".$results['text']."</td></tr>" ;
            }
         
        }
        else{
            echo "<tr align='center' bgcolor='#6C0000'>
           <td colspan='2' height='25px'>No results</td>
            <tr>";   
             echo "</table>"; 
        }  
    }
    else{
        echo "Minimum length is ".$min_length;
    }
?>
<td width="30px;">