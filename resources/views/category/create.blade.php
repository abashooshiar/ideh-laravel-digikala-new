@extends('layouts.admin')

@section('content')
    @include('include.breadcrumb', ['data'=>[
        ['title'=>'Kategorieverwaltung' , 'url'=>url('admin/category')],
        ['title'=>'Kategorie hinzufügen' , 'url'=>url('admin/category/create')]
        ]]);
    <div class="panel">
        <div class="header">Neue Kategorie erstellen</div>
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
                @if($errors->has('ename'))
                    <span class="has_error">{{$errors->first('ename')}}</span>
                @endif
            </div>

            <div class="form-group">
                {{Form::label('search_url','search_url')}}
                {{Form::text('search_url',null,['class'=>'form-control'])}}
                @if($errors->has('search_url'))
                    <span class="has_error">{{$errors->first('search_url')}}</span>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('parent_id','Kategorie Auswahl' ) }}
                {{ Form::select('parent_id',$parent_cat,null,['class'=>'selectpicker auto_width','data-live-search'=>'true']) }}
                @if($errors->has('parent_id'))
                    <span class="has_error">{{$errors->first('parent_id')}}</span>
                @endif
            </div>

            <div class="form-group">
                <input type="file" name="pic" id="pic" onchange="loadFile(event)" style="display: none">
                {{Form::label('pic','Foto ausw&auml;hlen')}}
                <img src="{{url('files/images/upload_file.png')}}" onclick="select_file()" width="40" id="output">
                @if($errors->has('pic'))
                    <span class="has_error">{{$errors->first('pic')}}</span>
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
