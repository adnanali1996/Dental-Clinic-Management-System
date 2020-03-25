
  <!-- Navbar -->                                  
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="index.php" class="nav-link">Home</a>
		</li>
		
	</ul>

	<!-- SEARCH FORM -->
	

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<!-- Messages Dropdown Menu -->
		<!-- Notifications Dropdown Menu -->
		<li class="nav-item">
			<a class="nav-link" href="Logout.php"> Logout</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
		</li>
	</ul>
</nav>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index.php" class="brand-link">  
      <span class="brand-text font-weight-light">Click for support</span>
    </a>



	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Pak Dental</a>
			</div>
		</div>
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column sidebar" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item has-treeview menu-open">
					<a href="index.php" class="nav-link active">
					  <i class="nav-icon fa fa-dashboard"></i>
					  <p>
						Dashboard
					  </p>
					</a>
				</li>
				<li class="nav-item">
					<a href="Patients.php" class="nav-link">
					  <i class="nav-icon fa fa-group"></i>
					  <p>
						Patients
					  </p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="schduler.php" class="nav-link">
					  <i class="nav-icon fa fa-calendar"></i>
					  <p>
						Scheduler
					  </p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="appointments.php" class="nav-link">
					  <i class="nav-icon fa fa-calendar"></i>
					  <p>
						Appointments
					  </p>
					</a>
				</li>
				<?php
				
				

				if (isset($_SESSION['admin'])) {
					# code...
					echo '<li class="nav-item has-treeview ">
					<a href="#" class="nav-link">
					  <i class="fa fa-line-chart"></i>
					  <p>
						Finance
						 <i class="right fa fa-angle-left"></i>
					  </p>
					</a>
					<ul class="nav nav-treeview">
						
						<li class="nav-item">
							<a href="Billing.php" class="nav-link">
							  <i class="fa fa-circle-o nav-icon"></i>
							  <p> Billing Statements</p>
							</a>
						</li>
						
					</ul>
				</li>';
				}
				
				?>
				
				<li class="nav-item has-treeview">
					<a href="Chief.php" class="nav-link">
					 <i class="fa fa-cog"></i>
					  <p>
						Maintenance
					   <i class="right fa fa-angle-left"></i>
					  </p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="Chief.php" class="nav-link">
							  <i class="fa fa-circle-o nav-icon"></i>
							  <p>Chief complaints</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="Signs.php" class="nav-link">
							  <i class="fa fa-circle-o nav-icon"></i>
							  <p>Signs and symptoms</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="Diagnoses.php" class="nav-link">
							  <i class="fa fa-circle-o nav-icon"></i>
							  <p>Diagnoses</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="Procedures.php" class="nav-link">
							  <i class="fa fa-circle-o nav-icon"></i>
							  <p>Procedures</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="Materials.php" class="nav-link">
							  <i class="fa fa-circle-o nav-icon"></i>
							  <p>Materials</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="Statuses.php" class="nav-link">
							  <i class="fa fa-circle-o nav-icon"></i>
							  <p>Statuses</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="Prescriptions.php" class="nav-link">
							  <i class="fa fa-circle-o nav-icon"></i>
							  <p>Prescriptions</p>
							</a>
						</li>
					</ul>
				</li>
				<?php
				if (isset($_SESSION['admin'])) {
					# code...
					echo'	<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
					  <i class="fa fa-sliders"></i>
					  <p>
						Manage my acount
					   <i class="right fa fa-angle-left"></i>
					  </p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="Manage.php" class="nav-link">
							  <i class="fa fa-circle-o nav-icon"></i>
							  <p>Manage my account</p>
							</a>
						</li>

					</ul>
				</li>';
				}
				?>
			



</script>
				<form method="post" name="findme">
					
					<select class=" vendor form-control" id="sel vendor" onchange="javascript:handleSelect(this)">
						<option>Find me a...</option>
						<optgroup label="Operations">
							<option value="Patients">Patients</option><a>
							<option value="schduler">Scheduler</option>
							
						</optgroup>
						<?php
						if (isset($_SESSION['admin'])) {
							# code...
							echo'<optgroup label="Finance">
							<option value="Quotations">Quotations</option><a>
							<option value="Billing">Billing Statment</option>
							
						</optgroup>';
						}
						?>
						
						<optgroup label="Maintenance">
							<option value="Chief"><a href="java.html">Chief complaints</a></option>
							<option value="Signs">Signs and symptoms</option>
							<option value="Diagnoses">Diagnoses</option>
							<option value="Procedures">Procedures</option>
							<option value="Materials">Materials</option>
							<option value="Statuses">Statuses</option>
							<option value="Prescriptions">Prescriptions</option>
						</optgroup>

					</select>
				</form>
		
<script type="text/javascript">
function handleSelect(elm)
{
window.location = elm.value+".php";
}
</script>
			</ul>
		</nav>
	</div>

	<!-- /.sidebar-menu -->
	<!-- /.sidebar -->
</aside>
<!-- Main Sidebar Container End -->