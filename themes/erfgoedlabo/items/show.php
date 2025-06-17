<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>
<?php $type = metadata('item','item_type_name');?>

<div class="content-wrapper simple-page-section ">
  <div class="container simple-page-container page">
    <!-- Content -->
    <p id="simple-pages-breadcrumbs">
      <span><a href="<?php echo url('/');?>">Home</a></span>
       / <span><a href="<?php echo url('projecten');?>">Projecten</a></span>
       / <?php echo metadata('item', array('Dublin Core', 'Title')); ?>
    </p>
    <div class='top'>
        <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class='content'>
                <?php echo metadata('item', array('Dublin Core', 'Description')); ?>
            </div>
        </div>
        <?php if (metadata('item', 'has files')):?>
        <div class="col-md-4 col-sm-12 side">
          <div id="itemfiles" class="element">
              <div class="element-text"><?php echo item_image_gallery(array('linkWrapper' => array('wrapper' => null,'class' => 'col-xs-12 image')),'thumbnail'); ?></div>
          </div>
          <?php
            if(metadata('item', array('Dublin Core', 'Rights'))):
              echo "<small><em>".metadata('item', array('Dublin Core', 'Rights'))."</em></small>";
            endif;
          ?>
        </div>
        <?php endif;?>
    </div>
  </div>
</div>

<script> 
jQuery(document).ready(function () {
    jQuery('.content').each(function () {
        const $iframe = jQuery(this).find('iframe');

        if ($iframe.length) {
            const src = $iframe.attr('src') || '';

            // Controleer op bekende videodiensten
            const isVideo = /youtube\.com|vimeo\.com|dailymotion\.com|wistia\.com|player\.twitch\.tv/.test(src);

            if (isVideo) {
                $iframe.removeAttr('style').css({
                    width: '100%',
                    height: '100%',
                    display: 'block'
                });
            }
        }
    });
});
</script>

<?php echo foot(); ?>
