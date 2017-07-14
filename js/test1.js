//create firebase reference
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDj4CVD6GugRoMjZ1E4RVC-cXTPd0grsYI",
    authDomain: "project2-30f38.firebaseapp.com",
    databaseURL: "https://project2-30f38.firebaseio.com",
    projectId: "project2-30f38",
    storageBucket: "project2-30f38.appspot.com",
    messagingSenderId: "863233456041"
  };
  firebase.initializeApp(config);
var dataSetOut = [];
	var dbRef = firebase.database().ref();
	var contactsRef = dbRef.child('shop');	
	var query = contactsRef.orderByChild("noid");
	query.once('value',function(snap) {
	    snap.forEach(function(item) {
	    	var name ='';
	    	var email ='';
	    	var city ='';
	    	if(item.val().status == "out of stock" ){
	    		name = item.val().noid;
	    		email = item.val().name;
	    		city = item.val().status;
	    		dataSetOut.push([name,email,city]); 
	    		var http = new XMLHttpRequest();
		    	var url = "https://enigmatic-savannah-63815.herokuapp.com/bot.php";
		    	var params = "message="+"ID: "+name+" "+email;
		    	http.open("POST", url, true);
		    	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		    	http.onreadystatechange = function() {
		    	    if(http.readyState == 4 && http.status == 200) {
		    	        console.log(http.responseText);
		    	    }
		    	};
		    	http.send(params);
	    	}	
	    }); 
	});


$('#button1').click(function () {
	sendLine();
});

