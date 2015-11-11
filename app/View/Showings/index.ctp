
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <div class="dropdown">
<?php if (($this->Session->check('Auth.User') && $this->Session->read('Auth.User.active') == "1") || $this->Session->read('Auth.User.role') == "admin") { ?>		
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Showing'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <li class="list-group-item"><?php echo $this->Html->link(__('New Showing'), array('action' => 'add'), array('class' => '')); ?></li>

                    </ul><?php } ?> </div> 
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Movie'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Movies'), array('controller' => 'movies', 'action' => 'index'), array('class' => '')); ?></li> 
<?php if (($this->Session->check('Auth.User') && $this->Session->read('Auth.User.active') == "1") || $this->Session->read('Auth.User.role') == "admin") { ?>		
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Movie'), array('controller' => 'movies', 'action' => 'add'), array('class' => '')); ?></li> 
                        <?php } ?>                                 
                    </ul></div>
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Schedule'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Schedule'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin") { ?>		
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
                        <?php } ?>                                 
                    </ul>
                </div>
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

        <div class="showings index">

            <h2><?php echo __('Showings'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort(__('date')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('Schedule')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('price')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('movie_id')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('Cinema')); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($showings as $showing): ?>
                            <tr>
                                <td><?php echo h($showing['Showing']['date']); ?>&nbsp;</td>
                                <td><?php
                                    foreach ($showing['Schedule'] as $schedule) {
                                        //echo h($cinema['name']) . '<br/>'; 
                                        echo $this->Html->link($schedule['time'], array('controller' => 'schedules', 'action' => 'view', $schedule['id']));
                                        echo '<br/>';
                                    }
                                    ?></td>
                                <td><?php echo h($showing['Showing']['prix']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link($showing['Movie']['titre'], array('controller' => 'movies', 'action' => 'view', $showing['Movie']['id'])); ?>

                                </td>
                                <td><?php
                                    foreach ($showing['Cinema'] as $cinema) {
                                        //echo h($cinema['name']) . '<br/>'; 
                                        echo $this->Html->link($cinema['name'], array('controller' => 'cinemas', 'action' => 'view', $cinema['id']));
                                        echo '<br/>';
                                    }
                                    ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $showing['Showing']['id']), array('class' => 'btn btn-default btn-xs')); ?>
<?php if (($this->Session->check('Auth.User') && $this->Session->read('Auth.User.active') == "1") || $this->Session->read('Auth.User.role') == "admin") { ?>		
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $showing['Showing']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $showing['Showing']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $showing['Showing']['id'])); ?>
                                    </td>
                                <?php } ?>
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