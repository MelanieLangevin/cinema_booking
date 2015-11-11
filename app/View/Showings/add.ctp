<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Showing'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item">
                            <?php echo $this->Html->link(__('List Showings'), array('action' => 'index')); ?>
                        </li>
                    </ul>
                </div>
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Movie'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Movies'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
                        <?php if ($this->Session->check('Auth.User')) { ?>			
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Movie'), array('controller' => 'movies', 'action' => 'add')); ?> </li>
                        <?php } ?>                                 
                    </ul>
                </div>
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Schedule'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Schedule'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin") { ?>		
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
                        <?php } ?>                                 
                    </ul>
                </div>
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

        <h2><?php echo __('Add Showing'); ?></h2>

        <div class="showings form">

            <?php echo $this->Form->create('Showing', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('date', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('Schedule', array('multiple' => 'checkbox')); ?> 
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('prix', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('rating_id', array('class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('movie_id', array('class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('Cinema', array('multiple' => 'checkbox')); ?>
                </div><!-- .form-group -->

                <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->

<?php
$this->Js->get('#ShowingRatingId')->event('change', $this->Js->request(array(
            'controller' => 'movies',
            'action' => 'getByRating'
                ), array(
            'update' => '#ShowingMovieId',
            'async' => true,
            'method' => 'post',
            'dataExpression' => true,
            'data' => $this->Js->serializeForm(array(
                'isForm' => true,
                'inline' => true
            ))
        ))
);