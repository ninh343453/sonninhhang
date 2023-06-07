
<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
<<<<<<< HEAD
                    <h3>Sign In</h3>
=======
                    <h3>Login</h3>
>>>>>>> 01b2522af4ad057659b54a5880b3c3af6c9b8e36
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            @if ($errors->has('email'))
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            @endif
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        @if (session('error'))
                        <div class="text-danger">{{ session('error') }}</div>
                    @endif
                        <div class="row align-items-center remember">
                            <input type="checkbox" name="remember">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="{{ route('welcome.register') }}">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>

            </div>

        </div>

    </div>

<<<<<<< HEAD
</body>

</html>
=======
</body>
>>>>>>> 01b2522af4ad057659b54a5880b3c3af6c9b8e36
