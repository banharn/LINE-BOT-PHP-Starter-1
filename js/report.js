  var config = {
    apiKey: "AIzaSyDj4CVD6GugRoMjZ1E4RVC-cXTPd0grsYI",
    authDomain: "project2-30f38.firebaseapp.com",
    databaseURL: "https://project2-30f38.firebaseio.com",
    projectId: "project2-30f38",
    storageBucket: "project2-30f38.appspot.com",
    messagingSenderId: "863233456041"
  };
  firebase.initializeApp(config);
  var n = 0;
  var arr = [];
var dbRef = firebase.database().ref();
var contactsRef = dbRef.child('shop');
var query = contactsRef.orderByChild("noid");
contactsRef.orderByChild("state").limitToLast(5).on("value", function(snapshot) {
	  snapshot.forEach(function(data) {
	    	arr.push(data.val().noid,data.val().name,data.val().status,data.val().state);
			   console.log(arr);
	  });
	  $('#contacts').append(contactHtmlFromObject(arr));
	});

function contactHtmlFromObject(contact){
	$("#tbodyid").empty();
  anychart.onDocumentReady(function() {
	    var data = anychart.data.set([	    
	    {x: contact[16], value: contact[19], fill: "#ff0000", stroke: null, label: {enabled: true}},
	      {x: contact[12], value: contact[15], fill: "#ff7200", stroke: null, label: {enabled: true}},
	      {x: contact[8], value: contact[11], fill: "#faff00", stroke: null, label: {enabled: true}},
	      {x: contact[4], value: contact[7], fill: "#5cd65c", stroke: null, label: {enabled: true}},
	      {x: contact[0], value: contact[3], fill: "#d8ff00", stroke: null, label: {enabled: true}}
	    ]);
	    chart = anychart.column();
	    var series = chart.column(data);
	    chart.title();
	    var yAxis = chart.yAxis();
	    yAxis.title("Sales, pieces");
	    chart.container("container");
	    chart.draw();
	 // create new buttons

	    var xlsxButton = document.createElement("div");
	    var pngButton = document.createElement("div");

	    xlsxButton.className = "custombutton";
	    pngButton.className = "custombutton";

	    xlsxButton.innerHTML = "EXEL";
	    pngButton.innerHTML = "PNG";


	    xlsxButton.onclick = function() {
	      chart.saveAsXlsx();
	    };
	    pngButton.onclick = function() {
	        chart.saveAsPng();
	      };

	    // append button to container

	    container.appendChild(xlsxButton);
	    container.appendChild(pngButton);

	    var custombuttons = document.getElementsByClassName("custombutton");

	    // set style for all buttons
	    for (var i = 0; i<custombuttons.length; i++){
	      // set button style
	      custombuttons[i].style.top = 45*i + "px";
	      custombuttons[i].style.right = "5px";
	      custombuttons[i].style.width = "50px";
	      custombuttons[i].style.height = "auto";
	      custombuttons[i].style.backgroundColor = "#444444";
	      custombuttons[i].style.color = "white";
	      custombuttons[i].style.fontFamily = chart.title().fontFamily();
	      custombuttons[i].style.position = "absolute";
	      custombuttons[i].style.zIndex = 2;
	      custombuttons[i].style.transition = "0.5s";
	      custombuttons[i].style.textAlign = "center";
	      custombuttons[i].style.border = "3px solid #444444";
	      custombuttons[i].style.borderRadius = "7px 7px 7px 7px";
	      custombuttons[i].style.fontSize = "18px";
	      custombuttons[i].style.cursor = "pointer";
	    }
	});
  $('table tbody').append(
          "<tr>" +
          "  <td style='text-align:center;background-color: #ff0000'>" + 
          contact[16]+
          "</td>" +
          "  <td>" + 
          contact[17]+
          "</td>" +
          "</tr>"+
          "<tr>" +
          "  <td style='text-align:center;background-color: #ff7200'>" + 
          contact[12]+
          "</td>" +
          "  <td>" + 
          contact[13]+
          "</td>" +
          "</tr>"+
          "<tr>" +
          "  <td style='text-align:center;background-color: #faff00'>" + 
          contact[8]+
          "</td>" +
          "  <td>" + 
          contact[9]+
          "</td>" +
          "</tr>"+
          "<tr>" +
          "  <td style='text-align:center;background-color: #5cd65c'>" + 
          contact[4]+
          "</td>" +
          "  <td>" + 
          contact[5]+
          "</td>" +
          "</tr>"+
          "<tr>" +
          "  <td style='text-align:center;background-color: #d8ff00'>" + 
          contact[0]+
          "</td>" +
          "  <td>" + 
          contact[1]+
          "</td>" +
          "</tr>"
        );
}

