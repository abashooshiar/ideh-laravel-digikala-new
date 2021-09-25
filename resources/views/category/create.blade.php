@extends('layouts.admin')

@section('content')

    <div class="panel">
        <div class="header">
            Neue Kategorie erstellen
        </div>
        <div class="panel_content">
            {!! Form::open(['url' => 'admin/category','files'=>true]) !!}
            <div class="form-group">
                {{Form::label('name','Kategorie Name')}}
                {{Form::text('name',null,['class'=>'form-control'])}}
                @if($errors->has('name'))
                    <span class="has_error">{{$errors->first('name')}}</span>
                @endif
            </div>

            <div class="form-group">
                {{Form::label('ename','Englisch Name')}}
                {{Form::text('ename',null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('search_url','url')}}
                {{Form::text('search_url',null,['class'=>'form-control'])}}
                @if($errors->has('search_url'))
                    <span class="has_error">{{$errors->first('search_url')}}</span>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('notShow','Nicht in der Hauptliste anzeigen')}}
                {{Form::checkbox('notShow',false)}}
            </div>

            <button class="btn btn-success">Kategorie registrieren</button>

            {!! Form::close() !!}
        </div>
    </div>

@endsection
