<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href='{{asset("admin/vendor/font-awesome-4.7/css/font-awesome.min.css")}}' rel="stylesheet" media="all">
    <link href='{{asset("admin/vendor/font-awesome-5/css/fontawesome-all.min.css")}}' rel="stylesheet" media="all">
    <link href='{{asset("admin/vendor/mdi-font/css/material-design-iconic-font.min.css")}}' rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href='{{asset("admin/vendor/bootstrap-4.1/bootstrap.min.css")}}' rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href='{{asset("admin/vendor/animsition/animsition.min.css")}}' rel="stylesheet" media="all">
    <link href='{{asset("admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css")}}' rel="stylesheet" media="all">
    <link href={{asset("admin/vendor/wow/animate.css")}} rel="stylesheet" media="all">
    <link href={{asset("admin/vendor/css-hamburgers/hamburgers.min.css")}} rel="stylesheet" media="all">
    <link href={{asset("admin/vendor/slick/slick.css")}} rel="stylesheet" media="all">
    <link href={{asset("admin/vendor/select2/select2.min.css")}} rel="stylesheet" media="all">
    <link href={{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}} rel="stylesheet" media="all">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Main CSS-->
    <link href={{asset("admin/css/theme.css")}} rel="stylesheet" media="all">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous"> --}}
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src={{asset("admin/images/icon/logo.png")}} alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        {{-- <li class="active has-sub">
                            <a class="js-arrow" href="index.html">
                                <i class="fas fa-tachometer-alt"></i>Home Page

                            </a>
                        </li> --}}
                        <li>
                            <a href="{{route("category#list")}}">
                                <i class="fas fa-chart-bar"></i>Category</a>
                        </li>
                        <li>
                            <a href="{{route("product#list")}}">
                                <i class=" zmdi zmdi-pizza"></i>  Products</a>
                        </li>
                        <li>
                            <a href="{{route("order#orderListPage")}}">
                                <i class=" zmdi zmdi-chart"></i> Orders</a>
                        </li>
                        <li>
                            <a href="{{route("admin#userListPage")}}">
                                <i class=" zmdi zmdi-pocket"></i>Users</a>
                        </li>
                        <li>
                            <a href="{{route("admin#mailListPage")}}">
                                <i class=" zmdi zmdi-email"></i>Mails</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="header-wrap">
                            {{-- <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form> --}}
                            <h3>This is Admin Path.</h3>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            {{-- <img src={{asset("admin/images/icon/avatar-01.jpg")}} alt="John Doe" /> --}}
                                            @if (Auth::user()->user_img === null)
   <img src={{asset("img/account-icon-png-2.jpg")}} style=" width: 40px; height:40px" alt="">
@else
<img src='{{asset("storage/".Auth::user()->user_img)}}'  style=" width: 40px; height:40px"  alt="John Doe" />
@endif
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        @if (Auth::user()->user_img === null)
                                                        <img src={{asset("img/account-icon-png-2.jpg")}} style=" width: 50px; height:50px" alt="">
                                                     @else
                                                     <img src='{{asset("storage/".Auth::user()->user_img)}}'  style=" width: 50px; height:50px"  alt="John Doe" />
                                                     @endif
                                                        {{-- <img src={{asset("admin/images/icon/avatar-01.jpg")}} alt="John Doe" /> --}}
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{Auth::user()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{Auth::user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{route("account#details")}}">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                        <a href={{route("changePasswordPage")}}>
                                                            <i class=" zmdi zmdi-key"></i>Change Password
                                                        </a>
                                                        <a href="{{route("account#list")}}">
                                                        <i class=" zmdi zmdi-accounts"></i> Admin Accounts
                                                        </a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                               <form action='{{route("logout")}}' method="POST">
                                            @csrf
                                          <button type="submit" class=" btn bg-dark col-10 offset-1 text-white ">
                                            <i class=" me-2  zmdi zmdi-power"></i>Logout
                                          </button>
                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            {{-- <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Product List</h2>

                                    </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="category.html">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item
                                        </button>
                                    </a>
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        CSV download
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>description</th>
                                            <th>date</th>
                                            <th>status</th>
                                            <th>price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr-shadow">
                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">lori@example.com</span>
                                            </td>
                                            <td class="desc">Samsung S8 Black</td>
                                            <td>2018-09-27 02:12</td>
                                            <td>
                                                <span class="status--process">Processed</span>
                                            </td>
                                            <td>$679.00</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">

                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">john@example.com</span>
                                            </td>
                                            <td class="desc">iPhone X 64Gb Grey</td>
                                            <td>2018-09-29 05:57</td>
                                            <td>
                                                <span class="status--process">Processed</span>
                                            </td>
                                            <td>$999.00</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">

                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">lyn@example.com</span>
                                            </td>
                                            <td class="desc">iPhone X 256Gb Black</td>
                                            <td>2018-09-25 19:03</td>
                                            <td>
                                                <span class="status--denied">Denied</span>
                                            </td>
                                            <td>$1199.00</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">

                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">doe@example.com</span>
                                            </td>
                                            <td class="desc">Camera C430W 4k</td>
                                            <td>2018-09-24 19:10</td>
                                            <td>
                                                <span class="status--process">Processed</span>
                                            </td>
                                            <td>$699.00</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div> --}}
            @yield('content')
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src={{asset("admin/vendor/jquery-3.2.1.min.js")}}></script>
    <!-- Bootstrap JS-->
    <script src={{asset("admin/vendor/bootstrap-4.1/popper.min.js")}}></script>
    <script src={{asset("admin/vendor/bootstrap-4.1/bootstrap.min.js")}}></script>
    <!-- Vendor JS       -->
    <script src={{asset("admin/vendor/slick/slick.min.js")}}>
    </script>
    <script src={{asset("admin/vendor/wow/wow.min.js")}}></script>
    <script src={{asset("admin/vendor/animsition/animsition.min.js")}}></script>
    <script src={{asset("admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js")}}>
    </script>
    <script src={{asset("admin/vendor/counter-up/jquery.waypoints.min.js")}}></script>
    <script src={{asset("admin/vendor/counter-up/jquery.counterup.min.js")}}>
    </script>
    <script src={{asset("admin/vendor/circle-progress/circle-progress.min.js")}}></script>
    <script src={{asset("admin/vendor/perfect-scrollbar/perfect-scrollbar.js")}}></script>
    <script src={{asset("admin/vendor/chartjs/Chart.bundle.min.js")}}></script>
    <script src={{asset("admin/vendor/select2/select2.min.js")}}>
    </script>


{{-- bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Main JS-->
    <script src={{asset("admin/js/main.js")}}></script>

{{-- jquery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
@yield("jqueryContext")
</html>
<!-- end document-->
