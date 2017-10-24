<div class="form-group">
    {!! Form::text('id', null, ['class'=>'hidden']) !!}
    {!! Form::label('parent_id', '父单位', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        @include('crud::partials.select_form', ['select_name'=>'parent_id','datas'=>$deps,'chosen_id'=>$did, 'pinyin_search'=>1, 'parent_selectable'=>1 ,'select_width'=>300,'dropdown_height'=>300])
        {{--@include('partials.select_department', ['cssClass' => 'field-required','deps'=>$deps,'select2'=>1,'height'=>34,'select_name'=>'parent_id','parent_selectable'=>1])--}}
    </div>
</div>

<div class="form-group">
    {!! Form::label('title', '名称', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::requiredText('title', null, null, ['class'=>'form-control','style'=>'width:300px;']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('sort_id', '排序', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('sort_id', null, ['class'=>'form-control']) !!}
    </div>
</div>