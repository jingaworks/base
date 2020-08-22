<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProfileRequest;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Address;
use App\Models\Profile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Profile::with(['address', 'created_by'])->select(sprintf('%s.*', (new Profile)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'profile_show';
                $editGate      = 'profile_edit';
                $deleteGate    = 'profile_delete';
                $crudRoutePart = 'profiles';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : "";
            });
            $table->editColumn('avatar', function ($row) {
                return $row->avatar ? $row->avatar : "";
            });
            $table->addColumn('address_name', function ($row) {
                return $row->address ? $row->address->name : '';
            });

            $table->editColumn('address.address', function ($row) {
                return $row->address ? (is_string($row->address) ? $row->address : $row->address->address) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'address']);

            return $table->make(true);
        }

        return view('admin.profiles.index');
    }

    public function create()
    {
        abort_if(Gate::denies('profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addresses = Address::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.profiles.create', compact('addresses'));
    }

    public function store(StoreProfileRequest $request)
    {
        $profile = Profile::create($request->all());

        return redirect()->route('admin.profiles.index');
    }

    public function edit(Profile $profile)
    {
        abort_if(Gate::denies('profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addresses = Address::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $profile->load('address', 'created_by');

        return view('admin.profiles.edit', compact('addresses', 'profile'));
    }

    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $profile->update($request->all());

        return redirect()->route('admin.profiles.index');
    }

    public function show(Profile $profile)
    {
        abort_if(Gate::denies('profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profile->load('address', 'created_by');

        return view('admin.profiles.show', compact('profile'));
    }

    public function destroy(Profile $profile)
    {
        abort_if(Gate::denies('profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profile->delete();

        return back();
    }

    public function massDestroy(MassDestroyProfileRequest $request)
    {
        Profile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}