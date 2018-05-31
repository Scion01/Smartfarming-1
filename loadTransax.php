<?php

$keys=$_POST['keys']; 				
$query=$_POST['query'];
$phone=$_POST['phone1']; 
 


for($i=0;$i<sizeof($keys);$i++)
{
 $k=$keys[$i];
$j=0;
foreach($query[$k] as $value){
$data[$j]=$value;
$j=$j+1;
echo "<script>stopProgressDialog();</script>";
}

	//$row=$query[1];
echo '<br><br><div style="border: 4px solid #999;color:black;border-radius: 40px 40px 40px 40px;width:100%;font-weight:bold;text-align:center;">';
echo '<br><div style="position: absolute;margin-left: 20px; margin-right: 10px;">Phone Number</div><div style="position: absolute;left: 47%;">  </div><div style="position: absolute;right:0;margin-right: 80px;">Transaction ID</div> ';

echo '<br><div style="position: absolute;margin-left: 20px;">';
echo "</div>";
echo '<div style="position: absolute;left: 2%;">';
echo $phone;
 
echo "</div>";
echo '<div style="position: absolute;right:0;margin-right: 80px;">';
 
echo "</div>";
echo "<br><hr>";
echo '<div><b>Cost:&emsp;</b>';
echo $data[1]."<br>";
 
echo '<br><b>Transaction Success:</b>&emsp;';
echo "<button id='go' style='height: 40px;width: 100px;cursor:pointer;border: 4px solid green;color:green;
border-radius: 14px 14px 14px 14px;' onClick='go(".$i.")'>GO</button>";


echo '<br><div style=""><b>Destination:&emsp;</b>';
echo $data[0]."<br>"; 

echo '</div>';
echo '<div style=""><b>Product Name:&emsp;</b>';
echo $data[4]."<br>"; 
 
echo '</div>';
echo '<div><b>Product Description:</b>';
echo "  ".$data[3]."<br>";


echo "</div><br></div><br><br></div>";
}
?>