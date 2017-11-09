<section class="content-header">
  <h1>
    Menu
    <small><?= __('Add') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
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
            echo $this->Form->input('name');
            echo $this->Form->input('lft');
            echo $this->Form->input('rght');
            echo $this->Form->input('parent_id', ['options' => $parentMenus,'empty' =>true]);
            echo $this->Form->input('has_child');
            echo $this->Form->input('display');
            echo $this->Form->input('menu_order');
            echo $this->Form->input('controller');
            echo $this->Form->input('action');
            echo $this->Form->input('url');
            echo $this->Form->input('class');
            echo $this->Form->input('tag');
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

