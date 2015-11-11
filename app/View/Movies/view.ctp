
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">	
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Movie'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
<?php if ( $this->Session->read('Auth.User.active') == "1" || $this->Session->read('Auth.User.role') == "admin") { ?>		
                            <li class="list-group-item"><?php echo $this->Html->link(__('Edit Movie'), array('action' => 'edit', $movie['Movie']['id']), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Movie'), array('action' => 'delete', $movie['Movie']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $movie['Movie']['id'])); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Movie'), array('action' => 'add'), array('class' => '')); ?> </li>
                        <?php } ?>  		
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Movies'), array('action' => 'index'), array('class' => '')); ?> </li>		
                    </ul>
                </div>
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Category'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index'), array('class' => '')); ?> </li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin") { ?>		
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Categories'), array('controller' => 'categories', 'action' => 'add'), array('class' => '')); ?> </li>
                        <?php } ?>                                  
                    </ul>
                </div> 
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Rating'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Ratings'), array('controller' => 'categories', 'action' => 'index'), array('class' => '')); ?></li>                                  
                    </ul>
                </div>
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Showing'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Showings'), array('controller' => 'showings', 'action' => 'index'), array('class' => '')); ?> </li>
<?php if ($this->Session->read('Auth.User.active') == "1" || $this->Session->read('Auth.User.role') == "admin") { ?>		
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Showing'), array('controller' => 'showings', 'action' => 'add'), array('class' => '')); ?> </li>
                        <?php } ?>                                 
                    </ul></div>	
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="movies view">

            <h2><?php echo __('Movie'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>

                        </tr><tr>		<td><strong><?php echo __('Title'); ?></strong></td>
                            <td>
                                <?php echo h($movie['Movie']['titre']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Year'); ?></strong></td>
                            <td>
                                <?php echo h($movie['Movie']['annee']); ?>
                                &nbsp;
                            </td>
                            </tr><tr>		<td><strong><?php echo __('Studio'); ?></strong></td>
                            <td>
                                <?php echo h($movie['Movie']['studio']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Summary'); ?></strong></td>
                            <td>
                                <?php echo h($movie['Movie']['resume']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Poster'); ?></strong></td>
                            <td>
                                <?php if ($movie['Movie']['poster']) echo $this->Html->image($movie['Movie']['poster'], array('escape' => false)); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Category'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($movie['Category']['nom'], array('controller' => 'categories', 'action' => 'view', $movie['Category']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Rating'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($movie['Rating']['name'], array('controller' => 'ratings', 'action' => 'view', $movie['Rating']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Showings'); ?></h3>

            <?php if (!empty($movie['Showing'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Date'); ?></th>
                                <th><?php echo __('Price'); ?></th>
                                <th><?php echo __('Movie'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($movie['Showing'] as $showing):
                                ?>
                                <tr>
                                    <td><?php echo $showing['date']; ?></td>
                                    <td><?php echo $showing['prix']; ?></td>
                                    <td><?php echo $showing['Movie']['titre']; ?></td>
                                    <td class="actions">
<?php echo $this->Html->link(__('View'), array('controller' => 'showings', 'action' => 'view', $showing['id']), array('class' => 'btn btn-default btn-xs')); ?>
<?php if ( $this->Session->read('Auth.User.active') == "1" || $this->Session->read('Auth.User.role') == "admin") { ?>		

                                        
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
<?php if ( $this->Session->read('Auth.User.active') == "1" || $this->Session->read('Auth.User.role') == "admin") { ?>		

                <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Showing'), array('controller' => 'showings', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
<?php } ?>
        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
