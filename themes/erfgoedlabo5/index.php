<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<section class="jumbo-section">
<div class="jumbotron">
  <div class='container' role="main" tabindex="-1">

      <div class="row">
        <div class="co-slogan col-md-4">
          <div class="title">
            <h1>Erfgoed<br><span>labo</span></h1>
          </div>
        </div>
        <div class="co-slogan col-md-7">
          <div class="slogan">
            <?php if ( $description = option('description')): ?>
            <p><span><?php echo $description; ?></span>
              </p>
            <?php endif; ?>
            <p>Het Erfgoedlabo Leuven is het netwerk van de professionele culturele erfgoedactoren. In dialoog met de brede erfgoedsector bundelen ze hun krachten door expertisedeling, overleg en samenwerking.</p>
            <div class="about-button">
              <a href="<?php echo url("over-libis");?>">Lees meer</a>
            </div>
          </div>
        </div>
      </div>

  </div>
</div>
</section>
<section class="home partners">
  <div class='container'>
    <div class="row home-row">
      <div class="home-col col-md-6">
        <div class="home-image-1"></div>
      </div>
      <div class="home-col col-md-6">
        <div class="home-block">
          <h2>Ateliers</h2>
          <p>De werking vertaalt zich in 4 ateliers. Hier werken de leden structureel of projectmatig samen aan de belangrijkste thema’s. Participatie loopt als een rode draad door alle ateliers.</p>
          <ul>
            <li><a href="">Atelier behouden en borgen</a></li>
            <li><a href="">Atelier collectiebeleid</a></li>
            <li><a href="">Digitaal atelier</a></li>
            <li><a href="">Atelier presenteren en programmeren</a></li>
          </ul>
          <div class="about-button">
            <a href="<?php echo url("over-libis");?>">Lees meer over de 4 ateliers</a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="home projects">
  <div class='container'>
    <h1>Erfgoedlabo-brede projecten </h1>
    <div class="row">
        <div class="co col-md-6 col-lg-4">
            <div class="col-content">
              <img src="<?php echo img('project1.jpg');?>" alt="idemdatabase_usecase.JPG" title="idemdatabase_usecase.JPG">              </div>
            <a class="block-link" href="alamirefoundation_idem">
              <div class="col-overlay">
                  <h2>Gezamenlijke activiteit op Erfgoeddag</h2>
                  <p>Op Erfgoeddag 2019 gaan de partners samen aan de slag met het thema ambachten.</p>
              </div>
            </a>
        </div>
        <div class="co col-md-6 col-lg-4">
            <div class="col-content">
              <img src="<?php echo img('project2.jpg');?>" alt="Limo in mac.png" title="Limo in mac.png">              </div>
            <a class="block-link" href="limo-zoekinterface">
              <div class="col-overlay">
                <h2>Erfgoed en de vier elementen</h2>
                <p>Onder deze titel schenkt het Erfgoedlabo vanaf 2019 aandacht aan de impact van de vier elementen – water, lucht, aarde en vuur – op het erfgoed in Leuven.</p>

              </div>
            </a>
        </div>
        <div class="co col-md-6 col-lg-4">
            <div class="col-content">
              <img src="<?php echo img('project1.jpg');?>" alt="idemdatabase_usecase.JPG" title="idemdatabase_usecase.JPG">              </div>
            <a class="block-link" href="alamirefoundation_idem">
              <div class="col-overlay">
                  <h2>Gezamenlijke activiteit op Erfgoeddag</h2>
                  <p>Op Erfgoeddag 2019 gaan de partners samen aan de slag met het thema ambachten.</p>
              </div>
            </a>
        </div>

      </div>
      <div class="about-button">
        <a href="<?php echo url("over-libis");?>">Meer informatie over de projecten</a>
      </div>
      <div class="row">
        <?php $usecases = get_usecases();?>
        <?php if($usecases):?>
          <?php foreach($usecases as $usecase):?>
            <div class="co col-md-6 col-lg-4">
              <h2><?php echo metadata($usecase, array("Dublin Core", "Title"));?></h2>
              <div class="col-content">
                <?php echo item_image('square_thumbnail', array(), 0, $usecase);?>
              </div>
              <a class="block-link" href="<?php echo metadata($usecase, array("Item Type Metadata", "simple-page"));?>">
              <div class="col-overlay">
                  <p><?php echo metadata($usecase, array("Dublin Core", "Description"));?></p>
              </div>
              </a>
            </div>
          <?php endforeach;?>
        <?php endif;?>
      </div>

  </div>
</section>

<?php echo foot(); ?>
