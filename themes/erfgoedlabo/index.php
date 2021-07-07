<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<section class="jumbo-section">
<div class="jumbotron">
  <div class='container' role="main" tabindex="-1">
      <div class="row">
        <div class="co-slogan col-lg-4 col-lg-3">
          <div class="title">
            <!--<h1>Erfgoed<br><span>labo</span></h1>-->
            <a href="<?php echo url("/");?>"></a><img src="<?php echo img('logo.png');?>"></a>
          </div>
        </div>
        <div class="co-slogan offset-md-1 col-md-10 offset-lg-1 col-lg-6">
          <div class="slogan">
            <?php if ( $description = option('description')): ?>
            <p><span><?php echo $description; ?></span>
              </p>
            <?php endif; ?>
            <p>Het Erfgoedlabo Leuven is het netwerk van de professionele cultureel-erfgoedactoren. In dialoog met de brede erfgoedsector bundelen ze hun krachten door expertisedeling, overleg en samenwerking.</p>
            <div class="about-button">
              <a href="<?php echo url("over");?>">Lees meer</a>
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
            <li>Atelier behouden en borgen</li>
            <li>Atelier collectiebeleid</li>
            <li>Digitaal atelier</li>
            <li>Atelier presenteren en programmeren</li>
          </ul>
          <div class="about-button">
            <a href="<?php echo url("ateliers");?>">Lees meer over de 4 ateliers</a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="home projects">
  <div class='container'>
    <div class="row">
    <?php $items = get_records("Item",array('public' => true, 'featured' => true, 'sort_field' => 'modified', 'sort_dir' => 'd'),3);?>
    <?php
    $project = array(); $news= array();
    foreach($items as $item):
      if(metadata($item,'item_type_name') == 'Project'):
        $projects[] = $item;
      elseif(metadata($item,'item_type_name') == 'News'):
        $news[] = $item;
      endif;
    endforeach;
    ?>

    <?php if($projects):?>
      <div class="col-sm-12 col-md-<?php echo 4*sizeof($projects);?>">
        <h1>Projecten </h1>
        <div class="row">

        <?php foreach($projects as $project):?>
          <div class="co col-sm-12 col-md-<?php echo 12/sizeof($projects);?>">
              <a class="block-link" href="<?php echo record_url($project);?>">
                <?php
                  $files = $project->Files;
                  $url = "";
                  if($files):
                    $url = file_display_url($files[0],'thumbnail');
                  endif;
                ?>
                <div class="col-content" style="height:250px;background:#f0f8f4 url(<?php echo $url;?>);background-size: cover;margin-bottom: 1rem;)">

                </div>
                <div class="col-overlay">
                    <h2><?php echo metadata($project, array("Dublin Core", "Title"));?></h2>
                    <p><?php echo metadata($project, array("Dublin Core", "Subject"));?></p>
                </div>
              </a>
          </div>
        <?php endforeach;?>
        </div>
        <div class="about-button">
          <a href="<?php echo url("projecten");?>">Meer informatie over de projecten</a>
        </div>
      </div>
      <?php endif;?>

      <?php if($news):?>
        <div class="col-sm-12 col-md-<?php echo 4*sizeof($news);?>">
          <h1>Nieuws</h1>
          <div class="row">

          <?php foreach($news as $new):?>
            <div class="co col-sm-12 col-md-<?php echo 12/sizeof($news);?>">
                <a class="block-link" href="<?php echo record_url($new);?>">
                  <?php
                    $files = $new->Files;
                    $url = "";
                    if($files):
                      $url = file_display_url($files[0],'thumbnail');
                    endif;
                  ?>
                  <div class="col-content" style="height:250px;background: #f0f8f4 url(<?php echo $url;?>);background-size: cover;margin-bottom: 1rem;)">

                  </div>
                  <div class="col-overlay">
                      <h2><?php echo metadata($new, array("Dublin Core", "Title"));?></h2>
                      <?php if($date = metadata($new, array("Dublin Core", "Date"))):?>
                        <p class="date">
                          <?php echo $date;?>
                        </p>
                      <?php endif;?>
                      <p><?php echo metadata($new, array("Dublin Core", "Subject"));?></p>
                  </div>
                </a>
            </div>
          <?php endforeach;?>
          </div>
          <div class="about-button">
            <a href="<?php echo url("nieuws");?>">Meer nieuws</a>
          </div>
        </div>
        <?php endif;?>
      </div>
    </div>
  </div>
</section>

<?php echo foot(); ?>
