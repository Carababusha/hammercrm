@extends('layouts.app')

@section('content')
    <header>
        <h1>{{ __('Customer') }}
    </header>
    <form method="POST" action="/customer/save" class="form">
        {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <label>{{ __('First name') }} <span class="text-danger">*</span></label>
                <input type="text" name="first_name" value="{{ $customer->first_name }}" required="required" class="form-control">
            </div>
            <div class="col">
                <label>{{ __('Last name') }} <span class="text-danger">*</span></label>
                <input type="text" name="last_name" value="{{ $customer->last_name }}" required="required" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>{{ __('Phone') }}</label>
                <input type="tel" name="phone" value="{{ $customer->phone }}" maxlength="15" class="form-control">
            </div>
            <div class="col">
                <label>E-mail</label>
                <input type="email" name="email" value="{{ $customer->email }}" maxlength="254" class="form-control">
            </div>
        </div>
        <div>
            <div class="col">
                <label>{{ __('Country') }}</label>
                <select name="country_id" id="country_id" required class="form-control">
                    <option value=""></option>
                    @foreach ($countries as $country)
                    <?php var_dump($country); ?>
                    <option value="{{ $country->code_2 }}" @if($customer->country_id == $country->code_2) selected="selected" @endif>{{ $country->name }} {{ $country->flag }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>
        <input type="hidden" name="id" value="{{ (!empty($customer)) ? $customer->id : '' }}">
    </form>
@endsection
