<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>
<?php $type = metadata('item','item_type_name');?>

<div class="content-wrapper simple-page-section ">
  <div class="container simple-page-container page">
    <!-- Content -->
    <p id="simple-pages-breadcrumbs">
      <span><a href="<?php echo url('/');?>">Home</a></span>
      <?php if(metadata($item,'item_type_name') == 'Project'):?>
         / <span><a href="<?php echo url('projecten');?>">Projecten</a></span>
      <?php elseif(metadata($item,'item_type_name') == 'News'):?>
         / <span><a href="<?php echo url('nieuws');?>">Nieuws</a></span>
      <?php endif;?>
       / <?php echo metadata('item', array('Dublin Core', 'Title')); ?>
    </p>
    <div class='top'>
        <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class='content'>
                <?php if($date = metadata('item', array("Dublin Core", "Date"))):?>
                  <p class="date">
                    <?php echo $date;?>
                  </p>
                <?php endif;?>
                <?php echo metadata('item', array('Dublin Core', 'Description')); ?>
            </div>
            <div class="gallery">
            <?php
              $files = get_current_record('item')->getFiles();
              $cover = array_shift($files);
              if(sizeof($files)>1):
                foreach($files as $file):
            ?>
                  <div>
                      <img src="<?php echo $file->getWebPath('thumbnail');?>" />
                  </div>
                <?php
                endforeach;
              endif;
              ?>
            </div>
        </div>
        <?php if (metadata('item', 'has files')):?>
        <div class="col-md-4 col-sm-12 side">
          <?php
            $files = get_current_record('item')->getFiles();
            $i = 0;
            $rights = metadata('item', array('Dublin Core', 'Rights'),array('all' => true));
            foreach($files as $file):?>
              <div id="itemfiles" class="element" style="margin-bottom:1rem;">
                  <img src="<?php echo $file->getWebPath('thumbnail');?>" />

              <?php
                if(isset($rights[$i])):
                  echo "<small><em>".$rights[$i]."</em></small>";
                endif;
              ?>
              </div>
              <?php $i++;?>
            <?php
            endforeach;
          ?>
        </div>
        <?php endif;?>
    </div>
  </div>
</div>
<script>
jQuery(document).ready(function(){
  jQuery('.gallery').slick({
    dots: false,
    infinite: true,
     arrows: true,
    centerMode: true,
    variableWidth: true,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
});
</script>
<?php echo foot(); ?>
