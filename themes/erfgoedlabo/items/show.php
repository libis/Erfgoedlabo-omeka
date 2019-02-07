<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>
<?php $type = metadata('item','item_type_name');?>

<div class="content-wrapper simple-page-section ">
  <div class="container simple-page-container">
    <!-- Content -->
    <div class="row">
        <div class="col-md-12 col-sm-12 page">
            <div class='row breadcrumbs'>
              <div class="col-sm-12 col-xs-12">
                <p id="simple-pages-breadcrumbs">
                  <span><a href="<?php echo url('/');?>">Home</a></span>
                   > <span><a href="<?php echo $type;?>"><?php echo $type;?></a></span>
                   > <?php echo metadata('item', array('Dublin Core', 'Title')); ?>
                 </p>
              </div>
            </div>
            <div class='row top'>
              <div class="col-sm-12 col-xs-12">
                  <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
              </div>
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
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
  </div>
</div>


<?php echo foot(); ?>
