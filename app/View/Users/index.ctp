
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <div class="dropdown"><?php if ($this->Session->read('Auth.User.role') == "admin") { ?>
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('User'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => '')); ?></li>

                    </ul><?php } ?></div> 
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Cinema'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Cinemas'), array('controller' => 'cinemas', 'action' => 'index'), array('class' => '')); ?></li> 
                        <?php if ($this->Session->check('Auth.User')) { ?>				
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Cinema'), array('controller' => 'cinemas', 'action' => 'add'), array('class' => '')); ?></li> 
                        <?php } ?>                                  
                    </ul></div>
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="users index">

            <h2><?php echo __('Users'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort(__('username')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('e-mail')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('Active')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('role')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('created')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('modified')); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                                <?php
                                if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $user['User']['id']) {
                                    if ($user['User']['isConfirmed'] == 1) {
                                        ?>
                                        <td><?php echo __('Is active'); ?>&nbsp;</td>
                                    <?php } else { ?>
                                        <td><?php echo __('<font color="red">Not active</font>'); ?>&nbsp;</td>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <td><?php echo __(' '); ?>&nbsp;</td>
    <?php } ?>

                                <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                                <td><?php
                                    $created = $user['User']['created'];
                                    echo h(is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created));
                                    ?>&nbsp;</td>
                                <td><?php
                                    $modified = $user['User']['modified'];
                                    echo h(is_numeric($modified) ? date("Y-m-d H:i:s", $modified) : h($modified));
                                    ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $user['User']['id']) { ?>
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
    <?php } ?>		
                                </td>

                            </tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->

            <p><small>
                    <?php
                    echo $this->Paginator->counter(array(
                        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                    ));
                    ?>
                </small></p>

            <ul class="pagination">
                <?php
                echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
                echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                ?>
            </ul><!-- /.pagination -->

        </div><!-- /.index -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->