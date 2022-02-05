@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <i class="fas fa-home test"></i>

                    {{ __('You are logged in!') }}

                        <br>
                        <br>
                        <br>
                        <br>

                    {{ date('d-m-Y : h-i-a') }}

                        <br>
                        <br>
                        <br>
                        <br>
                    {{ $categories }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
    <script>
        $('.test').click(function () {
            alert('message');
        })
    </script>
    @stop
