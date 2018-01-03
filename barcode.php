
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
<div class="panel panel-success">
      <div class="panel-heading"><label>Store</label></div>
      <div class="panel-body">
  <div class="form-group">
  <label for="disabledInput" class="col-sm-2 control-label">Barcode Number :</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput" type="text" value="<?php echo $_GET['idBarC']; ?>" disabled>
      </div>
    </div>
        
        <div class="form-group">
  <label for="disabledInput" class="col-sm-2 control-label">รหัสสินค้า :</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput" type="text" value="<?php echo $_GET['idBarC']; ?>" >
      </div>
    </div>
        
        <div class="form-group">
  <label for="disabledInput" class="col-sm-2 control-label">ชื่อสินค้า :</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput" type="text" value="<?php echo $_GET['idBarC']; ?>" >
      </div>
    </div>
        
        <div class="form-group">
  <label for="disabledInput" class="col-sm-2 control-label">น้ำหนัก :</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput" type="text" value="<?php echo $_GET['idBarC']; ?>" >
      </div>
    </div>
        
        <div class="form-group">
  <label for="disabledInput" class="col-sm-2 control-label">ชื่อ Supplier :</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput" type="text" value="<?php echo $_GET['idBarC']; ?>" >
      </div>
    </div>
        
           <div class="form-group">
  <label for="disabledInput" class="col-sm-2 control-label">จำนวน :</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput" type="text" value="<?php echo $_GET['idBarC']; ?>" >
      </div>
    </div>
        
           <div class="form-group">
  <label for="cause">สาเหตุ :</label>
  <textarea class="form-control" rows="5" id="cause"></textarea>
</div>
        
           <div class="form-group">
  <label for="PO">PO :</label>
  <textarea class="form-control" rows="5" id="PO"></textarea>
</div>
        
</div>
  </div>
    </div>


</body>
</html>

