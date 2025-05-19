@extends('layout.home')
@section('content')
    <div class="card_role">
        <span class="card__title">Create new role</span>
        <p class="card__content">
        </p>
        <form class="card__form" action="{{route('roles.store')}}" method="POST">
            @csrf
            <input type="text" placeholder="Your role" name="name"/>
            <button title="SignUp" class="sign-up" type="submit">
                <svg
                    fill="#e8eaed"
                    width="24px"
                    viewBox="0 -960 960 960"
                    height="24px"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z"></path>
                </svg>
            </button>
        </form>
    </div>
@endsection
<style>

</style>

