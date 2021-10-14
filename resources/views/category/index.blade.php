@extends('layouts.admin')

@section('content')
    <div class="panel">
        <div class="header">Kategorieverwaltung</div>
        <div class="panel_content">
            <?php    $i = (isset($_GET['page'])) ? (($_GET['page'] - 1) * 6) : 0; ?>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Reihe</th>
                    <th>Kategoriename</th>
                    <th>Kategorie Elternteil</th>
                    <th>Einsatz</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($category as $key=>$value)
                    <tr>
                        <td></td>
                        <td>{{replace_number($i)}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->getParent->name}}</td>
                        <td>
                            <a href="{{url('admin/category/'.$value->id.'/edit')}}"><span
                                    class="fa fa-edit"></span></a>
                        </td>
                    </tr>
                @php $i++; @endphp
                @endforeach
            </table>
            {{$category->links()}}
        </div>
    </div>
@endsection
