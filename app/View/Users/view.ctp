
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">	
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('User'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $user['User']['id']) { ?>
                            <li class="list-group-item"><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id']), array('class' => '')); ?> </li>		
                            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
                            <?php if ($this->Session->read('Auth.User.role') == "admin") { ?>
                                <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => '')); ?> </li>
                            <?php } ?> 
                        <?php } ?> 		
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => '')); ?> </li>

                    </ul></div> 
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Cinema'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <li class="list-group-item"><?php echo $this->Html->link(__('List Cinemas'), array('controller' => 'cinemas', 'action' => 'index'), array('class' => '')); ?> </li>
                        <?php if ($this->Session->check('Auth.User')) { ?>		
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Cinema'), array('controller' => 'cinemas', 'action' => 'add'), array('class' => '')); ?> </li>
                        <?php } ?>                                 
                    </ul></div>	
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="users view">

            <h2><?php echo __('User'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>

                    </tr><tr>		<td><strong><?php echo __('Username'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['username']); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('E-mail'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['email']); ?>
                        &nbsp;
                    </td>
                </tr>
                <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $user['User']['id']) { ?>
                    <tr>		<td><strong><?php echo __('Active'); ?></strong></td>
                        <?php if ($user['User']['isConfirmed'] == 1) {?>
                            <td><?php echo __('Is active'); ?>&nbsp;</td>

                        <?php } else { ?>
                            <td><?php echo __('<font color="red">Not active</font>'); ?>&nbsp;</td>
                        <?php } ?>  
                    </tr>
                <?php } ?> 
                <tr>		<td><strong><?php echo __('Role'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['role']); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                    <td>
                        <?php $created = $user['User']['created'];
                                    echo h(is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created)); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                    <td>
                        <?php $modified = $user['User']['modified'];
                                    echo h(is_numeric($modified) ? date("Y-m-d H:i:s", $modified) : h($modified)); ?>
                        &nbsp;
                    </td>
                </tr>					</tbody>
        </table><!-- /.table table-striped table-bordered -->
    </div><!-- /.table-responsive -->

</div><!-- /.view -->


<div class="related">

    <h3><?php echo __('Related Cinemas'); ?></h3>

    <?php if (!empty($user['Cinema'])): ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><?php echo __('Name'); ?></th>
                        <th><?php echo __('Society'); ?></th>
                        <th><?php echo __('Adress'); ?></th>
                        <th><?php echo __('Phone'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($user['Cinema'] as $cinema):
                        ?>
                        <tr>
                            <td><?php echo $cinema['name']; ?></td>
                            <td><?php echo $cinema['society']; ?></td>
                            <td><?php echo $cinema['adress']; ?></td>
                            <td><?php echo $cinema['phone']; ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('View'), array('controller' => 'cinemas', 'action' => 'view', $cinema['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $user['User']['id']) { ?>				
                                    <?php echo $this->Html->link(__('Edit'), array('controller' => 'cinemas', 'action' => 'edit', $cinema['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cinemas', 'action' => 'delete', $cinema['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $cinema['id'])); ?>
                                <?php } ?> 			
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table><!-- /.table table-striped table-bordered -->
        </div><!-- /.table-responsive -->

    <?php endif; ?>


    <div class="actions">
        <?php if ($this->Session->check('Auth.User')) { ?>
        <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Cinema'), array('controller' => 'cinemas', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
        <?php }?>
</div><!-- /.related -->


</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
