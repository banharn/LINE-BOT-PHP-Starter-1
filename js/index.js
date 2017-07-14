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
var dbRef = firebase.database().ref();
var contactsRef = dbRef.child('shop');
var query = contactsRef.orderByChild("noid");
var table;
var status = '';
var dataSet = [];
var dataSetOut = [];

query.once('value',function(snap) {

    snap.forEach(function(item) {
    	dataSet.push([item.val().noid,item.val().name,item.val().status]);
    }); 
    HtmlFromObject(dataSet,status);
});

function HtmlFromObject(dataSet,status){
	var sst = false;
	if(status == "out of stock"){
		sst = true;
	}
        table= $('#myTable').DataTable( {
       	 data:dataSet,          
       	  destroy: true,
       	"processing": true,
     "dom": 'lBfrtip',
        "buttons": [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            'copy',
                            'excel',
                            'pdf'
                        ]
                    }
                ],
      /*  dom: 'l<"toolbar">frtip',
        initComplete: function(){
        	$("div.toolbar").html('<button type="button" id="any_button">Click Me!</button>');
        	myTable.buttons('#any_button').trigger();
        }      ,*/
       	  "columnDefs": [ {
              "targets": -1,
              "visible": sst,
              "data": null,
              "defaultContent": "<button>Active Status</button>"
          } ],
       	    "createdRow": function ( row, data, index ) {
       	        if ( data[2]=='out of stock' ) {
       	            $('td', row).eq(2).addClass('highlight');
       	        }
       	    }
       } );
       
}
function returnUpdate(){
	dataSet = [];
	$("#tbodyid").empty();
	var dbRef = firebase.database().ref();
	var contactsRef = dbRef.child('shop');
	var query = contactsRef.orderByChild("noid");
	status = $('#sel').val();
	query.once('value',function(snap) {
	    snap.forEach(function(item) {
	    	var name ='';
	    	var email ='';
	    	var city ='';
	    	if(status == "out of stock" && status == item.val().status){
	    		name = item.val().noid;
	    		email = item.val().name;
	    		city = item.val().status;
	    		dataSet.push([name,email,city]);
	    		
	    	}else if (status == "in stock" && status == item.val().status){
	    		name = item.val().noid;
	    		email = item.val().name;
	    		city = item.val().status;
	    		dataSet.push([name,email,city]);
	    	}else if (status == "all"){
	    		name = item.val().noid;
	    		email = item.val().name;
	    		city = item.val().status;
	    		dataSet.push([name,email,city]);
	    	}
	    	console.log([name,email,city]);	    	
	    }); 
	    HtmlFromObject(dataSet,status);
	});
event.preventDefault();
}

function sendLine(){
	dataSetOut = [];
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
	    //console.log(dataSetOut);
	    //HtmlFromObject(dataSet,status);
	});
event.preventDefault();
}

/*$('#myTable tbody').on('click', 'tr', function () {
    $(this).toggleClass('selected');
});*/
$('#myTable tbody').on( 'click', 'button', function () {
    var value = table.row( $(this).parents('tr') ).data();
    if ( confirm( "Are you sure you want to update the selected rows?" ) ) {
    	$.ajax( {
    	"data": value,
    	"type": "post",
    	"success": function () {
    		 contactsRef.on("child_added", function(snap) {
    			  var key = snap.key;
    			  var val = "status";
    			  var inst = "in stock";
    			  if(value[2] != inst){
    			  if(snap.val().noid == value[0]){
    		    		  var updatedObj = {};
    		    		  updatedObj[val] = inst ;
    		    		  contactsRef.child(key).update(updatedObj);	    		
    		    			console.log("val "+value[0]+ " " + value[2]);
    					console.log("DB "+snap.val().noid);
    					returnUpdate();
    			  }
    			 }
    			});
    	}
    	} );
    	}
   
    //alert( data[0] +"'s salary is: "+ data[ 2 ] );
	/*var rows = $('tr.selected');
    var rowData = table.rows(rows).data();
    $.each($(rowData),function(key,value){
    	contactsRef.on("child_added", function(snap) {
  		  var key = snap.key;
  		  var val = "status";
  		  var inst = "in stock";
  		  if(value[2] != inst){
  		  if(snap.val().noid == value[0]){
	    		  var updatedObj = {};
	    		  updatedObj[val] = inst ;
	    		  contactsRef.child(key).update(updatedObj);	    		
	    			console.log("val "+value[0]+ " " + value[2]);
  				console.log("DB "+snap.val().noid);
  				returnUpdate();
  		  }
  		 }
  		});
    	console.log(value);
    });*/
});
$('#button1').click(function () {
	sendLine();
	/*if (window.XMLHttpRequest){
	    xmlhttp=new XMLHttpRequest();
	}
	else{
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var PageToSendTo = "https://enigmatic-savannah-63815.herokuapp.com/bot.php?";
	var MyVariable = "สวัสดี";
	var VariablePlaceholder = "message=";
	var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;

	xmlhttp.open("post", UrlToSend, false);
	xmlhttp.send();*/
	
	
	
	/*var win = window.open("https://enigmatic-savannah-63815.herokuapp.com/bot.php?message=555",'_blank', 'toolbar=no,status=no,menubar=no,scrollbars=no,resizable=yes,left=10000, top=10000, width=5, height=5, visible=true', '');
	setTimeout(function () { win.close();}, 4000);*/
	//window.location = 'https://enigmatic-savannah-63815.herokuapp.com/bot.php?message=555';
	//window.open('https://enigmatic-savannah-63815.herokuapp.com/bot.php?message=555','_blank', 'toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,left=10000, top=10000, width=10, height=10, visible=none', '');
/*	var rows = $('tr.selected');
    var rowData = table.rows(rows).data();
    $.each($(rowData),function(key,value){
    	contactsRef.on("child_added", function(snap) {
  		  var key = snap.key;
  		  var val = "status";
  		  var inst = "in stock";
  		  if(value[2] != inst){
  		  if(snap.val().noid == value[0]){
	    		  var updatedObj = {};
	    		  updatedObj[val] = inst ;
	    		  contactsRef.child(key).update(updatedObj);	    		
	    			console.log("val "+value[0]+ " " + value[2]);
  				console.log("DB "+snap.val().noid);
  	    		//return;
  				returnUpdate();
  		  }
  		 }
  		});
    	console.log(value);
    });*/
});







$(".selC").change(function(){
	dataSet = [];
	 if( $('#sel').val() != '' ){
	$("#tbodyid").empty();
	var dbRef = firebase.database().ref();
	var contactsRef = dbRef.child('shop');
	var query = contactsRef.orderByChild("noid");
	 status = $('#sel').val();
	query.once('value',function(snap) {
	    snap.forEach(function(item) {
	    	var name ='';
	    	var email ='';
	    	var city ='';
	    	if(status == "out of stock" && status == item.val().status){
	    		name = item.val().noid;
	    		email = item.val().name;
	    		city = item.val().status;
	    		dataSet.push([name,email,city]);
	    	}else if (status == "in stock" && status == item.val().status){
	    		name = item.val().noid;
	    		email = item.val().name;
	    		city = item.val().status;
	    		dataSet.push([name,email,city]);
	    	}else if (status == "all"){
	    		name = item.val().noid;
	    		email = item.val().name;
	    		city = item.val().status;
	    		dataSet.push([name,email,city]);
	    	}
	    	console.log([name,email,city]);	    	
	    }); 
	    HtmlFromObject(dataSet,status);
	});
	
 event.preventDefault();
 } else {
   alert('Please select data!');
 }
});



