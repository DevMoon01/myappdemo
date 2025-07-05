<?php $user = Auth::user(); ?>





@extends('layouts.default')
@section("title", "$user->name's Profile")
@section("content")




    <main>
        <div class="container py-4">


            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5 text-center">
                    <h1 data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?php echo "@" . $user->name; ?>">
                        <?php echo $user->email; ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                            class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                            <path
                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                        </svg>
                    </h1>
                    <p class="fs-4">Using a series of utilities, you can create this jumbotron, just like the
                        one
                        in previous versions of Bootstrap. Check out the examples below for how you can remix and
                        restyle it
                        to your liking.</p>
                </div>
            </div>

            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h2>Out for account</h2>
                    <p class="fs-5">To fully log out of your account, click the</p>
                    <form action="{{ route('logout.post') }}" method="post">
                        @csrf
                        <button class="btn btn-warning mt-3" style="min-width:140px !important" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Logout now">Logout</button>
                    </form>
                </div>
            </div>

            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h2>Create your post</h2>
                    <p class="fs-5">Create your own post, a shopping list and much more</p>
                    <form action="{{ route('views.show') }}" method="get">
                        @csrf
                        <button class="btn btn-primary mt-3" style="min-width:140px !important" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="Create Post">Create Post</button>
                    </form>
                </div>
            </div>


            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif


            <footer class="pt-3 mt-4 text-muted border-top">
                &copy; 2021
            </footer>
        </div>
    </main>








@endsection