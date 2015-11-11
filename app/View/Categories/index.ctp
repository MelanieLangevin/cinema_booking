
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <div class="dropdown"><?php if ($this->Session->read('Auth.User.role') == "admin") { ?>
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Category'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <li class="list-group-item"><?php echo $this->Html->link(__('New Category'), array('action' => 'add'), array('class' => '')); ?></li>

                    </ul><?php } ?> </div>
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="categories index">

            <h2><?php echo __('Categories'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort(__('Name')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('Description')); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?php echo h($category['Category']['nom']); ?>&nbsp;</td>
                                <td><?php
                                    echo $this->Text->truncate(
                                            h($category['Category']['description']), 75, [
                                        'ellipsis' => '...',
                                        'exact' => false
                                            ]
                                    );
                                    ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php if ($this->Session->read('Auth.User.role') == "admin") { ?>			
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
                                    </td>
                                <?php } ?>
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