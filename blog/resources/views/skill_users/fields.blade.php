<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Skill Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('skill_id', 'Skill Id:') !!}
    {!! Form::number('skill_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Year Of Experience Field -->
<div class="form-group col-sm-6">
    {!! Form::label('year_of_experience', 'Year Of Experience:') !!}
    {!! Form::text('year_of_experience', null, ['class' => 'form-control']) !!}
</div>

<!-- Deleted Ad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deleted_ad', 'Deleted Ad:') !!}
    {!! Form::date('deleted_ad', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('skillUsers.index') !!}" class="btn btn-default">Cancel</a>
</div>
