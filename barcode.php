
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
      <div class="panel-heading">Store</div>
      <div class="panel-body">
  <div class="form-group">
  <label for="disabledInput" class="col-sm-2 control-label">Barcode Number :</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput" type="text" value="<?php echo $_GET['idBarC']; ?>" disabled>
      </div>
    </div>
</div>
  </div>
    </div>


</body>
</html>

