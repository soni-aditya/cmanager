<section class="content-header">
  <h1>
    <?php echo __('Project'); ?>
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
                                                                                                                <dt><?= __('Title') ?></dt>
                                        <dd>
                                            <?= h($project->title) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Created By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($project->created_by) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($project->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                                                                                                                
                                            
                                                                        <dt><?= __('Description') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($project->description)); ?>
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

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Teams']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($project->teams)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Leader Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Project Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Short Description
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Created By
                                    </th>
                                        
                                                                    
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($project->teams as $teams): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($teams->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($teams->leader_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($teams->project_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($teams->short_description) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($teams->created_by) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($teams->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Teams', 'action' => 'view', $teams->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Teams', 'action' => 'edit', $teams->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Teams', 'action' => 'delete', $teams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teams->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
