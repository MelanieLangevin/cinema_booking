
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group"><?php if ($this->Session->read('Auth.User.role') == "admin") { ?>
                            <div class="dropdown">
                            <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Schedule'); ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
                                    
				<li class="list-group-item"><?php echo $this->Html->link(__('New Schedule'), array('action' => 'add'), array('class' => '')); ?></li>
				 
                                </ul></div><?php } ?>
                            <div class="dropdown">
                                <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Showing'); ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li class="list-group-item"><?php echo $this->Html->link(__('List Showings'), array('controller' => 'showings', 'action' => 'index')); ?> </li>	
                                 <?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.active') == 1) { ?>
                            
                                <li class="list-group-item"><?php echo $this->Html->link(__('New Showing'), array('controller' => 'showings', 'action' => 'add')); ?> </li>
			<?php } ?>
                                </ul></div></ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="schedules index">
		
			<h2><?php echo __('Schedules'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('time'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($schedules as $schedule): ?>
	<tr>
		<td><?php echo h($schedule['Schedule']['time']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $schedule['Schedule']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			 <?php if ($this->Session->read('Auth.User.role') == "admin") { ?>
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $schedule['Schedule']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $schedule['Schedule']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $schedule['Schedule']['id'])); ?>
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