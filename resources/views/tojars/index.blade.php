<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="generator" content="Hugo 0.88.1" />
    <title>جمعية تجار  قطع الغيار </title>
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
        <a class="navbar-brand me-0" href="#">جمعية تجار قطع الغيار و السيارات والمعدات الثقيلة</a>
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
        <nav id="sidebarMenu" class="d-md-block sidebar collapse">
            <div class="position-sticky pt-3">
                <div class="logo-darkmode">
                    <a class="navbar-brand me-0" href="#">
                        <span style="color: var(--main-color); display: block">جمعية تجار</span>
                    </a>

                    <button class="btn-menu">
                        <i class="fa-solid fa-arrow-right fa-lg"></i>
                        <i
                            class="fa-solid fa-arrow-left fa-lg"
                            style="display: none"
                        ></i>
                    </button>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{URL('/')}}">
                            <i class="fa-solid fa-home"></i>
                            <span class="nav-link-name">الصفحة الرئيسية</span>
                        </a>
                    </li>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{URL('add')}}">
                                <i class="fa-solid fa-home"></i>
                                <span class="nav-link-name">أضافه طلب</span>
                            </a>
                        </li>
                    </ul>


                    <li class="nav-item">
                        <a
                            id="logout"
                            class="nav-link logout"
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#exitModal">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span class="nav-link-name">تسجيل الخروج</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="main-content">
            <iframe
                src="{{URL('tojar')}}"
                width="100%"
                height="100%"
            ></iframe>
        </main>
    </div>
</div>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/all.min.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
</body>
</html>

