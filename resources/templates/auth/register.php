@extends('layout.master')

@section('content')
    <div class="content">
        <form action="/register" method="POST">
        	@csrf
            <p><label for="email"><b>{{ translate('auth.email') }}</b></label></p>
            <p><input type="text" placeholder="{{ translate('auth.email') }}" name="email" required></p>

            <p><label for="password"><b>{{ translate('auth.password') }}</b></label></p>
            <p><input type="password" placeholder="{{ translate('auth.password') }}" name="password" required></p>

            <p><button type="submit">{{ translate('auth.register') }}</button></p>
        </form>
    </div>
@endsection