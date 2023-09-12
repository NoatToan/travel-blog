@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <x-form.row-input label="First Name" name="first_name"/>
                        <x-form.row-input label="Last Name" name="last_name"/>
                        <x-form.row-input label="Phone Number" name="phone_number"/>
                        <x-form.row-input label="Email" name="email"/>
                        <x-form.row-input label="Password" name="password"/>
                        <x-form.row-input label="Confirm Password" name="password_confirmation"/>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
