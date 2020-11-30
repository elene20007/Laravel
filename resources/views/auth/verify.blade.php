@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('გაიარეთ ვერიფიკაცია თქვენი მეილით') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('ვერიფიკაციის ლინკი გამოგზავნილია თქვენს მეილზე.') }}
                        </div>
                    @endif

                    {{ __('გთხოვთ შეამოწმოთ ვერიფიკაციის ლინკი თქვენს მეილზე.') }}
                    {{ __('თუ არ მიგიღიათ ვეიფიკაციის ლინკი') }}, <a href="{{ route('verification.resend') }}">{{ __('დააკლიკეთ ღილაკს ლინკის ხელახლა გამოსაგზავნად') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
