<header>
    <div class="row">
        <div class="col-lg-8">
            <ul class="nav nav-pills">
                <li >{!! Html::link('/', 'Home')!!}</li>
                <li >{!! Html::link('/addinfo', 'Add Info')!!}</li>
            </ul>
        </div>
        <div class="col-lg-4">
            {!! Form::open(array('url' => 'search', 'class' => 'form', 'method' => 'POST')) !!}
                <div class="input-group">
                    {!! Form::text('entry', null, array('id' => 'search',
                                                        'class'=>'form-control', 
                                                        'placeholder'=>'Search for...',
                                                        'onkeyup' => 'chk_search()')) !!}

                    <span class="input-group-btn">
                        {!! Form::button('GO!', array( 'id' => 'submit_search',
                                                       'class'=>'btn btn-default', 
                                                       'type'=>'submit',
                                                       'disabled' => 'true')) !!}
                    </span>                                      
               </div>
            {!! Form::close() !!} 
        </div>
    </div>
</header>