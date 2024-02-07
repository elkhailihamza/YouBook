@extends('layouts.reg')

@section('reg_content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div style="width: 425px;">
            <div class="text-center">
                <h3>Register</h3>
            </div>
            <form action="" class="form-group mt-4">
                @csrf
                @method('post')
                <div class="container d-grid gap-4 mb-4">
                    <div class="row">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" required class="form-control" name="First-name" id="fname" placeholder="First Name" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" required class="form-control" name="Last-name" id="lname" placeholder="Last Name" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-outline">
                                <input type="email" required class="form-control" name="email" id="email" placeholder="Email" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-outline">
                                <input type="password" required class="form-control" name="pass" id="pass"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="password" required class="form-control" name="cpass" id="cpass"
                                    placeholder="Confirm" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ms-2">
                    <span>Already have an Account? <a href="{{ route('auth.login') }}">Sign-in</a></span>
                </div>
                <div class="row justify-content-center mt-5">
                    <button type="submit" class="btn btn-primary btn-block col-4">
                        Sign-up
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop