@extends('profile.app')

@section('card')
    <div class="row mx-auto">
        <div class="card p-0 rounded-5 border-0 shadow-lg cd-35 mx-auto mb-5" style="width: 10rem; height: 10rem">
            <div class="card-body text-center bg-dark pb-0 text-light d-flex flex-column justify-content-center align-items-center">
                <h5 class="pb-2">تعداد سفارشات</h5>
                <h5 class="text-warning">{{ auth()->user()->orders()->count() }}</h5>
            </div>
        </div>
    </div>
@endsection
