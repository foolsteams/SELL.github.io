<?php

// SETTING
$title = 'ระบบขายของ V1 '; // ชื่อสินค้า

$truewallet_em = 'supersharp3310@gmail.com'; // อีเมลวอเลท
$truewallet_pw = '1312542a'; // รหัสวอเลท
$truewallet_phone = '0962371804'; // เบอร์วอเลท

$truewallet_text = 'Google'; // ข้อความเช็คโอน
$truewallet_amount = '1.00'; // ราคา

$download_url = 'https://google.com'; //ลิงค์ดาวน์โหลด

if(isset($_GET['truewallet'])) {
	$tw_pw = $_GET['truewallet'];
	$facebook = $_GET['facebook'];
	if(empty($facebook) || empty($tw_pw)) { 
	echo "<script>ierror('Error !!', 'กรุณาอย่าเว้นช่องวาง');</script>";
	exit();
}
	if(!is_numeric($tw_pw)||strlen($tw_pw)!='14' || $tw_pw < 1) { 
	echo "<script>ierror('Error !!', 'กรุณากรอกเลขอ้างอิงให้ถูกต้อง');</script>";
	exit();
}
// API FOR CONNECT WALLET
	$ijson = file_get_contents('https://api.itorkungz.me/?truewallet&email='.$truewallet_em.'&password='.$truewallet_pw.'&card='.$tw_pw.'&username='.urlencode($facebook).' ');
	$itopup = json_decode($ijson, true);
	$tw_id = $itopup['id'];
	$tw_ms = $itopup['message'];
	$tw_phone = $itopup['phone'];
	$tw_date = $itopup['date'];
	$tw_amount = $itopup['amount'];
	
if ($itopup['use'] == 1) {
	echo "<script>ierror('Error Already!', 'เลขอ้างอิงถูกใช้ไปแล้ว<br> ".$tw_pw."');</script>";
	exit();
}
if ($itopup['code'] == 0) {
	echo "<script>ierror('Error 404!', 'ไม่พบเลขอ้างอิงที่กรอกมา<br> ".$tw_pw."');</script>";
	exit();
}
if($tw_amount !== $truewallet_amount) {
	echo "<script>ierror('Error !!', 'คุณต้องโอนเงินให้ตรงกับ ระบบกำหนดให้ <br> คุณต้องโอนจำนวน <font color=\"black\">\"$truewallet_amount\"</font> เท่านั้น !!');</script>";
	exit();
}
if($tw_ms !== $truewallet_text) {
	echo "<script>ierror('Error !!', 'ข้อความของคุณไม่ตรงกับ ระบบกำหนด <br> คุณต้องใส่ข้อความว่า <font color=\"black\">\"$truewallet_text\"</font> เท่านั้น !!');</script>";
	exit();
}
	if ($itopup['code'] == 1) {
				echo "<script>isuccess('Success Buy!', 'ซื้อสินค้าสำเร็จ <br>จำนวน : $tw_amount บาท <br><a href=\"".$download_url."\" class=\"btn btn-success\"><i class=\"fas fa-download\"></i>&nbsp;Download</a> ');</script>";
				exit();
					}
		else
		{
			echo "<script>ierror('Error 404!', 'ไม่พบเลขอ้างอิงที่กรอกมา<br> ".$tw_pw."');</script>";
			exit();
		}
}
?>
<html>
 <head>
  <meta charset="utf-8">
  <meta name="description" content="Home | iTONGKHIW">
  <meta name="keywords" content="อิไตร๊ๆๆ">
  <meta name="author" content="iTONGKHIW">
  <title>Home | AutoSell</title>
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="dist/bootstrap.min.css">
  <link rel="stylesheet" href="dist/styles.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:300">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <script src="dist/jquery.min.js"></script>
  <script src="dist/bootstrap.min.js"></script>
  <script src="dist/sweetalert.min.js"></script>
  <script src="dist/script.js"></script>
  <style type="text/css">
	body
	{
	    background: url(dist/background.jpg?v=1.0) no-repeat center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		font-family:"Kanit", sans-serif;
		color: black;
	}
	</style>
 </head>
  <body>
		<div class="container col-6" style="margin-top:200px;">
			  <div align="center">
			  <div class="border border-light" style="margin-top:40px; margin-bottom: 50px; ">
			 <div class="card-header" style="color:white; background: rgba(0,0,0,0.5) !important;"><h5><i class="fas fa-credit-card"></i>&nbsp;<?php echo $title; ?>(<?php echo $truewallet_amount; ?> บาท)</h5></div>
			   <div class="card-body" style="background: rgba(0,0,0,0.3) !important;">	
			   <div id="return"></div>
			   <hr class="bg-light">
			   <p>
			   </p>
			   <input type="hidden" name="act" value="">
			   
			   <div class="text-left mt-1 text-light"><i class="fa fa-angle-right"></i> ชื่อเฟสบุ๊ค</div>
				<div class="input-group" style="margin-bottom: 10px;">
				<input class="form-control" style="height: 40px;" name="facebook" id="facebook" type="username" placeholder="Kongdat Kongkun">
				</div>
			   <div class="text-left mt-1 text-light"><i class="fa fa-angle-right"></i> เลขอ้างอิง</div>
				<div class="input-group">
				<input class="form-control" style="height: 40px;" name="itruewallet" id="itruewallet" type="text" placeholder="กรุณากรอกเลขอ้างอิง 14 หลัก">
				</div>
				<div class="text-center" style="color: white; margin-top:20px;">
					  <i class="fa fa-angle-right"></i> วิธีการเติมเงินวอเลท <small>(หากโอนแล้วกรุณารอ 10-20 วินาที แล้วกดแจ้งการโอน)</small> :
						<li> เปิดแอพวอเลท กดเมนู โอนเงิน ใส่เบอร์วอเลท <a class="btn btn-primary" style="color: pink;"><?php echo $truewallet_phone; ?></a></li>
						<li> ใส่จำนวนเงิน <b><?php echo $truewallet_amount; ?> บาท</b> แล้วกดปุ่ม โอนเงิน แล้วกด ยืนยันการโอนเงิน</li>
						<li> เสร็จแล้วจะเห็น เลขที่อ้างอิง ให้นำมาใส่ </li>
						</div>
					<div style="margin-top:10px;" class="alert alert-danger"><i class="fa fa-exclamation-triangle fa-lg"></i> <b>คำเตือน</b> ตอนโอนเงินกรุณาใส่คำว่า  "<b><?php echo $truewallet_text; ?></b>" ด้วยไม่งั้น ระบบจะไม่เช็ค !!!!!</div>
					<div style="margin-top:10px;" class="alert alert-warning"><i class="fa fa-exclamation-triangle fa-lg"></i> <b>คำเตือน</b> กรุณาโอนเงินจำนวน  "<b><?php echo $truewallet_amount; ?></b>" บาท ด้วยไม่งั้น ระบบจะไม่เช็ค !!!!!</div>
			<br>
				<button class="btn btn-outline-light btn-block" type="submit" id="btn" onclick="buy();"><i class="fas fa-sign-in-alt"></i> ยืนยันการโอนเงิน</button>
		     </div>
		   </div>
		  </div>
		</div>
      
  </body>
</html>