
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
                            <div class="dropdown">
                            <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Schedule'); ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li class="list-group-item"><?php echo $this->Html->link(__('List Schedules'), array('action' => 'index')); ?></li>
                                </ul></div> 
                            <div class="dropdown">
                            <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Showing'); ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li class="list-group-item"><?php echo $this->Html->link(__('List Showings'), array('controller' => 'showings', 'action' => 'index')); ?> </li>
                                <?php if ($this->Session->check('Auth.User')) { ?>	
                            
                                <li class="list-group-item"><?php echo $this->Html->link(__('New Showing'), array('controller' => 'showings', 'action' => 'add')); ?> </li>
			<?php } ?>
                                </ul></div> 
                        </ul><!-- /.list-group -->
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Add Schedule'); ?></h2>

		<div class="schedules form">
		
			<?php echo $this->Form->create('Schedule', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('time', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('holiday', array('class' => 'checkbox')); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->