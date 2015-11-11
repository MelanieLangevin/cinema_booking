
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">		
                             <div class="dropdown">
                                <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Category'); ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
                                    <?php if ($this->Session->read('Auth.User.role') == "admin") { ?>						
                                        <li class="list-group-item"><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id']), array('class' => '')); ?> </li>
                                        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
                                        <li class="list-group-item"><?php echo $this->Html->link(__('New Category'), array('action' => 'add'), array('class' => '')); ?> </li>
                                    <?php } ?>
                                    <li class="list-group-item"><?php echo $this->Html->link(__('List Categories'), array('action' => 'index'), array('class' => '')); ?> </li>
                                </ul>
                            </div>	
			</ul><!-- /.list-group -->
		</div><!-- /.actions -->
	</div><!-- /#sidebar .span3 -->
	<div id="page-content" class="col-sm-9">
		
		<div class="categories view">

			<h2><?php  echo __('Category'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['nom']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['description']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
