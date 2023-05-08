<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKadRequest;
// use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdateKadRequest;
use App\Models\model_cps_template;
use App\Models\model_cps_customer;
use App\Models\model_cps_music;
use App\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KadsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = model_cps_customer::all();

        return view('admin.kads.index', compact('customers'));
    }

    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $music = model_cps_music::all();

        return view('admin.kads.create',compact('music'));
    }

    public function store(Request $request)
    {
        $permission = model_cps_template::create($request->all());

        return redirect()->route('admin.kads.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $customer = DB::table('cps_customer')
        // ->leftjoin('cps_template', 'cps_template.customer_id','=','cps_customer.id')
        // ->leftjoin('cps_music', 'cps_music.customer_id', '=', 'cps_customer.id')
        // ->where('cps_customer.id',$id)
        // ->first();

        $customer = model_cps_customer::with('template')->find($id);
        $music = model_cps_music::all();

        return view('admin.kads.edit',compact('customer','music'));
    }

    public function update(Request $request, $id)
    {
        $template = model_cps_template::find($id);
        $input = $request->all();
        
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln($template->fill($input));
        $output->writeln($request->music_id);

        $template->fill($input)->save();
        // $customer->update($customer->all());

        return redirect()->route('admin.kads.index');
    }

    // public function show(Permission $permission)
    // {
    //     abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('admin.permissions.show', compact('permission'));
    // }

    public function destroy(model_cps_customer $customer)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer->delete();

        return back();
    }

    public function massDestroy(MassDestroyKadRequest $request)
    {
        model_cps_customer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
