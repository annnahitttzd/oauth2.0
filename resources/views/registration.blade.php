<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet"/>
    <title>Registration</title>
</head>
<form method="POST" action="{{route('registration')}}">
    @csrf
<section class="vh-100" style="background-color: #2779e2;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                        <hr class="mx-n3">
                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">
                                <h6 class="mb-0">Email address</h6>
                            </div>
                            <div class="col-md-9 pe-5">
                                <input name="email" type="email" class="form-control form-control-lg" placeholder="example@example.com" />
                            </div>
                        </div>
                        <hr class="mx-n3">
                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-md-9 pe-5">
                                <input name="password" type="password" class="form-control form-control-lg" placeholder="" />
                            </div>
                        </div>
                        <hr class="mx-n3">
                        <div class="px-5 py-4">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
