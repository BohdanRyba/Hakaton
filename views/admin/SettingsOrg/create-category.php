<?php
sleep(1);
?>
<div class="resize-remove">
  <div class="box-header with-border">
    <h2 class="box-title">Страница в разработке...</h2>
    <?php foreach ($dance_programs_list as $value): ?>

    <h3><?php echo $value['dance_group_name']; ?></h3>

    <?php endforeach; ?>
    <div class="box-tools pull-right click-remove">
      <a class="btn btn-box-tool remove-part"><i class="fa fa-times"></i></a>
    </div>
  </div>
  <!-- /.box-header -->
  