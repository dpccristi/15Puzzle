@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Skill User
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($skillUser, ['route' => ['skillUsers.update', $skillUser->id], 'method' => 'patch']) !!}

                        @include('skill_users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection