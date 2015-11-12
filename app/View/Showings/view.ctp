
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">	 
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Showing'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php if (($this->Session->read('Auth.User.active') == 1) || $this->Session->read('Auth.User.role') == "admin") { ?>		
                            <li class="list-group-item"><?php echo $this->Html->link(__('Edit Showing'), array('action' => 'edit', $showing['Showing']['id']), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Showing'), array('action' => 'delete', $showing['Showing']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $showing['Showing']['id'])); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Showing'), array('action' => 'add'), array('class' => '')); ?> </li>	
                        <?php } ?> 
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Showings'), array('action' => 'index'), array('class' => '')); ?> </li>		                               
                    </ul>
                </div>
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Movie'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Movies'), array('controller' => 'movies', 'action' => 'index'), array('class' => '')); ?> </li>
                        <?php if ($this->Session->read('Auth.User.active') == 1 || $this->Session->read('Auth.User.role') == "admin") { ?>		
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Movie'), array('controller' => 'movies', 'action' => 'add'), array('class' => '')); ?> </li>
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
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Cinemas'), array('controller' => 'cinemas', 'action' => 'index'), array('class' => '')); ?> </li>
                        <?php if ($this->Session->check('Auth.User')) { ?>		
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Cinema'), array('controller' => 'cinemas', 'action' => 'add'), array('class' => '')); ?> </li>
                        <?php } ?>                                
                    </ul>
                </div>	
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="showings view">

            <h2><?php echo __('Showing'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>

                        <tr>		<td><strong><?php echo __('Date'); ?></strong></td>
                            <td>
                                <?php echo h($showing['Showing']['date']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Price'); ?></strong></td>
                            <td>
                                <?php echo h($showing['Showing']['prix']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Movie'); ?></strong></td>
                            <td>
<?php if ($this->Session->read('Auth.User.active') == 1 || $this->Session->read('Auth.User.role') == "admin") { ?>
                                <?php echo $this->Html->link($showing['Movie']['titre'], array('controller' => 'movies', 'action' => 'view', $showing['Movie']['id']), array('class' => '')); ?>
                                &nbsp;
<?php }?>
                            </td>
                        </tr>					
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Cinemas'); ?></h3>

            <?php if (!empty($showing['Cinema'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>

                                <th><?php echo __('Name'); ?></th>
                                <th><?php echo __('Society'); ?></th>  
                                <th><?php echo __('Adress'); ?></th>
                                <th><?php echo __('Phone'); ?></th>
                                <th><?php echo __('User'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($showing['Cinema'] as $cinema):
                                ?>
                                <tr>
                                    <td><?php echo $cinema['name']; ?></td>
                                    <td><?php echo $cinema['society']; ?></td>
                                    <td><?php echo $cinema['adress']; ?></td>
                                    <td><?php echo $cinema['phone']; ?></td>
                                    <td><?php echo $cinema['User']['username'] ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'cinemas', 'action' => 'view', $cinema['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php if ($this->Session->read('Auth.User.id') == $cinema['User']['id'] || $this->Session->read('Auth.User.role') == "admin") { ?>		
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
            <?php } ?>
        </div>
        <div class="related">

            <h3><?php echo __('Related Schedule'); ?></h3>

            <?php if (!empty($showing['Schedule'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>

                                <th><?php echo __('Time'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($showing['Schedule'] as $schedule):
                                ?>
                                <tr>
                                    <td><?php echo $schedule['time']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'schedules', 'action' => 'view', $schedule['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php if ($this->Session->read('Auth.User.role') == "admin") { ?>		


                                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'schedules', 'action' => 'edit', $schedule['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'schedules', 'action' => 'delete', $schedule['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $schedule['id'])); ?>
                                        <?php } ?>			
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

            <?php endif; ?>


            <div class="actions">
                <?php if ($this->Session->read('Auth.User.role') == "admin") { ?>
                    <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Schedule'), array('controller' => 'schedules', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
            <?php } ?>

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
