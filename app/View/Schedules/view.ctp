
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">	
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Schedule'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php if ($this->Session->read('Auth.User.role') == "admin") { ?>
                            <li class="list-group-item"><?php echo $this->Html->link(__('Edit Schedule'), array('action' => 'edit', $schedule['Schedule']['id']), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Schedule'), array('action' => 'delete', $schedule['Schedule']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $schedule['Schedule']['id'])); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Schedule'), array('action' => 'add'), array('class' => '')); ?> </li>
                        <?php } ?>
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Schedules'), array('action' => 'index'), array('class' => '')); ?> </li>
                    </ul></div>
                <div class="dropdown">       
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Showing'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Showings'), array('controller' => 'showings', 'action' => 'index')); ?> </li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.active') == 1) { ?>	

                            <li class="list-group-item"><?php echo $this->Html->link(__('New Showing'), array('controller' => 'showings', 'action' => 'add')); ?> </li>
                        <?php } ?>
                    </ul></div>		
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="schedules view">

            <h2><?php echo __('Schedule'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Time'); ?></strong></td>
                            <td>
                                <?php echo h($schedule['Schedule']['time']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Showings'); ?></h3>

            <?php if (!empty($schedule['Showing'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Date'); ?></th>
                                <th><?php echo __('Prix'); ?></th>
                                <th><?php echo __('Movie'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($schedule['Showing'] as $showing):
                                ?>
                                <tr>
                                    <td><?php echo $showing['date']; ?></td>
                                    <td><?php echo $showing['prix']; ?></td>
                                    <td><?php echo $showing['Movie']['titre']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'showings', 'action' => 'view', $showing['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.active') == 1) { ?>				
                                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'showings', 'action' => 'edit', $showing['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'showings', 'action' => 'delete', $showing['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $showing['id'])); ?>
                                        <?php } ?>			
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

            <?php endif; ?>


            <div class="actions">
                <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.active') == 1) { ?>
                    <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Showing'), array('controller' => 'showings', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
            <?php } ?>
        </div>
    </div><!-- /.related -->


</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
