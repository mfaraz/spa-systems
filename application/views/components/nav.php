<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<nav class="navbar-collapse collapse">
			<ul class="nav navbar-nav pull-left">
				<?php if ($this->musers->has_login('mul_welcome')): ?>
					<li class="<?php echo $this->uri->segment(1) == 'welcome' ? 'active' : '' ?>">
						<?php
						echo anchor('welcome/', '<i class="fa fa-home fa-3x"></i>Home', 'title="Dashboard"');
						?>
					</li>
					<?php
				endif;
				if ($this->musers->has_login('mul_sales')):
					?>
					<li class="<?php echo $this->uri->segment(1) == 'sales' ? 'active' : '' ?>">
						<?php
						echo anchor('sales/', '<i class="fa fa-shopping-cart fa-3x"></i>Sales', 'title="Sales"');
						?>
					</li>
					<?php
				endif;
				if ($this->musers->has_login('mul_services')):
					?>
					<li class="<?php echo $this->uri->segment(1) == 'services' ? 'active' : '' ?>">
						<?php
						echo anchor('services/', '<i class="fa fa-paw fa-3x"></i>Services', 'title="Services"');
						?>
					</li>
					<?php
				endif;
				if ($this->musers->has_login('mul_categories')):
					?>
					<li class="<?php echo $this->uri->segment(1) == 'categories' ? 'active' : '' ?>">
						<?php
						echo anchor('categories/', '<i class="fa fa-cubes fa-3x"></i>Categories', 'title="Categories"');
						?>
					</li>
					<?php
				endif;
				if ($this->musers->has_login('mul_reports')):
					?>
					<li class="<?php echo $this->uri->segment(1) == 'reports' ? 'active' : '' ?>">
						<?php
						echo anchor('reports/', '<i class="fa fa-bar-chart-o fa-3x"></i>Reports', 'title="Reports"');
						?>
					</li>
					<?php
				endif;
				if ($this->musers->has_login('mul_rooms')):
					?>
					<li class="<?php echo $this->uri->segment(1) == 'rooms' ? 'active' : '' ?>">
						<?php
						echo anchor('rooms/', '<i class="fa fa-home fa-3x"></i>Rooms', 'title="Rooms"');
						?>
					</li>
					<?php
				endif;
				if ($this->musers->has_login('mul_employees')):
					?>
					<li class="<?php echo $this->uri->segment(1) == 'employees' ? 'active' : '' ?>">
						<?php
						echo anchor('employees/', '<i class="fa fa-users fa-3x"></i>Employees', 'title="Employees"');
						?>
					</li>
					<?php
				endif;
				if ($this->musers->has_login('mul_members')):
					?>
					<li class="<?php echo $this->uri->segment(1) == 'members' ? 'active' : '' ?>">
						<?php
						echo anchor('members/', '<i class="fa fa-users fa-3x"></i>Members', 'title="Members"');
						?>
					</li>
					<?php
				endif;
				if ($this->musers->has_login('mul_referrers')):
					?>
					<li class="<?php echo $this->uri->segment(1) == 'referrers' ? 'active' : '' ?>">
						<?php
						echo anchor('referrers/', '<i class="fa fa-users fa-3x"></i>Referrers', 'title="Referrers"');
						?>
					</li>
					<?php
				endif;
				if ($this->musers->has_login('mul_users')):
					?>
					<li class="<?php echo $this->uri->segment(1) == 'users' ? 'active' : '' ?>">
						<?php
						echo anchor('users/', '<i class="fa fa-user fa-3x"></i>Users', 'title="Users"');
						?>
					</li>
					<?php
				endif;
				if ($this->musers->has_login('mul_settings')):
					?>
					<li class="<?php echo $this->uri->segment(1) == 'settings' ? 'active' : '' ?>">
						<?php
						echo anchor('settings/', '<i class="fa fa-gear fa-3x"></i>Settings', 'title="Settings"');
						?>
					</li>
				<?php endif; ?>
			</ul>
			<ul class="nav navbar-nav pull-right">
				<li><?php echo anchor('login/logout/', '<i class="fa fa-sign-out fa-3x"></i>Sign Out', 'title = "Sign Out"'); ?></li>
			</ul>
		</nav>
	</div>
</div>