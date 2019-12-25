<?php
    require_once("nghiepvu/taoLopHP/controller/taoLopHPController.php");
    require_once("nghiepvu/taoKyThi/controller/taoKyThiController.php");
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        if ($_SESSION["vaitro"] !== "admin") header("location: index.php");
    } else header("location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="
    background: linear-gradient(to left, #d9a7c7, #fffcdc);
    overflow-x: hidden;">
  <nav class="navbar navbar-light" style="background-color: #AFEEEE;">
    <span class="navbar-text">
    	<a>Trang quản lý</a>
    </span>
    <span> Người dùng: <?php echo $_SESSION["username"] ?> </span> 
    <a href="logout.php">Sign Out<i class="fa fa-sign-out"></i></a>
  </nav>

  <div class="row">
    <div class="col-2">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="nhap-ds-sv" data-toggle="tab" href="#ds-sv" role="tab" aria-controls="ds-sv" aria-selected="true">Nhập danh sách sinh viên</a>
        <a class="list-group-item list-group-item-action" id="tao-ds-hp" data-toggle="tab" href="#tao-hp" role="tab" aria-controls="tao-hp" aria-selected="false">Danh sách lớp học phần</a>
        <a class="list-group-item list-group-item-action" id="nhap-ds-dkh" data-toggle="tab" href="#nhap-dkh" role="tab" aria-controls="nhap-dkh" aria-selected="false">Nhập danh sách đang thi học</a>
        <a class="list-group-item list-group-item-action" id="tao-lich-thi" data-toggle="tab" href="#tao-lichthi" role="tab" aria-controls="tao-lichthi" aria-selected="false">Tạo lịch thi</a>
        <a class="list-group-item list-group-item-action" id="in-ds-thi" data-toggle="tab" href="#in-dsthi" role="tab" aria-controls="in-dsthi" aria-selected="false">In danh sách thi</a>
      </div>
    </div>

    <div class="col-10">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade active show" id="ds-sv" role="tabpanel" aria-labelledby="nhap-ds-sv" >
           <div class="jumbotron">
            Chọn file Excel danh sách sinh viên:
            <br><br>
            <input type="file" name="Filesv">
            <br><br>
            <input type="submit">
          </div>
            
        </div>
        <div class="tab-pane fade" id="tao-hp" role="tabpanel" aria-labelledby="tao-ds-hp">
          <div class="jumbotron">
            <?php $abc = new taoLopHPController(); $abc->proc();?>
          </div>
        </div>
        <div class="tab-pane fade" id="nhap-dkh" role="tabpanel" aria-labelledby="nhap-ds-dkh">
          <div class="jumbotron">
           Chọn file Excel danh sách sinh viên-lớp học phần:
            <br><br>
            <input type="file" name="Filesvhp">
            <br><br>
            <input type="submit">
          </div>
        </div>
        <div class="tab-pane fade" id="tao-lichthi" role="tabpanel" aria-labelledby="tao-lich-thi">
          <div class="jumbotron">
          <?php $abc = new taoKyThiController(); $abc->proc();?>
          </div>
        </div>
        <div class="tab-pane fade" id="in-dsthi" role="tabpanel" aria-labelledby="in-ds-thi">
              <div class="jumbotron">
            Giao dien in thong tin tung ca thi
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax/ajax.js"></script>
<script>
		document.getElementById("taocathi-form").onsubmit = function() {
      // Gui request bang AJAX
			let xmlhttp = getXmlHttpObject();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4) {
					// Nhan ket qua JSON
					let v = xmlhttp.responseText;
					let o = JSON.parse(v);
					if (v.length > 0) {
						// Cap nhat DOM
						//document.getElementById("out").innerText = v.toString();
						console.log(v);
					}
				}
			};

			xmlhttp.open("POST", "nghiepvu/taoKyThi/controller/themKythiAPI.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlhttp.send("mahp="+$("#mahp").val()
                  +"&makythi="+ $("#makythi").val()
                  +"&lichthi="+ $("#lichthi").val()
                  +"&soluong="+ $("#soluong").val()
                  +"&phongthi="+ $("#phongthi").val()
                  );
			return false;
		};
	</script>
</html>

