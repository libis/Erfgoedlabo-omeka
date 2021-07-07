<div class="item record">
  <div class="row">
    <?php if (metadata($item, 'has files')):?>
      <div class="col-md-4 col-sm-12 side">
        <div id="itemfiles" class="element">
            <div class="element-text">
              <?php    echo link_to_item(
                      item_image('thumbnail', array(), 0, $item),
                      array('class' => 'image'), 'show', $item
                  );
              ?>
            </div>
        </div>
      </div>
    <?php else:?>
      <div class="col-md-4 col-sm-12 side">
        <div id="itemfiles" style="background:#f0f8f4;min-height:135px;width:100%;">

        </div>
      </div>
    <?php endif;?>

    <div class="col-md-8 col-sm-12">
      <div class='content'>
        <?php
        $title = metadata($item, array('Dublin Core', 'Title'));
        $description = metadata($item, array('Dublin Core', 'Subject'));
        $date = metadata($item, array('Dublin Core', 'Date'));
        ?>
        <h3><?php echo link_to($item, 'show', $title); ?></h3>
        <?php if ($date): ?>
            <p class="item-date"><?php echo $date; ?></p>
        <?php endif; ?>
        <?php if ($description): ?>
            <p class="item-description"><?php echo $description; ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
