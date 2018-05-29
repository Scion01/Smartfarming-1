<?php

$keys=$_POST['keys']; 				
$query=$_POST['query']; 
$pno=$_POST['pno'];

for($i=0;$i<sizeof($keys);$i++)
{
 $k=$keys[$i];
$j=0;
foreach($query[$k] as $value){
$data[$j]=$value;
$j=$j+1;
} 	

if($data[4]==$pno)
{
echo '<h4  style="font-size:40px;margin-top:4%;margin-left:33%;">Profile:</h4><div style="font-size:30px;margin-top:2%;margin-left:33%;">Name: '.$data[3]."<br><br>Email: ".$data[2]."<br><br>Total Land: ".$data[5]." ".$data[6]."<br><br>Cultivated Land: ".$data[0]." ".$data[1].'</div><br><br><br><br>';
}


}
?>