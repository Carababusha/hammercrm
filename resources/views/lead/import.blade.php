@extends('layouts.app')

@section('content')
    <header>
        <h1>{{ __('Lead import') }}
    </header>

    <div>
        <a href="/asset/upload/import/hammer_lead_example.csv" target="_blank" class="btn btn-outline-success">{{ __('Download example file') }} <i class="las la-file-csv"></i></a>
    </div>

    <form method="POST" action="/lead/import/save" enctype="multipart/form-data" class="form">
        @csrf
        <div class="row">
            <label>{{ __('File') }}</label>
            <input type="file" name="upload" accept="text/csv" required>
        </div>
        <div class="row mt-2">
            <div class="col">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>
    </form>
@endsection
