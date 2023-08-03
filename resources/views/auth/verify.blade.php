@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('تایید ایمیل') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('یک لینک جدید به ایمیل شما ارسال شد.') }}
                        </div>
                    @endif

                    {{ __('قبل از ادامه دادن ایمیل خود را چک کنید.') }}
                    {{ __('اگر ایمیلی دریافت نکرده اید،') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('برای ایمیل جدید اینجا کلیک کنید.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
