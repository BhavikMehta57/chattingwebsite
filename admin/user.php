<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<div class="row">
		<?php include('userlist.php'); ?>
	</div>
</div>

<?php include('cruduser_modal.php'); ?>
<?php include('modal.php'); ?>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/dataTables.responsive.js"></script>
<script>
$(document).ready(function(){
	
	
	$('#userList').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": false,
	"pageLength": 7
	});

	//
	$(document).on('click', '.deleteuser', function(){
		var rid=$(this).val();
		$('#delete_user').modal('show');
		$('.modal-footer #confirm_delete').val(rid);
	});
	
	$(document).on('click', '#confirm_delete', function(){
		var nrid=$(this).val();
		$('#delete_user').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"deleteuser.php",
				method:"POST",
				data:{
					id: nrid,
					del: 1,
				},
				success:function(){
					window.location.href='user.php';
				}
			});
	});
	
	$(document).on('click', '.edituser', function(){
		var rid=$(this).val();
		var username=$('#eusername'+rid).val();
		$('#edit_user').modal('show');
		$('.modal-body #user_user').val(username);
		$('.modal-footer #confirm_update').val(rid);
	});
	
	$(document).on('click', '#confirm_update', function(){
		var nrid=$(this).val();
		var nuser=$('#user_user').val();
		$('#edit_user').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"update_user.php",
				method:"POST",
				data:{
					id: nrid,
					username: nuser,
					edit: 1,
				},
				success:function(){
					window.alert('User Updated!');
					window.location.href='user.php';
				}
			});
	});
 
});

</script>	
</body>
</html>