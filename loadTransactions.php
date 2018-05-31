<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
				<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
				  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-pink.min.css" />
<script src="https://www.gstatic.com/firebasejs/4.11.0/firebase.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="dashboard.css">
				<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
				<script src="https://unpkg.com/sweetalert2@7.15.1/dist/sweetalert2.all.js"></script>
				<script src="https://unpkg.com/sweetalert2@7.21.1/dist/sweetalert2.all.js"></script>

<script src="jquery.js"></script>
	<script type="text/javascript">
		firebase.initializeApp({
  apiKey: "AIzaSyAwZiNLW9NCrCnNYIXVEgTuAv1mhJQeixU",                             // Auth / General Use
  authDomain: "smartfarming-17b55.firebaseapp.com",         // Auth with popup/redirect
  databaseURL: "https://smartfarming-17b55.firebaseio.com", // Realtime Database
  storageBucket: "smartfarming-17b55.appspot.com",          // Storage
  messagingSenderId: "983679682083"                  // Cloud Messaging
});
		firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
  

  } else {
    window.location.href='index.html';
  }
});
		var phone1;
		function go(position){
			swal({
  title: 'Are you sure this transaction is complete?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    swal(
      'Updated!',
      'The database was updated.',
      'success'
    )
  }
})
		}
		 
		function gotData(data) {
			var query = data.val();
			console.log(query);
	var keys = Object.keys(query);

	
	$('#entries').load('loadTransax.php',{'query':query,'keys':keys,'phone1':phone1});
		}
		function errData(err){
   			console.log(err);
		}

		function checkForRecords( phone){
			phone1=phone;
			var ref = firebase.database().ref('TransactionRequests/'+ phone);
			 ref.on('value',gotData,errData);
		}
	 	
	 	function showProgressDialog(){
	 		swal({
     		title: 'Loading Transactions...'
		});
		swal.showLoading();
	 	}

	 	function stopProgressDialog(){
	 		swal.close();
	 		swal.closeModal();
	 	}
	 
		function getTheNumber(){
			swal({
								  title: 'Enter Phone Number',
								  input: 'text',
								  showCancelButton: true,
								  confirmButtonText: 'Search',
								  allowOutsideClick: false,
								  showLoaderOnConfirm: true,
								 }).then((result) => {
								 	if(result.value!=null){
								 	 	checkForRecords(result.value);
								 	 	document.getElementById('introHeader').innerHTML="If you don't see any entries for this phone, then there are no recorded Transactions Attempts for this number!!";
								 	 	showProgressDialog();
						  			 }
						})
}
	</script>
</head>
<body>
	<div id='header' style="display:block; margin-top: 10px; margin-bottom: 20px; text-align: center;">
	 	<button onclick='getTheNumber();' class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Phone Number
</button>
  
</div>
		<p id='introHeader' style="display: block; text-align: center; font-size: 30px; margin: 20px;">Please press the above button and enter the phone number!</p>
		<div style='width: auto; ' id='entries'></div>
</body>
</html>