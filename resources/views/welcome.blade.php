<?php $user = Auth::user(); ?>





@extends('layouts.default')
@section("title", "$user->name's Profile")
@section("content")


    <br>

    <div class="container text-center mt-5">
        <h2 data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?php echo "@" . $user->name; ?>">
            <?php echo $user->email; ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                <path
                    d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
            </svg>
        </h2>
        <form action="{{ route('logout.post') }}" method="post">
            @csrf
            <button class="btn btn-warning mt-5" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-title="Logout now">Logout</button>
        </form>
    </div>



@endsection