<!-- NFTMax Admin Menu -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .support-badge {
        background: #dc3545;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 11px;
        font-weight: 600;
        margin-left: 8px;
        min-width: 18px;
        height: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
    }

    .support-menu-item {
        position: relative;
    }
</style>
<div class="nftmax-smenu">
    <div class="logo" style="padding: 30px 50px 10px;">
        <a href="{{ url('/') }}">
            <img class="nftmax-logo__main" src="{{ asset('assets/images/vega-logo.png') }}" alt="logo" style="width: 93%;">

        </a>

        <div class="logo-two">
            <img src="{{ asset('assets/img/logos/logosm.png') }}" alt="img">
        </div>
        <div class="nftmax__sicon close-icon">
            <span>
                <svg width="16" height="40" viewBox="0 0 16 40" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 10C0 4.47715 4.47715 0 10 0H16V40H10C4.47715 40 0 35.5228 0 30V10Z" fill="#ff00ff">
                    </path>
                    <path d="M10 15L6 20.0049L10 25.0098" stroke="#ffffff" stroke-width="1.2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </span>
        </div>
    </div>

    <!-- Admin Menu -->
    <div class="admin-menu">
        <!-- Logo -->

        <!-- Author Details -->
        <div class="admin-menu__one">
            <!-- Nav Menu -->
            <div class="menu-bar">
                <ul class="sidebar_nav">

                    <li class="menu-main">
                        <a href="{{ route('admin.dashboard') }}"
                            class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <div class="has-child-main">
                                <div class="has-child-main-inner">
                                    <div class="has-child-icon">
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <div class="has-child-text">
                                        <span>Dashboards</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="menu-main">
                        <a href="{{ route('admin.contact.management') }}"
                            class="{{ request()->routeIs('admin.contact.management') ? 'active' : '' }}">
                            <div class="has-child-main">
                                <div class="has-child-main-inner">
                                    <div class="has-child-icon">
                                        <i class="fa-solid fa-address-book"></i>
                                    </div>
                                    <div class="has-child-text">
                                        <span>Contact Management</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="menu-main support-menu-item">
                        <a href="{{ route('admin.category.list') }}"
                            class="{{ request()->routeIs('admin.category.list') ? 'active' : '' }}">
                            <div class="has-child-main">
                                <div class="has-child-main-inner">
                                    <div class="has-child-icon">
                                       <i class="fa-solid fa-list"></i>
                                    </div>
                                    <div class="has-child-text">
                                        <span>Category Management</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </li>
                    <li class="menu-main support-menu-item">
                        <a href="{{ route('admin.blogs.list') }}"
                            class="{{ request()->routeIs('admin.blogs.list') ? 'active' : '' }}">
                            <div class="has-child-main">
                                <div class="has-child-main-inner">
                                    <div class="has-child-icon">
                                     <i class="fa-solid fa-list"></i>
                                    </div>
                                    <div class="has-child-text">
                                        <span>Blog Management</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </li>

                </ul>
            </div>
            <!-- End Nav Menu -->
        </div>




        <!-- Unlimited Cashback -->


        <!-- rights-part  -->

    </div>
    <!-- End Admin Menu -->
</div>
<!-- End NFTMax Admin Menu -->