
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
                             <div class="dropdown">
                            <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('User'); ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
				<li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
                                </ul></div> 
                                <div class="dropdown">
                            <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Cinema'); ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
                                <li class="list-group-item"><?php echo $this->Html->link(__('List Cinemas'), array('controller' => 'cinemas', 'action' => 'index')); ?> </li>
<?php if ($this->Session->check('Auth.User')) { ?>
				<li class="list-group-item"><?php echo $this->Html->link(__('New Cinema'), array('controller' => 'cinemas', 'action' => 'add')); ?> </li>
<?php } ?>                               
 </ul></div>
                                </ul><!-- /.list-group -->
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Add User'); ?></h2>

		<div class="users form">
		
			<?php echo $this->Form->create('User', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('role', array('class' => 'form-control',
      'options' => array('gerant','admin'),)); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->