<nav class="navbar navbar-default">
    <div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand">Anonymous Chatting System</a>
		</div>

		<ul class="nav navbar-nav">
			<li><a href="index.php"><span class="glyphicon glyphicon-list"></span> Chat Rooms</a></li>
			<li><a href="user.php"><span class="glyphicon glyphicon-user"></span> Users</a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li><a href="#account" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> <?php echo $user; ?></a></li>
			<li>
            	<button style="margin-top: 10px"><a href="#logout" data-toggle="modal"><span class="glyphicon glyphicon-off"></span> Logout</a></button>
			</li>
		</ul>
    </div>
</nav>
