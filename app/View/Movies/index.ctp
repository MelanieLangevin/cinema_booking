
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <div class="dropdown">
                    <?php if ($this->Session->read('Auth.User.active') == 1 || $this->Session->read('Auth.User.role') == "admin") { ?>		
                        <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Movie'); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li class="list-group-item"><?php echo $this->Html->link(__('New Movie'), array('action' => 'add'), array('class' => '')); ?></li>

                        </ul><?php } ?> 
                </div>
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Category'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index'), array('class' => '')); ?></li> 
                        <?php if ($this->Session->read('Auth.User.role') == "admin") { ?>				
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Categories'), array('controller' => 'categories', 'action' => 'add'), array('class' => '')); ?></li> 
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
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Showings'), array('controller' => 'showings', 'action' => 'index'), array('class' => '')); ?></li> 
                        <?php if ($this->Session->read('Auth.User.active') == 1 || $this->Session->read('Auth.User.role') == "admin") { ?>		
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Showing'), array('controller' => 'showings', 'action' => 'add'), array('class' => '')); ?></li> 
                        <?php } ?>                                  
                    </ul>
                </div>
            </ul><!-- /.list-group -->
        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="movies index">

            <h2><?php echo __('Movies'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort(__('Title')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('Year')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('Studio')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('Summary')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('Poster')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('category_id')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('rating_id')); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($movies as $movie): ?>
                            <tr>
                                <td><?php echo h($movie['Movie']['titre']); ?>&nbsp;</td>
                                <td><?php echo h($movie['Movie']['annee']); ?>&nbsp;</td>
                                <td><?php echo h($movie['Movie']['studio']); ?>&nbsp;</td>
                                <td><?php
                                    echo $this->Text->truncate(
                                            h($movie['Movie']['resume']), 50, [
                                        'ellipsis' => '...',
                                        'exact' => false
                                            ]
                                    );
                                    ?>&nbsp;</td>
                                <td><?php if ($movie['Movie']['poster']) {
                                    echo $this->Html->image($movie['Movie']['poster'], array('escape' => false, 'height' => 42, 'width' => 42));
                                } ?></td>
                                <td>
                                    <?php echo $this->Html->link($movie['Category']['nom'], array('controller' => 'categories', 'action' => 'view', $movie['Category']['id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($movie['Rating']['name'], array('controller' => 'ratings', 'action' => 'view', $movie['Rating']['id'])); ?>
                                </td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $movie['Movie']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php if ($this->Session->read('Auth.User.active') == 1 || $this->Session->read('Auth.User.role') == "admin") { ?>		
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $movie['Movie']['id']), array('class' => 'btn btn-default btn-xs')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $movie['Movie']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $movie['Movie']['id'])); ?>
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