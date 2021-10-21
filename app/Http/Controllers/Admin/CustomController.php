<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CustomController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function destroy($id)
    {
        $model_name = "App\Models\\" . $this->model;
        $row = $model_name::withTrashed()->findOrFail($id);
        if ($row->deleted_at == null) {
            $row->delete();
        } else {
            $row->forceDelete();
        }
        return redirect('admin/'.$this->route_params)->with('message',"Die gewünschte $this->title wurde gelöscht.");
    }

    public function remove_items(Request $request)
    {
        $model_name = "App\Models\\" . $this->model;
        $ids = $request->get('category_id', array());
        foreach ($ids as $key => $value) {
            $row = $model_name::withTrashed()->where('id', $value)->firstOrFail();
            if ($row->deleted_at == null) {
                $row->delete();
            } else {
                $row->forceDelete();
            }
        }
        return redirect('admin/'.$this->route_params.'?trashed=true')->with('message', "$this->title Löschen erfolgreich abgeschlossen.");
    }

    public function restore_items(Request $request)
    {
        $model_name = "App\Models\\" . $this->model;
        $ids = $request->get('category_id', array());
        foreach ($ids as $key => $value) {
            $row = $model_name::withTrashed()->where('id', $value)->firstOrFail();
            $row->restore();
        }
        return redirect('admin/'.$this->route_params.'?trashed=true')->with('message', "$this->title(n) Restore erfolgreich abgeschlossen.");

    }

    public function restore($id)
    {
        $model_name = "App\Models\\" . $this->model;
        $row = $model_name::withTrashed()->where('id', $id)->firstOrFail();
        $row->restore();
        return redirect('admin/'.$this->route_params.'?trashed=true')->with('message', "$this->title Restore erfolgreich abgeschlossen.");

    }

}
