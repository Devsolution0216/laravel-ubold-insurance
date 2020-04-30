<?php

namespace App\Http\Controllers\Admin\Configuration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peoples;
use Illuminate\Support\Facades\Gate;

class PeoplesController extends Controller
{
    public function index() {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }

        $datas = Peoples::all();
        return view('admin.configuration.peoples.index')->with('datas', $datas);
    }

    public function store(Request $request) {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }

        $people = new Peoples;
        $people->name = $request->add_name;
        $people->save();

        return redirect()->route('peoples.index');
    }

    public function update(Request $request, $id) {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }
        
        $people = Peoples::find($id);
        $people->name = $request->edit_name;
        $people->save();
        return redirect()->route('peoples.index');
    }

    public function destroy($id) {
        if (! Gate::allows('users_manage')) {
            return abort(500);
        }
        
        $people = Peoples::find($id);
        $people->delete();
    }
}
