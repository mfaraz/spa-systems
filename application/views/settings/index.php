<div class="panel-heading">
	<h3 class="panel-title">Systems Configuration</h3>
</div>
<div class="panel-body">
	<?php
	echo $this->session->flashdata('message');
	$settings->result_array();
	$setting = $settings->result_array[0];
	?>
	<div class="content">
		<div class="row-fluid">
			<?php echo form_open_multipart('settings/save_default', 'class="form-horizontal" role="form"'); ?>
			<div class="btn-toolbar" role="toolbar">
				<button type="submit" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</div>
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#companySetting" role="tab" data-toggle="tab">Company Setting</a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="companySetting">
					<div class="panel-group" id="accordion">
						<div class="col-lg-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										<a data-toggle="collapse" class="accordion-toggle" href="#collapseOne">
											Name
										</a>
									</h3>
								</div>
								<div id="collapseOne" class="panel-collapse in">
									<div class="panel-body">
										<div class="form-group">
											<div class="col-sm-12 input-group">
												<span class="input-group-addon"><span class="glyphicon
																					  glyphicon-tower"></span></span>
												<input type="text" name="DEFAULT_COMPANY_NAME" value="<?php echo set_value('DEFAULT_COMPANY_NAME', $setting['DEFAULT_COMPANY_NAME']) ?>" class="form-control input-sm" pattern=".{3,50}" title="Allow enter between 3 to 50 characters" required />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										<a data-toggle="collapse" class="accordion-toggle" href="#collapseTwo">
											Address
										</a>
									</h3>
								</div>
								<div id="collapseTwo" class="panel-collapse in">
									<div class="panel-body">
										<div class="form-group">
											<div class="col-sm-12 input-group">
												<span class="input-group-addon"><span class="glyphicon
																					  glyphicon-home"></span></span>
												<textarea name="DEFAULT_COMPANY_ADDRESS" class="form-control
														  input-sm" required><?php echo set_value('DEFAULT_COMPANY_ADDRESS', $setting['DEFAULT_COMPANY_ADDRESS'])
			?></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										<a data-toggle="collapse" class="accordion-toggle" href="#collapseThree">
											Phone
										</a>
									</h3>
								</div>
								<div id="collapseThree" class="panel-collapse in">
									<div class="panel-body">
										<div class="form-group">
											<div class="col-sm-12 input-group">
												<span class="input-group-addon"><span class="glyphicon
																					  glyphicon-phone-alt"></span></span>
												<input type="text" name="DEFAULT_COMPANY_PHONE" class="form-control
													   input-sm" value="<?php echo set_value('DEFAULT_COMPANY_PHONE', $setting['DEFAULT_COMPANY_PHONE'])
			?>" required />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										<a data-toggle="collapse" class="accordion-toggle" href="#collapseSix">
											Logo
										</a>
									</h3>
								</div>
								<div id="collapseSix" class="panel-collapse in">
									<div class="panel-body">
										<div class="form-group">
											<div class="col-sm-12 input-group">
												<?php echo form_upload('DEFAULT_COMPANY_LOGO', set_value('DEFAULT_COMPANY_LOGO', $setting['DEFAULT_COMPANY_LOGO']), 'class="pull-left"'); ?>
												<img src="<?php echo base_url() . IMG_PATH . $setting['DEFAULT_COMPANY_LOGO']; ?>" alt="Logo" width="200" class="pull-right" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										<a data-toggle="collapse" class="accordion-toggle" href="#collapseSeven">
											Email
										</a>
									</h3>
								</div>
								<div id="collapseSeven" class="panel-collapse in">
									<div class="panel-body">
										<div class="form-group">
											<div class="col-sm-12 input-group">
												<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
												<input type="text" name="DEFAULT_COMPANY_EMAIL" class="form-control
													   input-sm" value="<?php echo set_value('DEFAULT_COMPANY_EMAIL', $setting['DEFAULT_COMPANY_EMAIL']); ?>" placeholder="username@abc.com"	/>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
