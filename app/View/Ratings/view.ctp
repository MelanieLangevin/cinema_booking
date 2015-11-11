
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">		
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Rating'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Ratings'), array('action' => 'index'), array('class' => '')); ?> </li>
                    </ul>
                </div>	
            </ul><!-- /.list-group -->
        </div><!-- /.actions -->
    </div><!-- /#sidebar .span3 -->
    <div id="page-content" class="col-sm-9">

        <div class="ratings view">

            <h2><?php echo __('Rating'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($rating['Rating']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Acronym'); ?></strong></td>
                            <td>
                                <?php echo h($rating['Rating']['Acronyme']); ?>
                                &nbsp;
                            </td>
                        </tr>
                    </tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
                    <td>
                        <?php echo h($rating['Rating']['Description']); ?>
                        &nbsp;
                    </td>
                </tr>	</tbody>
        </table><!-- /.table table-striped table-bordered -->
    </div><!-- /.table-responsive -->

</div><!-- /.view -->


</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
