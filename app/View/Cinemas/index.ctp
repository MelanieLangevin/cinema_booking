<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <div class="dropdown">
                    <?php if ($this->Session->check('Auth.User')) { ?>
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Cinema'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Cinema'), array('action' => 'add'), array('class' => '')); ?></li>
                    </ul>
                        <?php } ?>
                </div> 
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('User'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
                        <?php if ($this->Session->read('Auth.User.role') == "admin" && $this->Session->read('Auth.User.active') == 1) { ?>				
                        <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
                        <?php } ?>                                
                    </ul></div> 
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Showing'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu"><li class="list-group-item"><?php echo $this->Html->link(__('List Showings'), array('controller' => 'showings', 'action' => 'index'), array('class' => '')); ?></li> 
                        <?php if ( $this->Session->read('Auth.User.active') == "1" || $this->Session->read('Auth.User.role') == "admin") { ?>				
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Showing'), array('controller' => 'showings', 'action' => 'add'), array('class' => '')); ?></li> 
                        <?php } ?>                                
                    </ul></div>
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="cinemas index">

            <h2><?php echo __('Cinemas'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort(__('name')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('society')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('adress')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('phone')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('user_id')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('Showing')); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cinemas as $cinema): ?>
                        <tr>
                            <td><?php echo h($cinema['Cinema']['name']); ?>&nbsp;</td>
                            <td><?php echo h($cinema['Cinema']['society']); ?>&nbsp;</td>
                            <td><?php echo h($cinema['Cinema']['adress']); ?>&nbsp;</td>
                            <td><?php echo h($cinema['Cinema']['phone']); ?>&nbsp;</td>
                            <td>
                                    <?php echo $this->Html->link($cinema['User']['username'], array('controller' => 'users', 'action' => 'view', $cinema['User']['id'])); ?>
                            </td>

                            <td><?php
                                    foreach ($cinema['Showing'] as $showing) {
                                        echo $this->Html->link($showing['date'], array('controller' => 'showings', 'action' => 'view', $showing['id']));
                                        echo '<br/>';
                                    }
                                    ?></td>
                            <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $cinema['Cinema']['id']), array('class' => 'btn btn-default btn-xs')); ?>

                                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $cinema['Cinema']['user_id']) { ?>
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cinema['Cinema']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cinema['Cinema']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $cinema['Cinema']['id'])); ?>
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
