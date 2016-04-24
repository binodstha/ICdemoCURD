<header>
    <div class="row">
        <div class="col-lg-8">
            <ul class="nav nav-pills">
                <li ><?php echo Html::link('/', 'Home'); ?></li>
                <li ><?php echo Html::link('/addinfo', 'Add Info'); ?></li>
            </ul>
        </div>
        <div class="col-lg-4">
            <?php echo Form::open(array('url' => 'search', 'class' => 'form', 'method' => 'POST')); ?>

                <div class="input-group">
                    <?php echo Form::text('entry', null, array('id' => 'search',
                                                        'class'=>'form-control', 
                                                        'placeholder'=>'Search for...',
                                                        'onkeyup' => 'chk_search()')); ?>


                    <span class="input-group-btn">
                        <?php echo Form::button('GO!', array( 'id' => 'submit_search',
                                                       'class'=>'btn btn-default', 
                                                       'type'=>'submit',
                                                       'disabled' => 'true')); ?>

                    </span>                                      
               </div>
            <?php echo Form::close(); ?> 
        </div>
    </div>
</header>