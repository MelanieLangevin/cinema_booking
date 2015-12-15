<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button><!-- /.navbar-toggle -->
        <?php
        echo $this->Html->Link(__("Cinemamenic"), array(
            'controller' => 'cinemas',
            'action' => 'index'), array('class' => 'navbar-brand'));
        ?>
               <?php echo $this->Html->link('<object type="image/svg+xml" data="/cinema_booking2/img/logoSVGCinema.svg">Your browser does not support SVG</object>',  array(
                        'controller' => 'cinemas',
                        'action' => 'about',
                        '#' => 'SvgLogo'), array('escape'=>false, 'position'=>"right")); ?>
       

    </div><!-- /.navbar-header -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">

            <li>        
                <?php
                if ($this->Session->check('Auth.User')) {
                    echo $this->Html->link($this->Session->read('Auth.User.username') . " (" . $this->Session->read('Auth.User.role') . ")", array(
                        'controller' => 'users',
                        'action' => 'view', $this->Session->read('Auth.User.id')));
                    if ($this->Session->read('Auth.User.role') == "admin" && $this->Session->read('Auth.User.isConfirmed') == 1) {
                        echo $this->Html->link(__("Add User"), array(
                            'controller' => 'users',
                            'action' => 'add'));
                    }
                }
                ?>
            </li>
            <li>

                <?php
                if ($this->Session->check('Auth.User')) {
                    echo $this->Html->link(__("Logout"), array(
                        'controller' => 'users',
                        'action' => 'logout'));
                } else {
                    echo $this->Html->link(__("Login"), array(
                        'controller' => 'users',
                        'action' => 'login')
                    );
                }
                ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Go to'); ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><?php echo $this->Html->link(__('List Cinemas'), array('controller' => 'cinemas', 'action' => 'index'), array('class' => '')); ?> </li>
                    <li><?php echo $this->Html->link(__('List Showings'), array('controller' => 'showings', 'action' => 'index'), array('class' => '')); ?> </li>
                    <li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index'), array('class' => '')); ?> </li>
                    <li><?php echo $this->Html->link(__('List Ratings'), array('controller' => 'ratings', 'action' => 'index'), array('class' => '')); ?> </li>
                    <li><?php echo $this->Html->link(__('List Movies'), array('controller' => 'movies', 'action' => 'index'), array('class' => '')); ?> </li>
                    <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index'), array('class' => '')); ?> </li>
                    <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>		
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Language <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php
                    echo $this->I18n->flagSwitcher(array(
                        'class' => 'languages',
                        'id' => 'language-switcher'
                    ));
                    ?>
                </ul>



            <li>
                <?php
                echo $this->Html->link(__("About"), array(
                    'controller' => 'cinemas',
                    'action' => 'about'));
                ?>
            </li>



        </ul><!-- /.nav navbar-nav -->
    </div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->
</li>