<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
         .container {
         padding-top: 20px;
         }
      </style>
   </head>
   <body>
      <div class="container">
      <!-- <div class="pull-right" style="margin: 10px;">
                  <button type="submit" id="add" class="btn btn-primary btn-sm">
                  <span class="glyphicon glyphicon-plus"></span> เพิ่มสินค้า
                  </button>
               </div>-->
         <div class="panel panel-success">
            <div class="panel-heading" style="font-size:20px;font-weight:700;">Store</div>
            <div class="panel-body">
               <div class="form-group">
                  <label for="S_BARCODE_NO">Barcode Number :</label>
                  <input class="form-control" id="S_BARCODE_NO" type="text"  value="<?php echo $_GET['idBarC']; ?>" disabled required>
               </div>
               <div class="form-group">
                  <label for="S_PRODUCT_ID">รหัสสินค้า :</label>
                  <input class="form-control" id="S_PRODUCT_ID" type="text"  value="" >
                  <p id="error" style="color:  #f00;"></p>
               </div>
               <div class="form-group">
                  <label for="S_NAME">ชื่อสินค้า :</label>
                  <input class="form-control" id="S_NAME" type="text"   value="" >
               </div>
               <div class="form-group">
                  <label for="S_WEIGHT">น้ำหนัก :</label>
                  <input class="form-control" id="S_WEIGHT" type="text"  value="">
               </div>
               <div class="form-group">
                  <label for="S_SUPPLIER">ชื่อ Supplier :</label>
                  <input class="form-control" id="S_SUPPLIER" type="text"   value="" >
               </div>
               <div class="form-group">
                  <label for="S_QUANTITY">จำนวน :</label>
                  <input class="form-control" id="S_QUANTITY" type="text"  value=""  >
               </div>
               <div class="form-group">
                  <label for="S_CAUSE">สาเหตุ :</label>
                  <textarea class="form-control" rows="2" id="S_CAUSE"  value=""></textarea>
               </div>
               <div class="form-group">
                  <label for="S_PO">PO :</label>
                  <textarea class="form-control" rows="2" id="S_PO"  value=""></textarea>
               </div>
            </div>
        
            <div class="panel-footer" style="height: 50px;">
               <div class="pull-right">
                  <button type="button" id="save"
                     class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                  <span class="glyphicon glyphicon-ok"></span> บันทึก
                  </button>
               </div>
            </div>
         </div>
      </div>
          <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p id="mess">Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div><!-- Modal -->
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyD8ZxW1ij4pXQnXEupGG2KUQSn-gPxo-io",
    authDomain: "barcode-final.firebaseapp.com",
    databaseURL: "https://barcode-final.firebaseio.com",
    projectId: "barcode-final",
    storageBucket: "barcode-final.appspot.com",
    messagingSenderId: "320508292944"
  };
  firebase.initializeApp(config);
   var dbRef = firebase.database().ref();
   var contactsRef = dbRef.child('Products');
   contactsRef.on("child_added", function(snap) {
               if(snap.val().S_BARCODE_NO == document.getElementById('S_BARCODE_NO').value){
                  console.log("pass");
                  document.getElementById('S_BARCODE_NO').value= snap.val().S_BARCODE_NO;
                  document.getElementById('S_PRODUCT_ID').value= snap.val().S_PRODUCT_ID;
                  document.getElementById('S_NAME').value= snap.val().S_NAME;
                  document.getElementById('S_WEIGHT').value= snap.val().S_WEIGHT;
                  document.getElementById('S_SUPPLIER').value= snap.val().S_SUPPLIER;
                  document.getElementById('S_QUANTITY').value= snap.val().S_QUANTITY;
                  document.getElementById('S_CAUSE').value= snap.val().S_CAUSE;
                  document.getElementById('S_PO').value= snap.val().S_PO;
                }else{
                  console.log("error");
                }
    			});
   

    if(document.getElementById('S_PRODUCT_ID').value != ""){
       console.log("save");
       //alert("บันทึกสำเร็จ");
       //document.getElementById('mess').innerHTML = "บันทึกสำเร็จ";
           $('#myModal').modal('show').on('shown.bs.modal', function() {
      $("#mess").html("บันทึกสำเร็จ");
    });
       }else{
       console.log("save failer");
       //alert("กรุณากรอกรหัสสินค้า");
           //document.getElementById('mess').innerHTML = "กรุณากรอกรหัสสินค้า";
          //$('#myModal').modal('show');
           $('#myModal').modal('show').on('shown.bs.modal', function() {
      $("#mess").html("กรุณากรอกรหัสสินค้า");
    });
       }

   
</script>
      
   </body>
</html>
