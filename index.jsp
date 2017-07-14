
<!DOCTYPE HTML>
<html>
<head>
<title>หน้าแรก</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="https://enigmatic-savannah-63815.herokuapp.com/js/firebase.js" ></script>
   <script src="https://enigmatic-savannah-63815.herokuapp.com/js/jquery.min.js" charset="UTF-8"></script>
   <link rel="stylesheet" href="https://enigmatic-savannah-63815.herokuapp.com/css/bootstrap.min.css">  
 <link rel="stylesheet" href="https://enigmatic-savannah-63815.herokuapp.com/css/jquery.dataTables.min.css" > 
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.2/css/select.dataTables.min.css" > 
    <link rel="stylesheet" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" > 
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
<script type="text/javascript" src="https://enigmatic-savannah-63815.herokuapp.com/js/bootstrap.min.js" charset="UTF-8"></script> 
 <script type="text/javascript">
$.extend(true, $.fn.dataTable.defaults, {
    "language": {
              "sProcessing": "กำลังดำเนินการ...",
              "emptyTable": "ไม่พบข้อมูลในตาราง",
              "searchPlaceholder" : "กรอกข้อมูลเพื่อค้นหา...",
              "sLengthMenu": "แสดง _MENU_ แถว",
              "sZeroRecords": "ไม่พบข้อมูล",
              "sInfo": "แสดง  _START_ ถึง _END_ จาก _TOTAL_ แถว",
              "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
              "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
              "sInfoPostFix": "",
              "sSearch": "ค้นหา:",
              "sUrl": "",
              "oPaginate": {
                            "sFirst": "เริ่มต้น",
                            "sPrevious": "ก่อนหน้า",
                            "sNext": "ถัดไป",
                            "sLast": "สุดท้าย"
              }
     }
});
var table = $('#myTable').DataTable();

</script> 

    <style type="text/css"> 
    .toolbar {
    float:right;
}

.dataTables_wrapper .dt-buttons {
 float:right;  
}
    body {
	padding-top: 90px;
}
select {  text-align-last:center; }
    #contacts p, 
    #contacts p.lead{
      margin: 0;
    }
#myTable td:nth-child(1),
#myTable td:nth-child(3),
#myTable td:nth-child(4)
{
    text-align : center;
}
td.highlight {
        color: red;
    }
    .toolbar {
    float: right;
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
            <li class="active"><a href="index.jsp">หน้าแรก</a></li>
            <li><a href="report.jsp">รายงาน</a></li>
            
          </ul>
                
           <div class="col-sm-2 col-md-2  navbar-right">
        <form class="navbar-form"  action="Searchdata" id="searchForm">
        <div class="input-group">
            <div class="input-group-btn">
              <select class="form-control selC" id="sel" style="text-align: center;">
              <option  selected="selected" value="all">ทั้งหมด</option>
        <option >out of stock</option>
        <option>in stock</option>
      </select>
      <!--  <input type="text" class="form-control serC" placeholder="Search" name="Search" id="Search" >
                <button type="button" class="btn btn-default" id="myDiv" ><i class="glyphicon glyphicon-search"></i></button> -->
            </div>
       </div>
        </form>
    </div>
  
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    <div class="container-fluid">
  <div class="row content">
    <div class="col-sm-1 " >
<!-- <button id="button1">Click</button>  -->
    </div>

    <div class="col-sm-10 sidenavbody">
		<div class="row" id="section2">
	
			<div class="panel panel-success">
				<div class="panel-body">
<!-- <table id="myTable" class="table table-hover table-bordered ">   -->
<table id="myTable" class="table table-hover table-bordered "> 
        <thead>  
          <tr>  
            <th  style="text-align:center; width: 10%;background-color: #4CAF50;" id="noID">รหัสสินค้า</th>
								<th  style="text-align:center; width: 65%;background-color: #4CAF50;">ชื่อสินค้า</th>
								<th  style="text-align:center; width: 10%;background-color: #4CAF50;">สถานะ</th>
																<th  style="text-align:center; width: 11%;background-color: #4CAF50;"></th>
          </tr>  
        </thead>  
        <tbody id="tbodyid">  
         
        </tbody>  
      </table>  
      </div>
 </div>
 </div>
 </div>
 </div>
 </div>


<script src="https://enigmatic-savannah-63815.herokuapp.com/js/firebase.js" ></script>
<script type="text/javascript"  src='https://enigmatic-savannah-63815.herokuapp.com/js/index.js' charset="UTF-8"></script>

</body>
</html>
