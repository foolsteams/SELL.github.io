function isuccess(title, desc) { 
	swal({
	title: '<span style="color:black">'+title+'</span>',
	type: 'success',
	html: '<span style="color:gray">'+desc+'</span>',
	showConfirmButton: false,
	})
	.then(function(isConfirm) {
	 var url = "";   
	  if (isConfirm === true) {
		$(location).attr('href',url);
	  }else {
		$(location).attr('href',url);
	  }
	})
}

function ierror(title, desc) {
	swal({
	title: '<span style="color:black">'+title+'</span>',
	type: 'error',
	html: '<span style="color:gray">'+desc+'</span>',
	confirmButtonText: '<span style="color:black;"><i class="fa fa-times"></i> ปิด</span>',
	confirmButtonColor: '#e54d40',
   })
}

function iwarning(title, desc) {
	swal({
	title: '<span style="color:black">'+title+'</span>',
	type: 'warning',
	html: '<span style="color:gray">'+desc+'</span>',
   })
}
function buy() {
	$("#return").html("<script>iwarning('<i class=\"fa fa-spinner fa-spin fa-fw\"></i>\', 'กำลังทำรายการ รอซักครู่..');</script>");
	$.get( "index.php",{truewallet: $('#itruewallet').val(),facebook: $('#facebook').val()}, function( data ) {
	$( "#return" ).html( data );
  }
 );
}