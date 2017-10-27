<section class="content-header">
  <h1>
    <?php echo __('Menu'); ?>
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
                                                                                                                <dt><?= __('Name') ?></dt>
                                        <dd>
                                            <?= h($menu->name) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Parent Menu') ?></dt>
                                <dd>
                                    <?= $menu->has('parent_menu') ? $menu->parent_menu->name : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Controller') ?></dt>
                                        <dd>
                                            <?= h($menu->controller) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Action') ?></dt>
                                        <dd>
                                            <?= h($menu->action) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Class') ?></dt>
                                        <dd>
                                            <?= h($menu->class) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Tag') ?></dt>
                                        <dd>
                                            <?= h($menu->tag) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Lft') ?></dt>
                                <dd>
                                    <?= $this->Number->format($menu->lft) ?>
                                </dd>
                                                                                                                <dt><?= __('Rght') ?></dt>
                                <dd>
                                    <?= $this->Number->format($menu->rght) ?>
                                </dd>
                                                                                                                <dt><?= __('Menu Order') ?></dt>
                                <dd>
                                    <?= $this->Number->format($menu->menu_order) ?>
                                </dd>
                                                                                                                <dt><?= __('Created By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($menu->created_by) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($menu->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                                                                                                                
                                                                        <dt><?= __('Has Child') ?></dt>
                            <dd>
                            <?= $menu->has_child ? __('Yes') : __('No'); ?>
                            </dd>
                                                    <dt><?= __('Display') ?></dt>
                            <dd>
                            <?= $menu->display ? __('Yes') : __('No'); ?>
                            </dd>
                                                                    
                                                                        <dt><?= __('Url') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($menu->url)); ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Menus']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($menu->child_menus)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Name
                                    </th>
                                        
                                                                    
                                    <th>
                                    Lft
                                    </th>
                                        
                                                                    
                                    <th>
                                    Rght
                                    </th>
                                        
                                                                    
                                    <th>
                                    Parent Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Has Child
                                    </th>
                                        
                                                                    
                                    <th>
                                    Display
                                    </th>
                                        
                                                                    
                                    <th>
                                    Menu Order
                                    </th>
                                        
                                                                    
                                    <th>
                                    Controller
                                    </th>
                                        
                                                                    
                                    <th>
                                    Action
                                    </th>
                                        
                                                                    
                                    <th>
                                    Url
                                    </th>
                                        
                                                                    
                                    <th>
                                    Class
                                    </th>
                                        
                                                                    
                                    <th>
                                    Tag
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

                            <?php foreach ($menu->child_menus as $childMenus): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($childMenus->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->lft) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->rght) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->parent_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->has_child) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->display) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->menu_order) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->controller) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->action) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->url) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->class) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->tag) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($childMenus->created_by) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($childMenus->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Menus', 'action' => 'view', $childMenus->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Menus', 'action' => 'edit', $childMenus->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Menus', 'action' => 'delete', $childMenus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childMenus->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Types']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($menu->types)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Name
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

                            <?php foreach ($menu->types as $types): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($types->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($types->name) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($types->created_by) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($types->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Types', 'action' => 'view', $types->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Types', 'action' => 'edit', $types->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Types', 'action' => 'delete', $types->id], ['confirm' => __('Are you sure you want to delete # {0}?', $types->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
