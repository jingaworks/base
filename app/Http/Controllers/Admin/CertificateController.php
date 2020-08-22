<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCertificateRequest;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\Address;
use App\Models\Certificate;
use App\Models\Profile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('certificate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Certificate::with(['address', 'profile', 'created_by'])->select(sprintf('%s.*', (new Certificate)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'certificate_show';
                $editGate      = 'certificate_edit';
                $deleteGate    = 'certificate_delete';
                $crudRoutePart = 'certificates';

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
            $table->editColumn('serie', function ($row) {
                return $row->serie ? $row->serie : "";
            });
            $table->addColumn('address_name', function ($row) {
                return $row->address ? $row->address->name : '';
            });

            $table->addColumn('profile_phone', function ($row) {
                return $row->profile ? $row->profile->phone : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'address', 'profile']);

            return $table->make(true);
        }

        return view('admin.certificates.index');
    }

    public function create()
    {
        abort_if(Gate::denies('certificate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addresses = Address::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $profiles = Profile::all()->pluck('phone', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.certificates.create', compact('addresses', 'profiles'));
    }

    public function store(StoreCertificateRequest $request)
    {
        $certificate = Certificate::create($request->all());

        return redirect()->route('admin.certificates.index');
    }

    public function edit(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addresses = Address::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $profiles = Profile::all()->pluck('phone', 'id')->prepend(trans('global.pleaseSelect'), '');

        $certificate->load('address', 'profile', 'created_by');

        return view('admin.certificates.edit', compact('addresses', 'profiles', 'certificate'));
    }

    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        $certificate->update($request->all());

        return redirect()->route('admin.certificates.index');
    }

    public function show(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificate->load('address', 'profile', 'created_by');

        return view('admin.certificates.show', compact('certificate'));
    }

    public function destroy(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificate->delete();

        return back();
    }

    public function massDestroy(MassDestroyCertificateRequest $request)
    {
        Certificate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}