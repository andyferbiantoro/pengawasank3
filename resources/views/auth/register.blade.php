<!DOCTYPE html>
<html lang="en">

<head>

    @section('title')
    Register
    @endsection

    @include('partials.header')

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block "><img src="{{asset('public/admin_master/img/logo_pln.jpg')}}" style="height: 500px;"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register</h1>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                            <form class="user" action="{{route('proses-register')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">

                                    <input type="text" class="form-control " id="name" name="name" placeholder="Nama Lengkap">

                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control " id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" required autocomplete="password">
                                        </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="repassword" class="form-control  @error('password') is-invalid @enderror" required autocomplete="password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Register</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="" style="color: black;" href="{{route('login')}}"><b>Login</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    @include('partials.footer')

</body>

</html>