@extends('layouts.app')

@section('content')
<header>
   <h1>{{ __('Customers') }}</h1>
</header>

<div class="">
    <a href="/customer/create" class="btn btn-primary">{{ __('New') }}</a>
</div>

<div class="table-responsive mt-2">
    <table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th>#ID</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Phone') }}</th>
        <th>E-mail</th>
        <th>Website</th>
        <th>{{ __('Company') }}</th>
        <th>{{ __('Country') }}</th>
        <th>{{ __('Actions') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
    <tr>
        <td>{{ $customer->id }}</td>
        <td>
            <a href="/customer/update/{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</a>
        </td>
        <td>{{ $customer->phone }}</td>
        <td>{{ $customer->email }}</td>
        <td><a href="{{ $customer->website }}" target="_blank">{{ $customer->website }}</a></td>
        <td>{{ (!empty($customer->company)) ? $customer->company->name : '' }}</td>
        <td>{{ $customer->country_id }}</td>
        <td>
            <a href="/customer/update/{{ $customer->id }}" class="btn btn-xs btn-warning text-white">
                <i class="las la-pen"></i>
            </a>
            <a onclick="Customer.delete({{ $customer->id }}, '{{ $customer->first_name }} {{ $customer->last_name }}');" class="btn btn-xs btn-danger">
                <i class="las la-trash-alt"></i>
            </a>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection
