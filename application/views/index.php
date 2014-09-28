<?php
ignore_user_abort(true);
header("Cache-Control: no-store, no-cache, must-revalidate");
echo doctype('html5');
?>
<html lang="en-US">
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta charset="UTF-8">
		<?php
		echo stylesheets();
		echo site_title($title);
		?>
		<script type="text/javascript" src="<?php echo base_url(); ?>resources/js/jquery.min.js"></script>
	</head>
	<body class="main">
		<!-- navigation [BEGIN] -->
		<?php
		$this->load->view('components/nav.php');
		?>
		<!-- navigation [END] -->
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<?php
						$dir = $this->uri->segment(1);
						$page = $this->uri->segment(2);
						if (!$page) {
							if ($dir !== 'welcome') {
								$this->load->view($dir . '/index');
							} else {
								$this->load->view('components/dashboard');
							}
						} else {
							$this->load->view($dir . '/' . $page);
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php echo javascripts(); ?>
	</body>
</html>