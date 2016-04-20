<?php $__env->startSection('title'); ?>
Add New Info
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>New info Form</h1>
<?php if($error == 'matched'): ?>
    <p class="text-center error"><?php echo "The EmailID or Phone number allready exist."; ?></p>   
    <?php elseif($error == 'Added'): ?>
    <p class="text-center success"><?php echo "A new info is Added."; ?></p>
<?php endif; ?>

<?php echo Form::open(array('url' => 'addinfo', 'class' => 'form', 'method' => 'POST')); ?>

    <div class="form-group">
        <?php echo Form::label('name','Name', array('class' => 'col-sm-2 control-label')); ?>

            <div class="col-sm-10">
                <?php echo Form::text('name', null, array('required', 
                                                   'class'=>'form-control', 
                                                   'placeholder'=>'Enter Your Name')); ?>

            </div>
    </div>

    <div class="form-group">
        <?php echo Form::label('gender', 'Gender', array('class' => 'col-sm-2 control-label')); ?>

        <?php echo Form::radio('gender', 'male', true); ?> male 
        <?php echo Form::radio('gender', 'female'); ?> female  
    </div>
    <div class="form-group">
        <?php echo Form::label('phonenum', 'Phone number', array('class' => 'col-sm-2 control-label')); ?>

        <div class="col-sm-10">
            <?php if($error == 'matched'): ?>
                <?php echo Form::number('phonenum', null, array('required', 
                                                         'class' => 'form-control error', 
                                                         'placeholder' => 'Enter Your Phone Number')); ?>

            <?php else: ?>
                <?php echo Form::number('phonenum', null, array('required', 
                                                          'class' => 'form-control', 
                                                          'placeholder' => 'Enter Your Phone Number')); ?>

            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo Form::label('email', 'E-mail Address', array('class' => 'col-sm-2 control-label')); ?>

        <div class="col-sm-10">
            <?php if($error == 'matched'): ?>
                <?php echo Form::email('email', null, array('required', 
                                                     'class' => 'form-control error', 
                                                     'placeholder' => 'Enter Your Email Address')); ?>

            <?php else: ?>
                <?php echo Form::email('email', null, array('required', 
                                                     'class' => 'form-control', 
                                                     'placeholder' => 'Enter Your Email Address')); ?>

            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo Form::label('address', 'Address', array('class' => 'col-sm-2 control-label')); ?>

        <div class="col-sm-10">
            <?php echo Form::text('address', null, array('required', 
                                                  'class' => 'form-control', 
                                                  'placeholder' => 'Enter Your Address')); ?>

        </div>
    </div>

    <div class="form-group">
        <?php echo Form::label('nationality', 'Nationality', array('class' => 'col-sm-2 control-label')); ?>

        <div class="col-sm-10">
            <?php echo Form::text('nationality', null,  array('required',
                                                       'id' => 'nationality',
                                                       'class' => 'form-control', 
                                                       'placeholder'=>'Enter Your Nationality ')); ?>

        </div>
    </div>

    <div class="form-group">
        <?php echo Form::label('dob', 'Date of Birth', array('class' => 'col-sm-2 control-label')); ?>

        <div class="col-sm-10">
            <?php echo Form::date('dob', null,  array('required',
                                               'id' => 'dob',
                                               'class' => 'form-control',
                                               'onchange' => 'chk_dob()' )); ?>

        </div>
    </div>

    <div class="form-group">
        <?php echo Form::label('education', 'Education', array('class' => 'col-sm-2 control-label')); ?>

        <div class="col-sm-8">
            <?php echo Form::text('education', null,  array('required',
                                                     'id' => 'education',
                                                     'class' => 'form-control',
                                                     'placeholder'=>'Enter Your Last Education')); ?>

        </div>
        <div class="col-sm-2">
            <?php echo Form::number('percentage', null, array('id' =>'percentage',
                                                       'class'=>'form-control',
                                                       'placeholder'=>'Percentage', 
                                                       'min' => '0', 
                                                       'max' => '100', 
                                                       'onkeyup' => 'chk_percentage()')); ?>

        </div>
    </div>
    
    <div class="form-group">
        <?php echo Form::label('modeofcont', 'Mode Of Contact', array('class' => ' col-sm-2 control-label')); ?>

        <div class="col-sm-10">
            <?php echo Form::radio('modeofcont', 'phone'); ?> Phone
            <?php echo Form::radio('modeofcont', 'email', true); ?> Email
        </div>
    </div>

    <div class="form-group">
        <div class = 'col-sm-offset-2 col-sm-10'>
            <?php echo Form::submit('Add Info',  array('class'=>'btn btn-primary')); ?>

        </div>
    </div>
<?php echo Form::close(); ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shared.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>