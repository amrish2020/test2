<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>bootstrap/js/validation.js"></script>

	<style>
 	.error {
		color: #ff0000;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Multi Contact Form</h1>

	<div id="body">
	<div class="panel panel-default">	
		<div class="panel-body">
			<div class="row">
			
			<?php if($this->session->flashdata('form_error')):  ?>
				<div class="row">
					<div class="col-md-12 alert alert-danger">
					<?php 
						foreach($this->session->flashdata('form_error') as $key=>$val):
							if($val){
								echo '<ul class="mb-5">';
								echo '<li> Row '.$key.'</li>';
								foreach($val as $k=>$err):
									echo '<li>'.$err.'</li>';
								endforeach;	
								echo '</ul><br/>';		
							}
						endforeach;
					?>			
					</div>
				</div>	 
			<?php 
			endif;
			if($this->session->flashdata('form_success')): 
			?>
				<div class="row">
					<div class="col-md-12">
							<div class="alert alert-success"><b><span class="glyphicon glyphicon-ok"></span></b> <?php echo $this->session->flashdata('form_success') ?></div>
					</div>
				</div>
			<?php endif;  ?>		
			</div>
			<div class="row">
				<div class="col-md-6">
				<?php echo form_open(site_url("welcome/add_contact"), array("class" => "form-horizontal","name"=>"add_contact","id"=>"addcontact")) ?>
				<div class="text-right col-md-12">
					<input type="button" id="adddivcont"  class="btn btn-primary right" value="Add Contact">
					<input type="button" id="validabtn"  class="btn btn-primary right" value="Validate">
					<input type="submit" class="btn btn-primary right" value="Save" />
				</div>	
				<div id="addrow">
					
				</div>
				<?php echo form_close() ?>
				</div>
				<div class="col-md-6">
					<?php echo form_open(site_url("welcome/remove_contact/"), array("class" => "form-horizontal")) ?>
					<div class="text-right col-md-12">
						<input type="submit" class="btn btn-primary right" value="Remove" />
					</div>	
					<div class="col-md-12">
						<div class="form-group">
								<label for="name-in" class="col-md-3 label-heading">Name</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="name-srch" name="search_name" value="">
								</div>
						</div>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
			
	</div>
	</div>
	</div>
</div>
</body>
</html>