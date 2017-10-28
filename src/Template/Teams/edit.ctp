<section class="content-header">
  <h1>
    Team
    <small><?= __('Edit') ?></small>
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
        <?= $this->Form->create($team, array('role' => 'form')) ?>
          <div class="box-body">
          <?php

          //preparing leader options
          $leaderOptions=[];
          foreach ($leaders as $leader){
              $leaderOptions[$leader->id]=$leader->first_name.' '.$leader->last_name;
          }
          //preparing user options
          $userOptions=[];
          foreach ($users as $user){
              $userOptions[$user->id]=$user->first_name.' '.$user->last_name;
          }

          //          die();
          echo $this->Form->input('leader_id', ['options' => $leaderOptions]);
            echo $this->Form->input('project_id', ['options' => $projects]);
            echo $this->Form->input('user_id',['options'=>$userOptions]);
            echo $this->Form->input('short_description');
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

