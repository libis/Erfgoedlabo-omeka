<?php echo head(); ?>
<style>
	h3{
		float:left;
		width: 200px;
	}

	.inputs{
		overflow:auto;
	}

	.textinput{
		max-width: 500px;
		min-width: 250px;
	}
</style>
	<div class="content-wrapper simple-page-section ">
	  <div class="container simple-page-container">
	    <!-- Content -->
      <div class="row">
				<div class="col-sm-9 col-xs-12 page">
					<p id="simple-pages-breadcrumbs">
			      <span><a href="<?php echo url('/');?>">Home</a></span>
			       / <?php echo html_escape(get_option('simple_contact_form_contact_page_title')); ?>
			    </p>
					<div class='top'>
			        <h1><?php echo html_escape(get_option('simple_contact_form_contact_page_title')); ?></h1>
			    </div>
					<div class='content'>
							<div id="form-instructions">
								<?php echo get_option('simple_contact_form_contact_page_instructions'); // HTML ?>
							</div>
							<?php echo flash(); ?>
							<form name="contact_form" id="contact-form"  method="post" enctype="multipart/form-data" accept-charset="utf-8">
									<fieldset>
										<div class="field">
										<h3><?php echo $this->formLabel('name', 'Naam: '); ?></h3>
												<div class='inputs'>
												<?php echo $this->formText('name', $name, array('class'=>'textinput')); ?>
												</div>
										</div>

										<div class="field">
										<h3><?php echo $this->formLabel('firstname', 'Voornaam: '); ?></h3>
												<div class='inputs'>
												<?php echo $this->formText('firstname', $firstname, array('class'=>'textinput')); ?>
												</div>
										</div>

										<div class="field">
										<h3><?php echo $this->formLabel('organisation', 'Organisatie: '); ?></h3>
												<div class='inputs'>
												<?php echo $this->formText('organisation', $organisation, array('class'=>'textinput')); ?>
												</div>
										</div>

										<div class="field">
										<h3><?php echo $this->formLabel('address', 'Adres: '); ?></h3>
												<div class='inputs'>
												<?php echo $this->formText('address', $address, array('class'=>'textinput')); ?>
												</div>
										</div>

										<div class="field">
										<h3><?php echo $this->formLabel('tel', 'Telefoonnummer: '); ?></h3>
												<div class='inputs'>
												<?php echo $this->formText('tel', $tel, array('class'=>'textinput')); ?>
												</div>
										</div>

										<div class="field">
												<h3><?php echo $this->formLabel('email', 'Emailadres: '); ?></h3>
												<div class='inputs'>
														<?php echo $this->formText('email', $email, array('class'=>'textinput'));  ?>
												</div>
										</div>

										<div class="field" >
											<h3 style="margin-bottom:6px;">Workshop's</h3>
											<div class='inputs' >
												<p style="margin-bottom:5px;">
													Selecteer 2 verschillende workshops
												</p>
												<input value="preventie" type="checkbox" name="workshop[]"> 	Preventie en planning<br />
												<input value="eerste hulp" type="checkbox" name="workshop[]"> Eerste hulp en solidariteit<br />
												<input value="kostenplaatje" type="checkbox" name="workshop[]"> Kostenplaatje en verzekering<br />
												<input value="wat erna" type="checkbox" name="workshop[]"> Wat erna?
											</div>
										</div>

								</fieldset>

								<fieldset>
										<div class="field">
										  <?php echo $captcha; ?>
										</div>

										<div class="field">
										  <?php echo $this->formSubmit('send', 'Verstuur'); ?>
										</div>
						    </fieldset>
							</form>
					</div>
				</div>
			</div>
		</div>
</div>
<?php echo foot(); ?>
