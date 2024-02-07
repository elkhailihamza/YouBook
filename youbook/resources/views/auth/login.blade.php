@extends('auth.layouts.reg')

@section('reg_content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div style="width: 375px;">
            <div class="text-center">
                <h3>Login</h3>
            </div>
            <form action="" class="form-group mt-4">
                @csrf
                @method('post')
                <div class="row justify-content-center">
                    <div class="col-12 p-0">
                        <div class="form-outline mb-3 mt-4">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                        </div>
                        <div class="form-outline mb-5">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <span>Don't have an account? <a href="{{ route('auth.register') }}">Sign-up</a> now!</span>
                </div>
                <div class="row justify-content-center mt-5">
                    <button class="btn btn-primary btn-block col-4">
                        Log-in
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop