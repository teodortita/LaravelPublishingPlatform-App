@extends('layouts.master')

@section('content')
    <div class="container slideBottom">
        <div class="row align-items-center bg-animated border border-info rounded">
            <div class="col-lg-6">
                <div class="p-5 text-center text-md-left">
                    <h2 class="display-4 pb-3">Welcome!</h2>
                    <p class="lead">Start browsing Financegram now for the latest financial articles and
                    hassle-free publishing of your own content regarding this industry.</p>
                </div>
            </div>

            <div class="col-lg-4 p-4 p-md-5 text-secondary w-50 m-auto mw-md-100">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paste" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-paste fa-w-14 fa-5x"><path fill="currentColor" d="M128 184c0-30.879 25.122-56 56-56h136V56c0-13.255-10.745-24-24-24h-80.61C204.306 12.89 183.637 0 160 0s-44.306 12.89-55.39 32H24C10.745 32 0 42.745 0 56v336c0 13.255 10.745 24 24 24h104V184zm32-144c13.255 0 24 10.745 24 24s-10.745 24-24 24-24-10.745-24-24 10.745-24 24-24zm184 248h104v200c0 13.255-10.745 24-24 24H184c-13.255 0-24-10.745-24-24V184c0-13.255 10.745-24 24-24h136v104c0 13.2 10.8 24 24 24zm104-38.059V256h-96v-96h6.059a24 24 0 0 1 16.97 7.029l65.941 65.941a24.002 24.002 0 0 1 7.03 16.971z" class=""></path></svg>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2">
                <div class="p-5 text-center">
                    <h2 class="display-4 themeColor pb-3">Browse & write</h2>
                    <p class="lead">Access the articles section and optionally register an account 
                    to receive additional in-app notifications about newly published pieces 
                    written here using a powerful embedded text editor.</p>
                </div>
                
                <hr>
            </div>
        </div>
    </div>
@endsection