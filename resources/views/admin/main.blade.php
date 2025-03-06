<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.head')
    </head>
    <body>
        <div id="app">
            @include('admin.sidebar')
            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
    
                <div class="page-heading">
                    <h3>{{$tiltle}}</h3>
                </div>
                <div class="page-content">
                    <section class="row">

                        @include('admin.alert')

                        <div class="col-12 col-lg-9">
                            <div class="row">
                                @yield('content')
                            </div>
                            </div>
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-body py-4 px-5">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <img src="/Template/admin/assets/images/faces/1.jpg" alt="Face 1">
                                        </div>
                                        <div class="ms-3 name">
                                            <h5 class="font-bold">Tuấn Anh Trịnh</h5>
                                            <h6 class="text-muted mb-0">@tuananh</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
       @include('admin.footer')
    </body>
</html>
