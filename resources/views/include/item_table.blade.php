<div class="dropdown" style="margin-left: 30px;">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">
        Optionen:
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{url($route.'/create')}}">
            <span class="fa fa-pencil"></span>
            <span>Neue {{$title}} hinzufügen</span>
        </a>
        <a class="dropdown-item" href="{{url($route.'?trashed=true')}}">
            <span class="fa fa-trash"></span>
            <span>Papierkorbs ({{replace_number($count)}}) </span>
        </a>

        <a class="dropdown-item off item_form" id="remove_items" msg="Möchten Sie die {{$title}} Löschen?">
            <span class="fa fa-remove"></span>
            <span>{{$title}} löschen </span>
        </a>

        @if(isset($_GET['trashed']) && $_GET['trashed']==true)
            <a class="dropdown-item off item_form" id="restore_items" msg="Möchten Sie die  {{$title}} Restaurieren?">
                <span class="fa fa-refresh"></span>
                <span>{{$title}} Restaurieren </span>
            </a>
        @endif
    </div>
</div>
