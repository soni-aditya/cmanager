<?php //echo $menu_id; ?>

<section class="content-header">
    <h1>
        Associating Type to the Menu
        <small><?= __('Add') ?></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= __('Form') ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?= $this->Form->create($menu, array('role' => 'form')) ?>
                <div class="box-body">
                    <?php
                       echo $this->Form->input('types._ids', ['options' => $types]);
                    ?>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <?= $this->Form->button(__('Save')) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>


