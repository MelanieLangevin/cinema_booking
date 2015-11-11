<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">	
                            <div class="dropdown">
                                <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Cinema'); ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
<?php if ($this->Session->check('Auth.User')) { ?>
<li class="list-group-item"><?php echo $this->Html->link(__('New Cinema'), array('action' => 'add'), array('class' => '')); ?> </li>
<?php }?>
                                    <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.id') == $cinema['Cinema']['user_id'] ) { ?>						
                                        <li class="list-group-item"><?php echo $this->Html->link(__('Edit Cinema'), array('action' => 'edit', $cinema['Cinema']['id']), array('class' => '')); ?> </li>
                                        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Cinema'), array('action' => 'delete', $cinema['Cinema']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $cinema['Cinema']['id'])); ?> </li>
                                    <?php } ?> 
                                        <li class="list-group-item"><?php echo $this->Html->link(__('List Cinemas'), array('action' => 'index'), array('class' => '')); ?> </li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('User'); ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
                                    <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
                                    <?php if ($this->Session->read('Auth.User.role') == "admin" && $this->Session->read('Auth.User.active') == 1) { ?>		
                                        <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>
                                    <?php } ?>                                
                                </ul>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Showing'); ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
                                    <li class="list-group-item"><?php echo $this->Html->link(__('List Showings'), array('controller' => 'showings', 'action' => 'index'), array('class' => '')); ?> </li>
                                    <?php if ($this->Session->read('Auth.User.active') == "1" || $this->Session->read('Auth.User.role') == "admin") { ?>		
                                        <li class="list-group-item"><?php echo $this->Html->link(__('New Showing'), array('controller' => 'showings', 'action' => 'add'), array('class' => '')); ?> </li>
                                    <?php } ?>                                
                                </ul>
                            </div>
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="cinemas view">

			<h2><?php  echo __('Cinema'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($cinema['Cinema']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Society'); ?></strong></td>
		<td>
			<?php echo h($cinema['Cinema']['society']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Adress'); ?></strong></td>
		<td>
			<?php echo h($cinema['Cinema']['adress']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Phone'); ?></strong></td>
		<td>
			<?php echo h($cinema['Cinema']['phone']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($cinema['User']['username'], array('controller' => 'users', 'action' => 'view', $cinema['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Showings'); ?></h3>
				
				<?php if (!empty($cinema['Showing'])): ?>
					
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
										foreach ($cinema['Showing'] as $showing): ?>
		<tr>
			<td><?php echo $showing['date']; ?></td>
			<td><?php echo $showing['prix']; ?></td>
			<td><?php echo $showing['Movie']['titre']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'showings', 'action' => 'view', $showing['id']), array('class' => 'btn btn-default btn-xs')); ?>
 <?php if ($this->Session->read('Auth.User.active') == "1" || $this->Session->read('Auth.User.role') == "admin") { ?>				
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
 <?php if ($this->Session->read('Auth.User.active') == "1" || $this->Session->read('Auth.User.role') == "admin") { ?>
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Showing'), array('controller' => 'showings', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				<?php } ?>
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid --> 
