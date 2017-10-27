<section class="content-header">
  <h1>
    <?php echo __('User'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Back'), ['action' => 'index'], ['escape' => false])?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h3 class="box-title"><?php echo __('Information'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                                                                                                        <dt><?= __('Type') ?></dt>
                                <dd>
                                    <?= $user->has('type') ? $user->type->name : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Username') ?></dt>
                                        <dd>
                                            <?= h($user->username) ?>
                                        </dd>
                                                                                                                                                                                                                                            <dt><?= __('First Name') ?></dt>
                                        <dd>
                                            <?= h($user->first_name) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Last Name') ?></dt>
                                        <dd>
                                            <?= h($user->last_name) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Registeraton Number') ?></dt>
                                <dd>
                                    <?= $this->Number->format($user->registeraton_number) ?>
                                </dd>
                                                                                                                <dt><?= __('Contact') ?></dt>
                                <dd>
                                    <?= $this->Number->format($user->contact) ?>
                                </dd>
                                                                                                                <dt><?= __('Created By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($user->created_by) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($user->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                                                                                                                
                                            
                                                                        <dt><?= __('Address') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($user->address)); ?>
                            </dd>
                                                            </dl>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- div -->

</section>
