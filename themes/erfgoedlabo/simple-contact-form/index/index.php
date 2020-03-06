<?php echo head(); ?>
<style>
	h3{
		float:left;
		width: 220px;
	}

	.inputs{
		overflow:auto;
	}

	.textinput{
		max-width: 500px;
		min-width: 280px;
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
											<h3 style="margin-bottom:6px;float:none;width:100%;"><label>Werksessie 1: In welke klimaatcondities moet je jouw collectie bewaren?  Kies jouw collectieprofiel:</label></h3>
											<div class='inputs' >
												<input value="museale" type="radio" name="workshop"> Museale collectie<br />
												<input value="archief" type="radio" name="workshop"> Archiefcollectie<br />
												<input value="bibliotheek" type="radio" name="workshop"> Bibliotheekcollectie<br />
												</div>
										</div>

										<div class="field" >
											<h3 style="margin-bottom:6px;float:none;width:100%;"><label>Werksessie 2: Welke passieve ingrepen zijn mogelijk ten aanzien van luchtkwaliteit en binnenklimaat? Kies jouw collectieprofiel:</label></h3>

											<div class='inputs' >
												<input value="museale" type="radio" name="workshop2"> Museale collectie<br />
												<input value="archief" type="radio" name="workshop2"> Archiefcollectie<br />
												<input value="bibliotheek" type="radio" name="workshop2"> Bibliotheekcollectie<br />
												</div>
										</div>

										<div class="field" >
											<h3 style="margin-bottom:6px;"><label>Attest nodig?</label></h3>
											<div class='inputs' >
														<input value="ja" type="checkbox" name="attest">
											</div>
										</div>

										<div class="field">
										<h3>Op welke vraag wil je zeker een antwoord krijgen?</h3>
												<div class='inputs'>
												<?php echo $this->formText('vraag', $vraag, array('class'=>'textinput')); ?>
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
								<h5>Betaling</h5>
								<p>Gelieve 30 euro  over te schrijven op rekening BE60 7340 0666 0370 met vermelding van: ????????????? + naam deelnemer
								</p>
								<p><em>Betaling via factuur?</em><br />
								Mail dan naam bedrijf, adres, e-mail facturatie, BTW-nr./ondernemingsnr., bestelbonnr. of referentie bestelbon (indien dit moet vermeld worden op de factuur) naar <strong>ann.boeckmans@kuleuven.be</strong>.
								</p>
								<p><em>Bestelbon opmaken?</em><br />
								Graag volgende gegevens gebruiken: KU Leuven, Oude Markt 13, B-3000 Leuven, Rek. nr.: BE09 4320 0000 1157 (hoofdrekeningnr. KU Leuven), BIC: KREDBEBB, BTW-nr.: BE 0419.052.173; Ondernemingsnr.: 0419.052.173.
								</p>
							</form>
					</div>
				</div>
			</div>
		</div>
</div>
<?php echo foot(); ?>
