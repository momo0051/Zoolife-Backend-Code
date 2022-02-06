<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Site Title Here</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- Google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <!-- CSS here -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/assets/css/animate.min.css">
        <link rel="stylesheet" href="/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="/assets/css/line-awesome.min.css">
        <link rel="stylesheet" href="/assets/css/meanmenu.css">
        <link rel="stylesheet" href="/assets/css/slick.css">
        <link rel="stylesheet" href="/assets/css/default.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/responsive.css">
        @yield('styles')
    </head>

    <body>
        <!-- popup -->
        <!-- add new post -->
        <div class="modal fade" id="addNewPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header pt-45">
                        <h5 class="modal-title">Add New Post</h5>
                    </div>
                    <div class="modal-body">
                        <div class="upload-box mb-40">
                            <div class="img-upload">
                                <label for="uploadIMG">
                                    <div class="upload-icon">
                                        <i class="las la-cloud-upload-alt"></i>
                                    </div>
                                    <p class="upload-text">Select a file or drag and drop here</p>
                                    <p class="upload-file-format mb-20">JPG, PNG or PDF, file size no more than 10MB</p>
                                    <div class="btn theme-btn m-auto">Upload</div>
                                </label>
                                <input type="file" id="uploadIMG" class="d-none">
                            </div>
                            <div class="show-uploaded-img">
                                <div class="single-img">
                                    <img src="/assets/img/dog.png" alt="">
                                    <span class="remove-img-btn"><i class="las la-times"></i></span>
                                </div>
                                <div class="single-img">
                                    <img src="/assets/img/dog.png" alt="">
                                    <span class="remove-img-btn"><i class="las la-times"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Add Location</label>
                                    <select id="">
                                        <option value="">Select</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Age</label>
                                    <input type="text" placeholder="Enter here">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Choose Category</label>
                                    <select id="">
                                        <option value="">Select</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Choose Subcategory</label>
                                    <select id="">
                                        <option value="">Select</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Add Post Title</label>
                                    <input type="text" placeholder="Enter here">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Vaccine Details</label>
                                    <input type="text" placeholder="Enter here">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="radio-option">
                                    <label for="">Sex</label>
                                    <div class="d-flex align-items-center gap-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="female" value="option1">
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="male" value="option2">
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="radio-option">
                                    <label for="">Passport</label>
                                    <div class="d-flex align-items-center gap-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pass-yes" value="option1">
                                            <label class="form-check-label" for="pass-yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pass-no" value="option2">
                                            <label class="form-check-label" for="pass-no">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Post Description</label>
                                    <textarea cols="10" rows="5" placeholder="Enter here"></textarea>
                                </div>
                            </div>
                            <div class="radio-option mb-30">
                                <label for="">Select Communications options:</label>
                                <div class="communication-options">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="phone" value="option1">
                                        <label class="form-check-label" for="phone">Phone</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="message" value="option2">
                                        <label class="form-check-label" for="message">Message</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="comment" value="option2">
                                        <label class="form-check-label" for="comment">Comments</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="whatsapp" value="option2">
                                        <label class="form-check-label" for="whatsapp">WhatsApp</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pb-35">
                        <button type="button" class="btn theme-btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn theme-btn">Post</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- add ne auction -->
        <div class="modal fade" id="addNewAuction" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header pt-45">
                        <h5 class="modal-title">Add New Auction</h5>
                    </div>
                    <div class="modal-body">
                        <div class="upload-box mb-40">
                            <div class="img-upload">
                                <label for="uploadIMG">
                                    <div class="upload-icon">
                                        <i class="las la-cloud-upload-alt"></i>
                                    </div>
                                    <p class="upload-text">Select a file or drag and drop here</p>
                                    <p class="upload-file-format mb-20">JPG, PNG or PDF, file size no more than 10MB</p>
                                    <div class="btn theme-btn m-auto">Upload</div>
                                </label>
                                <input type="file" id="uploadIMG" class="d-none">
                            </div>
                            <div class="show-uploaded-img">
                                <div class="single-img">
                                    <img src="/assets/img/dog.png" alt="">
                                    <span class="remove-img-btn"><i class="las la-times"></i></span>
                                </div>
                                <div class="single-img">
                                    <img src="/assets/img/dog.png" alt="">
                                    <span class="remove-img-btn"><i class="las la-times"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Add Location</label>
                                    <select id="">
                                        <option value="">Select</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Age</label>
                                    <input type="text" placeholder="Enter here">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Choose Category</label>
                                    <select id="">
                                        <option value="">Select</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Choose Subcategory</label>
                                    <select id="">
                                        <option value="">Select</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Add Auction Title</label>
                                    <input type="text" placeholder="Enter here">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Vaccine Details</label>
                                    <input type="text" placeholder="Enter here">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Add Starter Price</label>
                                    <input type="text" placeholder="Enter here">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Total Days</label>
                                    <select id="">
                                        <option value="">Select Day</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Hours</label>
                                    <select id="">
                                        <option value="">Select Hours</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="radio-option">
                                    <label for="">Sex</label>
                                    <div class="d-flex align-items-center gap-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="female" value="option1">
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="male" value="option2">
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="radio-option">
                                    <label for="">Passport</label>
                                    <div class="d-flex align-items-center gap-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pass-yes" value="option1">
                                            <label class="form-check-label" for="pass-yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pass-no" value="option2">
                                            <label class="form-check-label" for="pass-no">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="popup-form-field">
                                    <label for="">Auction Description</label>
                                    <textarea cols="10" rows="5" placeholder="Enter here"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pb-35">
                        <button type="button" class="btn theme-btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn theme-btn">Post</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- login -->
        <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header pt-45">
                        <h5 class="modal-title"><img src="/assets/img/logo.png" alt=""></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="welcome-text mb-20">
                            <h2>Welcome Back...</h2>
                            <p>We are happy to see you again! Please, Let’s Login First!</p>
                        </div>
                        <div class="row">
                            <div class="popup-form-field mb-20">
                                <label for="">Phone Number</label>
                                <input type="text" placeholder="Enter Your Number">
                            </div>
                            <div class="popup-form-field mb-20">
                                <label for="">Password</label>
                                <input type="text" placeholder="Enter Your Password">
                            </div>
                        </div>
                        <div class="login-action-link text-end mb-30">
                            <a href="#">Forgot Password?</a>
                        </div>
                        <a href="#" class="btn theme-btn btn-block w-auto">Login</a>
                    </div>
                    <div class="modal-footer justify-content-center pb-35">
                        <div class="login-action-link text-center">
                            <span>Don’t have an account? <a href="#" style="color: var(--theme-color);" data-bs-toggle="modal" data-bs-target="#signup">Register Now?</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- signup -->
        <div class="modal fade" id="signup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header pt-45">
                        <h5 class="modal-title"><img src="/assets/img/logo.png" alt=""></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="welcome-text mb-20">
                            <h2>Hi There!</h2>
                            <p>We are happy to see you want to join you Please, Let’s sign up first!</p>
                        </div>
                        <div class="row">
                            <div class="popup-form-field mb-20">
                                <label for="">Phone Number</label>
                                <input type="text" placeholder="Enter Your Number">
                            </div>
                            <div class="popup-form-field mb-20">
                                <label for="">Username</label>
                                <input type="text" placeholder="Enter Your Username">
                            </div>
                            <div class="popup-form-field mb-20">
                                <label for="">Password</label>
                                <input type="text" placeholder="Enter Your Password">
                            </div>
                        </div>
                        <a href="#" class="btn theme-btn btn-block w-auto">Sign up</a>
                    </div>
                    <div class="modal-footer justify-content-center pb-35">
                        <div class="login-action-link text-center">
                            <span>You already have account? <a href="#" style="color: var(--theme-color);" data-bs-toggle="modal" data-bs-target="#login">Log In</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header -->
        <header class="header-area">
            <div class="main-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2">
                            <div class="logo">
                                <a href="#" class="d-inline-block brand-logo">
                                    <img src="/assets/img/logo.png" alt="">
                                </a>
                                <div class="user-action-btn">
                                    <nav>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="/assets/img/icons/Search.svg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addNewPost">
                                                    <img src="/assets/img/icons/Plus-dark.svg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addNewAuction">
                                                    <img src="/assets/img/icons/Auction-dark.svg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <div class="lang-switcher">
                                                    <div class="lang">ENG<i class="las la-angle-down"></i></div>
                                                    <div class="lang-dropdown">
                                                        <div class="lang-option" id="eng">ENG</div>
                                                        <div class="lang-option" id="ar">AR</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="chat.html">
                                                    <img src="/assets/img/icons/Chat.svg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="notification.html">
                                                    <img src="/assets/img/icons/Notification.svg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="main-menu-toggle">
                                                    <img src="/assets/img/icons/Menu.svg" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-10">
                            <div class="header-menu-content">
                                <nav>
                                    <ul>
                                        <li>
                                            <div class="search-form">
                                                <div class="search-icon">
                                                    <img src="/assets/img/icons/search.svg" alt="">
                                                </div>
                                                <input type="search" placeholder="Search">
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="theme-bg btn btn-outline"
                                                data-bs-toggle="modal" data-bs-target="#addNewPost"><img
                                                    src="/assets/img/icons/plus.svg" alt="" class="me-2">
                                                Add Post</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="theme-bg" data-bs-toggle="modal" data-bs-target="#addNewAuction">
                                                <img src="/assets/img/icons/Auction.svg" alt="" class="me-2">
                                                Auction</a>
                                        </li>
                                        <li>
                                            <div class="lang-switcher">
                                                <div class="lang">ENG<i class="las la-angle-down"></i></div>
                                                <div class="lang-dropdown">
                                                    <div class="lang-option" id="eng">ENG</div>
                                                    <div class="lang-option" id="ar">AR</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="chat.html">
                                                <img src="/assets/img/icons/Chat.svg" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="notification.html">
                                                <img src="/assets/img/icons/Notification.svg" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="main-menu-toggle">
                                                <img src="/assets/img/icons/Menu.svg" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar -->
            <div class="off-canvas-menu off-canvas-main-menu custom-scrollbar-styled">
                <div class="off-canvas-menu-close">
                    <i class="las la-times-circle"></i>
                </div>
                <ul class="off-canvas-menu-list pt-90">
                    <li>
                        <a href="#">
                            <div class="off-canvas-icon"><i class="lar la-heart"></i></div>
                            Favorites
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="off-canvas-icon"><i class="lar la-user"></i></div>
                            My posts
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="off-canvas-icon"><i class="las la-plus"></i></div>
                            add new post
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="off-canvas-icon"><i class="lar la-user"></i></div>
                            My auction
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="off-canvas-icon"><i class="las la-plus"></i></div>
                            add new auction
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="off-canvas-icon"><i class="las la-truck"></i></div>
                            Delivery post
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="off-canvas-icon"><i class="las la-bullhorn"></i></div>
                            Banned ads
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="off-canvas-icon"><i class="las la-user-shield"></i></div>
                            Terms & Policy
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="off-canvas-icon"><i class="las la-phone"></i></div>
                            Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#login">
                            <div class="off-canvas-icon"><i class="las la-sign-in-alt"></i></div>
                            Log out
                        </a>
                    </li>
                </ul>
            </div>
        </header>

        <div class="page-body">
            @yield('content')
        </div>

        <!-- footer -->
        <footer class="footer-area">
            <div class="main-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-5 mb-30">
                            <div class="footer-widget">
                                <div class="footer-logo mb-30">
                                    <a href="#"><img src="/assets/img/logo.png" alt=""></a>
                                </div>
                                <p class="footer-text">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry.</p>
                                <div class="social-icons">
                                    <a href="#"><i class="lab la-facebook-f"></i></a>
                                    <a href="#"><i class="lab la-linkedin-in"></i></a>
                                    <a href="#"><i class="lab la-twitter"></i></a>
                                    <a href="#"><i class="lab la-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 offset-xl-1 mb-30">
                            <div class="footer-widget">
                                <h4 class="widget-title">Help</h4>
                                <ul class="site-map">
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Content Policy</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 mb-30">
                            <div class="footer-widget">
                                <h4 class="widget-title">More</h4>
                                <ul class="site-map">
                                    <li><a href="#">Communities</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="#">FAQs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <div class="footer-widget">
                                <div class="app-download">
                                    <a href="#"><img src="/assets/img/playstore.png" alt=""></a>
                                    <a href="#"><img src="/assets/img/appstore.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer">
                <span>Company Name Inc @2022. All Rights Reserved</span>
            </div>
        </footer>

        <!-- JS here -->
        <script src="/assets/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="/assets/js/popper.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/owl.carousel.min.js"></script>
        <script src="/assets/js/isotope.pkgd.min.js"></script>
        <script src="/assets/js/one-page-nav-min.js"></script>
        <script src="/assets/js/slick.min.js"></script>
        <script src="/assets/js/jquery.meanmenu.min.js"></script>
        <script src="/assets/js/ajax-form.js"></script>
        <script src="/assets/js/wow.min.js"></script>
        <script src="/assets/js/jquery.scrollUp.min.js"></script>
        <script src="/assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="/assets/js/plugins.js"></script>
        <script src="/assets/js/main.js"></script>
        @yield('scripts')
    </body>

</html>
