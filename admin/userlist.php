<div class="col-lg-12">
    <div class="panel panel-default" style="height:50px;">
		<span style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong><span class="glyphicon glyphicon-user"></span> User List</strong></span>
		
	</div>
	<table width="100%" class="table table-striped table-bordered table-hover" id="userList">
        <thead>
            <tr>
				<th>Username</th>
				<th>Screen Resolution</th>
				<th>Ip Address</th>
				<th>Access</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query=mysqli_query($conn,"select * from `user` order by userid asc");
			while($row=mysqli_fetch_array($query)){
			?>
			<tr>
				<td><input type="hidden" id="eusername<?php echo $row['userid']; ?>" value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></td>
				<td><input type="hidden" id="escreen_resolution<?php echo $row['userid']; ?>" value="<?php echo $row['screen_resolution']; ?>"><?php echo $row['screen_resolution']; ?></td>
				<td><input type="hidden" id="eip_address<?php echo $row['userid']; ?>" value="<?php echo $row['ip_address']; ?>"><?php echo $row['ip_address']; ?></td>
				<td>
					<?php 
						if ($row['access']==1){
							echo "Admin";
						}
						else{
							echo "User";
						}
					?>
				</td>
				<td> 
					<button type="button" class="btn btn-warning edituser" value="<?php echo $row['userid']; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</button> || 
					<button type="button" class="btn btn-danger deleteuser" value="<?php echo $row['userid']; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</button>
				</td>
			</tr>
			<?php
			}
		?>
        </tbody>
    </table>                     
</div>