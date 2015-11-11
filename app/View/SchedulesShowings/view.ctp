
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Schedules Showing'), array('action' => 'edit', $schedulesShowing['SchedulesShowing']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Schedules Showing'), array('action' => 'delete', $schedulesShowing['SchedulesShowing']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $schedulesShowing['SchedulesShowing']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Schedules Showings'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Schedules Showing'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Showings'), array('controller' => 'showings', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Showing'), array('controller' => 'showings', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="schedulesShowings view">

			<h2><?php  echo __('Schedules Showing'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($schedulesShowing['SchedulesShowing']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Schedule'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($schedulesShowing['Schedule']['time'], array('controller' => 'schedules', 'action' => 'view', $schedulesShowing['Schedule']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Showing'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($schedulesShowing['Showing']['date'], array('controller' => 'showings', 'action' => 'view', $schedulesShowing['Showing']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
