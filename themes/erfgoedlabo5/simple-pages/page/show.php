<?php
$bodyclass = 'page simple-page';
$dienst = get_color();


if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;

echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
));
?>
<?php $text = get_dienst_metadata(ucfirst(metadata('simple_pages_page', 'slug')),"Description");?>
<?php if($text):?>
  <div class="jumbotron jumbotron-paars">
    <div class='container' role="main" tabindex="-1">
      <section class="jumbo-section">
        <div class="row">
          <div class="col-lg-12">
            <section class="dienst-section <?php echo $dienst["kleur"];?>">
            <div class="row">
              <div class="co-slogan col-lg-3">
                <?php if($dienst["logo"]!=""):?>
                  <div class="slogan-logo">
                    <img class="dienst-logo" src="<?php echo img($dienst["logo"]);?>">
                  </div>
                <?php endif;?>
              </div>
              <div class="co-slogan col-lg-9">
                <div class="slogan slogan-dienst">
                  <p><span><?php echo $text; ?></span></p>
                </div>
              </div>
            </div>
            </section>
          </div>
        </div>
      </section>
    </div>
  </div>
<?php endif;?>
<div class="content-wrapper simple-page-section ">
  <div class="container simple-page-container">
    <!-- Content -->
    <?php if(!$text):?>
    <div class="row">
        <div class="col-md-12 col-sm-12 page">
            <div class='row breadcrumbs'>
              <div class="col-sm-12 col-xs-12">
                <p id="simple-pages-breadcrumbs"><span><?php echo simple_pages_display_breadcrumbs(); ?></span></p>
              </div>
            </div>
            <div class='row top'>
              <div class="col-sm-12 col-xs-12">
                  <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
              </div>
            </div>
        </div>
    </div>
    <?php endif;?>
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class='row content'>
              <div class="col-sm-12 col-xs-12">
                <?php
                    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
                    echo $this->shortcodes($text);
                ?>
              </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 side">
          <?php echo simple_nav();?>

          <?php if($dienst["naam"]):?>
            <?php if($dienst["naam"] == "LIBISnet"):?>
            <div class="row">
              <div class="co col-md-12">
                <h2>Zoeken in Limo</h2>
                <iframe id="limo_search_widget" marginheight="0" marginwidth="0" scrolling="no" src="https://services.libis.be/query/limo_widget/widget.html#host=limo.libis.be&amp;tab=all_content_tab&amp;search_scope
    =ALL_CONTENT&amp;vid=KULeuven_UX&amp;lang=en_US&amp;offset=0" width="100%" height="50" frameborder="0"></iframe>
              </div>
            </div>
            <?php endif;?>
            <?php if($dienst["naam"] == "LIBISplus"):?>
            <div class="row">
              <div class="co col-md-12">
                <h2>Zoeken in Lirias</h2>
                <div class="lirias">
                <iframe scrolling="no" allowtransparency="" src="https://services.libis.be/query/search_widget/lirias.html#institution=ASSOC" style="width: 340px; height: 60px" frameborder="0"></iframe>
                </div>
              </div>
            </div>
            <?php endif;?>
            <?php if($dienst["naam"] == "Lias"):?>
            <div class="row">
              <div class="co col-md-12 lias-zoek">
          			<h2>Zoeken in Lias</h2>
          			<form method="GET" action="http://abs.lias.be/Query/parametersuche.aspx">
          				<input name="Volltext" class="search-field-box" onclick="this.value='';" value="Zoeken in archieven" alt="Zoeken in archieven" title="Zoeken in archieven" type="text">
          				<input class="button" value="Zoek" type="submit">
          			</form>
          			<form method="GET" action="http://aleph08.libis.kuleuven.be:8881/R/">
          				<input name="request1" class="search-field-box" onclick="this.value='';" value="Zoeken in e-depot" alt="Zoeken in e-depot" title="Zoeken in e-depot" type="text">
          				<input name="func" value="search-advanced-go" type="hidden">
          				<input name="find_code1" value="WAZ" type="hidden">
          				<input class="button" value="Zoek" type="submit">
          			</form>
                <div class="lias-meer">
          			     <a href="http://abs.lias.be/Query/feldsuche.aspx">Uitgebreid zoeken</a> | <a href="/zoeken-in-lias">Handleiding</a>
          			     <br><a href="http://abs.lias.be/Query/archivplansuche.aspx">Blader door archieven</a>
                </div>
              </div>
            </div>
            <?php endif;?>
            <div class="row">
              <?php $usecases = get_dienst_usecases(ucfirst(metadata('simple_pages_page', 'slug')));?>
              <?php if($usecases):?>
                <?php foreach($usecases as $usecase):?>
                  <div class="co col-md-12">
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
          <?php endif;?>
        </div>
    </div>
  </div>
</div>

<?php echo foot(); ?>
