<?php
  //load file for this view to work on 'autocomplete' field
  $this->Html->script('View/Studios/add', array('inline' => false));
?>
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Movie'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Movies'), array('action' => 'index')); ?></li>
                    </ul></div> 
                <div class="dropdown">
                    <a href="#" class="list-group-item" data-toggle="dropdown"><?php echo __('Category'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
                        <?php if ($this->Session->read('Auth.User.role') == "admin") { ?>				
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Categories'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
                        <?php } ?>                                
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

        <h2><?php echo __('Add Movie'); ?></h2>

        <div class="movies form">

            <?php echo $this->Form->create('Movie', array('role' => 'form', 'type' => 'file')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('titre', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('annee', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('studio', array('class' => 'form-control', 'id' => 'autocomplete')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('resume', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">

                    <?php echo $this->Form->input('poster', array('type' => 'file')); ?>
                    <?php if (!empty($this->data['Movie']['poster'])): ?>
                        <label><?php echo __('Uploaded File'); ?></label>
                        <?php
                        echo $this->Form->input('poster', array('type' => 'hidden'));
                        echo $this->Html->image($this->data['Movie']['poster'], array('escape' => false, 'height' => 42, 'width' => 42));
                        ?>
                    <?php endif; ?>
                </div>
        </div><!-- .form-group -->
        <div class="form-group">
            <?php echo $this->Form->input('category_id', array('class' => 'form-control')); ?>
        </div><!-- .form-group -->
        <div class="form-group">
            <?php echo $this->Form->input('rating_id', array('class' => 'form-control')); ?>
        </div>

        <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

        </fieldset>

        <?php echo $this->Form->end(); ?>

    </div><!-- /.form -->

</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->