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
<div class="content-wrapper simple-page-section ">
  <div class="container simple-page-container">
    <!-- Content -->
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
        </div>
    </div>
  </div>
</div>

<?php echo foot(); ?>
