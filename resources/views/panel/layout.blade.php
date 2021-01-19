<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>مسؤول الأرجواني</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{asset('css/panel/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('css/panel/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/panel/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('css/panel/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../assets/images/favicon.png"/>
</head>
<body class="rtl">
<div class="container-scroller">
    <!-- navbar starts here -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="../../index.html">
                {{--<img src="../../../assets/images/logo.svg" alt="logo"/></a>--}}

            <a class="navbar-brand brand-logo-mini" href="../../index.html">
                {{--<img src="../../../assets/images/logo-mini.svg" alt="logo"/>--}}
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <div class="search-field d-none d-md-block">
                <form class="d-flex align-items-center h-100" action="#">
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control border-0" placeholder="جستجو">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav navbar-nav-right pr-0">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle " id="profileDropdown" href="#" data-toggle="dropdown"
                       aria-expanded="false">
                        <div class="nav-profile-img">
                            {{--<img src="../../../assets/images/faces/face1.jpg" alt="image">--}}
                            <i class="far fa-user"></i>
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">محراب کریم پور</p>
                        </div>
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-cached mr-2 text-success"></i> سجل النشاطات </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-logout mr-2 text-primary"></i> خروج </a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                       data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-comment-dollar"></i>
                        <span class="count-symbol bg-warning"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                         aria-labelledby="messageDropdown">
                        <h6 class="p-3 mb-0">رسائل</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="../../../assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">مارك يرسل لك رسالة</h6>
                                <p class="text-gray mb-0"> منذ 1 دقيقة </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="../../../assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">كريغ نرسل لك رسالة</h6>
                                <p class="text-gray mb-0"> منذ 15 دقيقة </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="../../../assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">تحديث صورة الملف
                                    الشخصي</h6>
                                <p class="text-gray mb-0"> منذ 18 دقيقة </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">4 رسائل جديدة</h6>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                       data-toggle="dropdown">
                        <i class="far fa-envelope"></i>
                        <span class="count-symbol bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                         aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0">إخطارات</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-calendar"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">حدث اليوم</h6>
                                <p class="text-gray ellipsis mb-0"> مجرد تذكير بأن لديك حدث اليوم </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="fas fa-cog"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">الإعدادات</h6>
                                <p class="text-gray ellipsis mb-0"> تحديث لوحة القيادة </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-link-variant"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">إطلاق المسؤول</h6>
                                <p class="text-gray ellipsis mb-0"> مشرف جديد نجاح باهر! </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">اطلع على جميع الإشعارات</h6>
                    </div>
                </li>
                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-format-line-spacing"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- ends here -->
    <div class="container-fluid page-body-wrapper">
        <!-- settings-panel starts here -->
        <div id="settings-trigger">
            <i class="fas fa-cog"></i>
        </div>
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <ul class="nav nav-tabs bg-gradient-primary" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                       aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                       aria-controls="chats-section">دردشة</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                     aria-labelledby="todo-section">
                    <div class="add-items d-flex px-3 mb-0">
                        <form class="form w-100">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control todo-list-input"
                                       placeholder="إضافة إلى القيام به">
                                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">
                                    إضافة
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="list-wrapper px-3">
                        <ul class="d-flex flex-column-reverse todo-list">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> اجتماع مراجعة الفريق في 3:00
                                        مساءً</label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> الاستعداد للعرض التقديمي </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> حل جميع التذاكر ذات الأولوية المنخفضة
                                        المستحقة اليوم</label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked> جدول اجتماع الأسبوع المقبل
                                    </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked> استعراض المشاريع</label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="events py-4 border-bottom px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                            <span>11 فبراير 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">إنشاء صفحة المكون</p>
                        <p class="text-gray mb-0">بناء التطبيق على أساس شبيبة</p>
                    </div>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                            <span>7 فبراير 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">لقاء مع أليسا</p>
                        <p class="text-gray mb-0 ">استدعاء سارة القبور</p>
                    </div>
                </div>
                <!-- To do section tab ends -->
                <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">اصحاب</p>
                        <small
                            class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">اظهار
                            الكل</small>
                    </div>
                    <ul class="chat-list">
                        <li class="list active">
                            <div class="profile"><img src="../../../assets/images/faces/face1.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>توماس دوغلاس</p>
                                <p>متاح</p>
                            </div>
                            <small class="text-muted my-auto">19 دقيقة</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../../../assets/images/faces/face2.jpg" alt="image"><span
                                    class="offline"></span></div>
                            <div class="info">
                                <div class="wrapper d-flex">
                                    <p>كاثرين</p>
                                </div>
                                <p>بعيدا</p>
                            </div>
                            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                            <small class="text-muted my-auto">23 دقيقة</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../../../assets/images/faces/face3.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>دانيال راسل</p>
                                <p>متاح</p>
                            </div>
                            <small class="text-muted my-auto">14 دقيقة</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../../../assets/images/faces/face4.jpg" alt="image"><span
                                    class="offline"></span></div>
                            <div class="info">
                                <p>جيمس ريتشاردسون</p>
                                <p>بعيدا</p>
                            </div>
                            <small class="text-muted my-auto">2 دقيقة</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../../../assets/images/faces/face5.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>مادلين كينيدي</p>
                                <p>متاح</p>
                            </div>
                            <small class="text-muted my-auto">5 دقائق</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../../../assets/images/faces/face6.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>مقابر سارة</p>
                                <p>متاح</p>
                            </div>
                            <small class="text-muted my-auto">47 دقيقة</small>
                        </li>
                    </ul>
                </div>
                <!-- chat tab ends -->
            </div>
        </div>
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">جلود جانبية</p>
            <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div>
                افتراضي
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div>
                داكن
            </div>
            <p class="settings-heading mt-2">جلد الرأس</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles primary"></div>
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles default light"></div>
            </div>
        </div>
        <!-- ends here -->
        <!-- sidebar starts here -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            {{--<img src="../../../assets/images/faces/face1.jpg" alt="profile">--}}

                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            {{--<span class="font-weight-bold mb-2">ديفيد جراي. H</span>
                            <span class="text-secondary text-small">مدير المشروع</span>--}}
                            <i class="fab fa-reddit" style="font-size: 42px"></i>
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between" href="../../index.html">
                        <span class="menu-title">
                            <i class="fas fa-house-user"></i>
                            صفحه ی نخست
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between" href="../../index.html">
                        <span class="menu-title">
                            <i class="far fa-id-card"></i>
                            ویرایش پروفایل
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                       aria-controls="page-layouts">
                        <span class="menu-title">
                            <i class="fas fa-laptop"></i>
                            کلاس انلاین
                        </span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="collapse" id="page-layouts">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/layout/boxed-layout.html">
                                    صندوق
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/layout/rtl-layout.html">
                                    ار تي ال
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between" data-toggle="collapse" href="#apps" aria-expanded="false" aria-controls="apps">
                        <span class="menu-title">
                            <i class="far fa-newspaper"></i>
                            رفع اشکال افلاین
                        </span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="collapse" id="apps">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/apps/kanban-board.html">
                                    كانبان بحري
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/apps/todo.html">
                                    عمل قائمة
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/apps/tickets.html">
                                    تذاكر
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../pages/apps/chats.html">
                                    دردشات
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between" href="../../pages/samples/widgets.html">
                        <span class="menu-title">
                            <i class="fas fa-user-tie"></i>
                            دبیران محبوب
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false"
                       aria-controls="sidebar-layouts">
                        <span class="menu-title">
                            <i class="fas fa-headset"></i>
                            پشتیبانی
                        </span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="collapse" id="sidebar-layouts">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="../../pages/layout/compact-menu.html">القائمة
                                    المدمجة</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/layout/sidebar-collapsed.html">قائمة
                                    الرموز</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/layout/sidebar-hidden.html">الشريط
                                    الجانبي المخفية</a></li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="../../pages/layout/sidebar-hidden-overlay.html">تراكب الشريط
                                    الجانبي</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/layout/sidebar-fixed.html">الشريط
                                    الجانبي ثابت</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                       aria-controls="ui-basic">

                        <span class="menu-title">
                            <i class="fas fa-file-invoice-dollar"></i>
                            حسابداری
                        </span>
                        <span>
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="../../pages/ui-features/accordions.html">أكورديون</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/ui-features/buttons.html">زر</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="../../pages/ui-features/badges.html">شارات</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/ui-features/breadcrumbs.html">فتات
                                    الخبز</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/ui-features/dropdowns.html">هبوط
                                    قطرة</a></li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="../../pages/ui-features/modals.html">نموذج</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/ui-features/progress.html">شريط
                                    التقدم</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/ui-features/pagination.html">ترقيم
                                    الصفحات</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/ui-features/tabs.html">علامات
                                    التبويب</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/ui-features/typography.html">طباعة</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="../../pages/ui-features/tooltips.html">تلميح</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between" data-toggle="collapse" href="#ui-advanced" aria-expanded="false"
                       aria-controls="ui-advanced">
                        <span class="menu-title">
                            <i class="fas fa-bullseye"></i>
                            راهنما
                        </span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="collapse" id="ui-advanced">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link"
                                                    href="../../pages/ui-features/dragula.html">Dragula</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/ui-features/clipboard.html">الحافظة</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/ui-features/context-menu.html">قائمة
                                    السياق</a></li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="../../pages/ui-features/slider.html">المنزلق</a></li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="../../pages/ui-features/colcade.html">Colcade</a></li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="../../pages/ui-features/carousel.html">دائري</a></li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="../../pages/ui-features/loaders.html">رافعات</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../pages/ui-features/treeview.html">عرض
                                    الشجرة</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between" href="../../pages/ui-features/popups.html">
                        <span class="menu-title">
                            <i class="fas fa-sign-out-alt"></i>
                            خروج
                        </span>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- ends here -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> ار تي ال </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">تخطيطات الصفحة</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ار تي ال</li>
                        </ol>
                    </nav>
                </div>


            </div>
            <!-- content-wrapper ends -->
            <!-- footer starts here-->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">حقوق الطبع والنشر © 2017 <a
                            href="https://www.bootstrapdash.com/"
                            target="_blank">BootstrapDash</a>. كل الحقوق محفوظة.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">مصنوعة يدويا ومصنوعة من <i
                            class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
            <!-- ends here -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<script src="{{asset('js/panel/panel.js')}}"></script>
<!-- container-scroller -->
<!-- plugins:js -->
{{--<script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../../assets/vendors/chart.js/Chart.min.js"></script>
<script src="../../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../../assets/js/off-canvas.js"></script>
<script src="../../../assets/js/hoverable-collapse.js"></script>
<script src="../../../assets/js/misc.js"></script>
<script src="../../../assets/js/settings.js"></script>
<script src="../../../assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="../../../assets/js/dashboard.js"></script>--}}
<!-- End custom js for this page -->
</body>
</html>
