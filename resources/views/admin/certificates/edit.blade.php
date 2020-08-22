@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.certificate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.certificates.update", [$certificate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.certificate.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $certificate->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="serie">{{ trans('cruds.certificate.fields.serie') }}</label>
                <input class="form-control {{ $errors->has('serie') ? 'is-invalid' : '' }}" type="text" name="serie" id="serie" value="{{ old('serie', $certificate->serie) }}" required>
                @if($errors->has('serie'))
                    <div class="invalid-feedback">
                        {{ $errors->first('serie') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.serie_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_id">{{ trans('cruds.certificate.fields.address') }}</label>
                <select class="form-control select2 {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address_id" id="address_id" required>
                    @foreach($addresses as $id => $address)
                        <option value="{{ $id }}" {{ ($certificate->address ? $certificate->address->id : old('address_id')) == $id ? 'selected' : '' }}>{{ $address }}</option>
                    @endforeach
                </select>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="valid_year">{{ trans('cruds.certificate.fields.valid_year') }}</label>
                <input class="form-control date {{ $errors->has('valid_year') ? 'is-invalid' : '' }}" type="text" name="valid_year" id="valid_year" value="{{ old('valid_year', $certificate->valid_year) }}" required>
                @if($errors->has('valid_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('valid_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.valid_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profile_id">{{ trans('cruds.certificate.fields.profile') }}</label>
                <select class="form-control select2 {{ $errors->has('profile') ? 'is-invalid' : '' }}" name="profile_id" id="profile_id">
                    @foreach($profiles as $id => $profile)
                        <option value="{{ $id }}" {{ ($certificate->profile ? $certificate->profile->id : old('profile_id')) == $id ? 'selected' : '' }}>{{ $profile }}</option>
                    @endforeach
                </select>
                @if($errors->has('profile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.profile_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection