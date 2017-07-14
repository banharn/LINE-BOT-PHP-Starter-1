<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<!doctype html>
<html>
<head>
<title>หน้าจอแสดงรายงานการขาย</title>
    <script src="https://www.gstatic.com/firebasejs/4.1.2/firebase.js"></script>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/anychart-bundle.min.js"></script>
    <link rel="stylesheet" href="css/anychart-ui.min.css" />
    <style>
      html, body{
        width: 100%;
        height: 100%;
       margin: 40px  0px 0px 0px;
      }
      #container {
	margin: 40px 0px 0px 0px;
  height: 400px;
      }
      #divshow {
	padding:0px 10px 10px 80px;

      }
    </style>
</head>
<body>
     <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.jsp">Store Project</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.jsp">หน้าแรก</a></li>
            <li class="active"><a href="report.jsp">รายงาน</a></li>
            <li><a href="#contact">เกี่ยวกับ</a></li>
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
  
    <div class="col-sm-8 col-md-8">
 <div ><h3 style="text-align: center;">สรุปสินค้าขายดีประจำเดือน</h3></div>
      <div id="container"></div>
</div>
<div class="col-sm-4 col-md-4"id ="divshow">
 <table class="table table-bordered">
    <thead>
      <tr>
        <th style=" text-align:center;  width: 25%;background-color: #4CAF50;">รหัสสินค้า</th>
        <th style="text-align:center; width: 75%;background-color: #4CAF50;">ชื่อสินค้า</th>
      </tr>
    </thead>
   <tbody id="tbodyid">
						
</tbody>
  </table>
 </div>
 
     <script src="js/jquery.form.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<script src="js/firebase.js"></script>
    <script src="js/report.js"></script>
</body>
</html>
