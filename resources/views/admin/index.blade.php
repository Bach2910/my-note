@extends('layout.admin')
@section('title','Home')
@section('aside')
    <section class="main">
        <div class="main-top">
            <h1>Dash Broad</h1>
        </div>
        <div class="main-skills">
            <button
                    onclick="window.location.href='{{route('user.index')}}'" style="background-color: #0b5ed7">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg> User
            </button>
            <button
                onclick="window.location.href='{{route('store.index')}}'" style="margin-right: 70%;background-color: deeppink">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg> Page
            </button>
        </div>
    </section>
@endsection

