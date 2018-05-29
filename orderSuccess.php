<?php
$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];
$salt = "eCwWELxi";

If (isset($_POST["additionalCharges"])) {
    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
} else {

    $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}
$hash = hash("sha512", $retHashSeq);

if ($hash != $posted_hash) {
    echo "Invalid Transaction. Please try again";
} else {

    echo "<h3>Thank You. Your order status is " . $status . ".</h3>";
    echo "<h4>Your Transaction ID for this transaction is " . $txnid . ".</h4>";
    echo "<h4>We have received a payment of Rs. " . $amount;
}
?> 
<script src="https://www.gstatic.com/firebasejs/4.11.0/firebase.js"></script>
<script type="text/javascript">
	 firebase.initializeApp({
  apiKey: "AIzaSyAwZiNLW9NCrCnNYIXVEgTuAv1mhJQeixU",                             // Auth / General Use
  authDomain: "smartfarming-17b55.firebaseapp.com",         // Auth with popup/redirect
  databaseURL: "https://smartfarming-17b55.firebaseio.com", // Realtime Database
  storageBucket: "smartfarming-17b55.appspot.com",          // Storage
  messagingSenderId: "983679682083"                  // Cloud Messaging
});

var regdataRef = firebase.database().ref('transactions');

savedata();
	function savedata(){

	regdataRef.child("<?php echo $txnid; ?>").set({
		status:"<?php echo $status; ?>",
    firstname:"<?php echo $firstname; ?>",
		amount:"<?php echo $amount; ?>",
		txnid:"<?php echo $txnid; ?>",
		posted_hash:"<?php echo $posted_hash; ?>",
		key:"<?php echo $key; ?>",
		productinfo:"<?php echo $productinfo; ?>",
		email:"<?php echo $email; ?>",
		salt:"<?php echo$salt; ?>"
	});
}

</script>