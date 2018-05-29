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
echo $data[3];
}


}
?>
