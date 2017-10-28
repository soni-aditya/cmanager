<section class="content-header">
  <h1>
    <?php echo __('Team'); ?>
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
                                                                                                        <dt><?= __('Leader') ?></dt>
                                <dd>
                                    <?= $team->has('leader') ? $team->leader->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Project') ?></dt>
                                <dd>
                                    <?= $team->has('project') ? $team->project->title : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Short Description') ?></dt>
                                        <dd>
                                            <?= h($team->short_description) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('User Id') ?></dt>
                                <dd>
                                    <?= $this->Number->format($team->user_id) ?>
                                </dd>
                                                                                                                <dt><?= __('Created By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($team->created_by) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($team->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Users']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($team->users)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Type Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Username
                                    </th>
                                        
                                                                    
                                    <th>
                                    Password
                                    </th>
                                        
                                                                    
                                    <th>
                                    First Name
                                    </th>
                                        
                                                                    
                                    <th>
                                    Last Name
                                    </th>
                                        
                                                                    
                                    <th>
                                    Registeraton Number
                                    </th>
                                        
                                                                    
                                    <th>
                                    Contact
                                    </th>
                                        
                                                                    
                                    <th>
                                    Address
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

                            <?php foreach ($team->users as $users): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($users->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->type_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->username) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->password) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->first_name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->last_name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->registeraton_number) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->contact) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->address) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($users->created_by) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
