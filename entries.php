<?php
if(session_start()){
	
}
else{
echo "<script>alert('Session failed!!');</script>";
echo "<script>window.location.href='home.php'</script>";
}
$keys=$_POST['keys']; 				
$query=$_POST['query']; 


$t=0;
for($i=0;$i<sizeof($keys);$i++)
{
 $k=$keys[$i];
$j=0;
foreach($query[$k] as $value){
$data[$j]=$value;
$j=$j+1;
} 	
$parts = explode(' ', $k);
if($data[4]==0)	{
if($t%2==0 ){

echo '<div style=font-size:40px;position:absolute;margin-top:6%;margin-left:55%;"><div id="name'.$i.'"></div><br><br>'.$parts[1]."&nbsp;".$parts[2]."&nbsp;".$parts[3]."&nbsp;".$parts[6][0].$parts[6][1].$parts[6][2].$parts[6][3]."<br><br><br>UserID:<br><br><br>".$parts[0].'</div>';


	echo '<div class="container left">

								    <div class="content"  >
								    
						 <div class="" style="font-size:20px;padding:40px;">';

echo "<b>Subject:</b><br>"."$data[5]"."<br><br><br>";
echo "<b>Description:</b><br>"."$data[0]"."<br><br><br>";
$_SESSION['sub'.$i]=$data[5];
$_SESSION['des'.$i]=$data[0];

echo "<script> var storageRef = firebase.storage().ref();
         var spaceRef = storageRef.child('".$data[1]."');
         storageRef.child('".$data[1]."').getDownloadURL().then(function(url) {
             var test = url;
         
            
 document.getElementById('img1".$i."').src = test;
         }).catch(function(error) {

         });</script>";

echo ' 
						 </div>
						 <div class="mdl-card__actions mdl-card--border">';
if($data[1]=='noImagesYet'){
echo '
					<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="noimg();"> ';}
else {
echo '	<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="document.getElementById'."('id012".$i."').style.display='block'".'">';
}

echo'
						 View
						</button>
						
		<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onClick='."go($i)".'>
						Give Solution
						</button>';
echo '		 <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" 
	onclick="generateRefer('.$parts[0].');">
					  Recommendation
						 </button>
						 </div>
						</div>
						</div></div>';

 echo  '	<div id="id012'.$i.'" class="w3-modal w3-animate-opacity" >
      <div class="w3-modal-content w3-card-4" >
     <span onclick="document.getElementById'."('id012".$i."')".'.style.display'."='none'".'"
          class="w3-button w3-display-topright">&times;</span>
        <div class="w3-container style="margin-top=20%" >

 <img id="img1'.$i.'" src="3.jpg" style="width:100%" height:300px>

        </div>

      </div>
    </div><br><br>';

}
else
{
$parts = explode(' ', $k);

echo '<div style="font-size:40px;position:absolute;margin-top:6%;margin-left:5%;"><div id="name'.$i.'"></div><br><br>'.$parts[1]."&nbsp;".$parts[2]."&nbsp;".$parts[3]."&nbsp;".$parts[6][0].$parts[6][1].$parts[6][2].$parts[6][3]."<br><br><br>UserID:<br><br><br>".$parts[0].'</div>';
echo '<div class="container right">
								    <div class="content"  >
								     
						 <div class="" style="font-size:20px;padding:40px;">';

echo "<b>Subject:</b><br>"."$data[5]"."<br><br><br>";
echo "<b>Description:</b><br>"."$data[0]"."<br><br><br>";
$_SESSION['sub'.$i]=$data[5];
$_SESSION['des'.$i]=$data[0];

echo "<script> var storageRef = firebase.storage().ref();
         var spaceRef = storageRef.child('".$data[1]."');
         storageRef.child('".$data[1]."').getDownloadURL().then(function(url) {
             var test = url;
         
            
 document.getElementById('img1".$i."').src = test;
         }).catch(function(error) {

         });</script>";
echo ' 
						 </div>
						 <div class="mdl-card__actions mdl-card--border">';
if($data[1]=='noImagesYet'){
echo '
					<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="noimg();"> ';}
else {
echo '	<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="document.getElementById'."('id012".$i."').style.display='block'".'">';
}
echo '						 View
						</button>
		<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onClick='."go($i)".'>
						Give Solution
						</button>';
echo '		 <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" 
	onclick="generateRefer('.$parts[0].');">
						  Recommendation
						 </button>
						 </div>
						</div>
						</div></div>';
	
 echo  '	<div id="id012'.$i.'" class="w3-modal w3-animate-opacity" >
      <div class="w3-modal-content w3-card-4" >
     <span onclick="document.getElementById'."('id012".$i."')".'.style.display'."='none'".'"
          class="w3-button w3-display-topright">&times;</span>
        <div class="w3-container style="margin-top=20%" >

 <img id="img1'.$i.'" src="3.jpg" style="width:100%" height:300px>

        </div>

      </div>
    </div><br><br>';
}
$t=$t+1;
}
echo "<script>var refer = firebase.database().ref('userInfo');

     		      refer.on('value',getname);

   function getname(data)
   {
	var query = data.val();

	var keys = Object.keys(query);

	var pno = ".$parts[0].";

	var i = ".$i.";

	$('#name'+i).load('loadname.php',{'query':query,'keys':keys, 'pno':pno});

}</script>";
}
?>

<script type="text/javascript">
	function go(d) {
		
		window.location.href="solution.php?i=" +d;
	}

	function noimg(){
		swal.resetDefaults();
		swal({
  title: "No Image",
  text: "No image for this query",
  icon: "success",
  timer: 1000,
  showConfirmButton: false
});

	}

</script>
