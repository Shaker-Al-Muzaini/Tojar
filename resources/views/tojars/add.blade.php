@extends('layouts.main')
@section('bott')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <!DOCTYPE html>
    <html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="generator" content="Hugo 0.88.1" />
        <title>جمعية تجار قطع الغيار</title>
        <!-- Fontawesome -->
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
        <!-- Bootstrap CSS -->
        <link href="{{asset('css/bootstrap.rtl.min.css')}}" rel="stylesheet" />
        <!-- Google Fonts Cairo -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400&display=swap"
            rel="stylesheet"
        />
        <!-- Google Fonts Reem Kufi -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Reem+Kufi:wght@400;500;700&display=swap"
            rel="stylesheet"
        />
        <!-- Custom styles -->
        <link href="{{asset('css/dashboard.rtl.css')}}" rel="stylesheet" />
    </head>
    <body>
    <header class="navbar navbar-dark flex-md-nowrap shadow">
        <button
            class="navbar-toggler d-md-none collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu"
            aria-expanded="false"
            aria-label="عرض/إخفاء لوحة التنقل"
        >
            <i class="fa-solid fa-bars fa-xl"></i>
        </button>
        <div class="my-logo">
            <a class="navbar-brand me-0" href="#">جمعية تجار قطع الغيار</a>
        </div>
    </header>
    <!-- EXIT MODAL -->
    <div
        class="modal fade"
        id="exitModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">هل تريد تسجيل الخروج؟</div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        لا
                    </button>
                    <button type="button" class="btn btn-primary">نعم</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row main-row">
            <nav id="sidebarMenu" class="d-md-flex sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="logo-darkmode">
                        <a class="navbar-brand me-0" href=""
                        > جمعية تجار  <span style="color: var(--main-color); display: block"
                            > قطع الغيار</span
                            ></a
                        >
                        <button class="btn-compressed">
                            <div class="arrow-right">
                                <i class="fa-solid fa-arrow-right fa-lg"></i>
                            </div>
                            <div class="arrow-left" style="display: none">
                                <i class="fa-solid fa-arrow-left fa-lg"></i>
                            </div>
                        </button>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a id="home-link" href="{{URL('/')}}" class="nav-link " aria-current="page" title="الصفحة الرئيسية">
                                <i class="fa-solid fa-home"></i>
                                <span class="nav-link-name">الصفحة الرئيسية</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="tubes-link" class="nav-link active" title="أضافه جديد" href="{{URL('add')}}">
                                <i
                                    class="fa-solid fa-circle-plus"
                                    style="margin-right: 2px"
                                ></i>
                                <span class="nav-link-name">أضافه جديد</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="store-link" class="nav-link" title="المخزن">

                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="customers-link" class="nav-link" title="الزبائن">

                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="branches-link" class="nav-link" title="الفروع">

                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="distribution-link" class="nav-link" title="التوزيع">

                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="employees-link" class="nav-link" title="الموظفين">
                            </a>
                        </li>
                    </ul>
                </div>
                <a
                    id="logout"
                    class="nav-link logout"
                    data-bs-toggle="modal"
                    data-bs-target="#exitModal"
                >
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </nav>
            <main class="main-content">
                <iframe
                    src="{{URL('tojar/create')}}"
                    width="100%"
                    height="100%">
                </iframe>
            </main>
        </div>
    </div>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    </body>
    </html>


@stop
