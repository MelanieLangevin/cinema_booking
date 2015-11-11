<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Cinema'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php if ($this->Session->check('Auth.User')) { ?>				
                            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cinema.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Cinema.id'))); ?></li>
                        <?php } ?> 				
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Cinemas'), array('action' => 'index')); ?></li>
                    </ul></div>
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('User'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin" && $this->Session->read('Auth.User.active') == 1) { ?>				
                            <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
                        <?php } ?>                                
                    </ul></div>
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Showing'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Showings'), array('controller' => 'showings', 'action' => 'index')); ?> </li>
                        <?php if ($this->Session->read('Auth.User.active') == "1" || $this->Session->read('Auth.User.role') == "admin") { ?>				
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Showing'), array('controller' => 'showings', 'action' => 'add')); ?> </li>
                        <?php } ?>                                
                    </ul></div>
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Edit Cinema'); ?></h2>

        <div class="cinemas form">

            <?php echo $this->Form->create('Cinema', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('society', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('adress', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('phone', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php
                    if ($this->Session->read('Auth.User.role') == "admin") {
                        echo $this->Form->input('user_id', array('class' => 'form-control'));
                    } else {
                        echo $this->Form->input('user_id', array('class' => 'form-control', 'default' => $this->Session->read('Auth.User.id'), 'disabled'));
                    }
                    ?>					</div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('Showing', array('multiple' => 'checkbox')); ?>
                </div><!-- .form-group -->

                <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
