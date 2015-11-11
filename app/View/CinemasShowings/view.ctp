
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Cinemas Showing'), array('action' => 'edit', $cinemasShowing['CinemasShowing']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Cinemas Showing'), array('action' => 'delete', $cinemasShowing['CinemasShowing']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $cinemasShowing['CinemasShowing']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Cinemas Showings'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Cinemas Showing'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Cinemas'), array('controller' => 'cinemas', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Cinema'), array('controller' => 'cinemas', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Showings'), array('controller' => 'showings', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Showing'), array('controller' => 'showings', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="cinemasShowings view">

			<h2><?php  echo __('Cinemas Showing'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($cinemasShowing['CinemasShowing']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cinema'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($cinemasShowing['Cinema']['name'], array('controller' => 'cinemas', 'action' => 'view', $cinemasShowing['Cinema']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Showing'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($cinemasShowing['Showing']['id'], array('controller' => 'showings', 'action' => 'view', $cinemasShowing['Showing']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
