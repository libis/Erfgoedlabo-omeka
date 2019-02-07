<div class="item record">
  <div class="row">
    <?php if (metadata($item, 'has files')):?>
      <div class="col-md-4 col-sm-12 side">
        <div id="itemfiles" class="element">
            <div class="element-text">
              <?php    echo link_to_item(
                      item_image(null, array(), 0, $item),
                      array('class' => 'image'), 'show', $item
                  );
              ?>
            </div>
        </div>
      </div>
    <?php endif;?>
    <div class="col-md-8 col-sm-12">
      <div class='content'>
        <?php
        $title = metadata($item, 'display_title');
        $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
        ?>
        <h3><?php echo link_to($item, 'show', $title); ?></h3>

        <?php if ($description): ?>
            <p class="item-description"><?php echo $description; ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
