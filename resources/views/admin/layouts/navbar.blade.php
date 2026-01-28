<header class="nftmax-header">
     <div class="container-fluid">
         <div class="row g-50">
             <div class="col-12">
                 <!-- Dashboard Header -->
                 <div class="nftmax-header__inner">
                     <div class="nftmax__sicon close-icon close-icon-two d-xl-none">
                         <span>
                             <svg width="16" height="40" viewBox="0 0 16 40" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path d="M0 10C0 4.47715 4.47715 0 10 0H16V40H10C4.47715 40 0 35.5228 0 30V10Z"
                                     fill="#ff4f81">
                                 </path>
                                 <path d="M10 15L6 20.0049L10 25.0098" stroke="#ffffff" stroke-width="1.2"
                                     stroke-linecap="round" stroke-linejoin="round"></path>
                             </svg>
                         </span>
                     </div>
                     @php
                         $route = Route::currentRouteName();
                         $page_title = ucwords(str_replace(['admin.', '.', '-'], [' ', ' ', ' '], $route));
                         if (trim($page_title) == 'Plan Management') {
                             $page_title = 'Paid Ads Settings';
                         }
                     @endphp
                     <div class="header-left">
                         <div class="header-text">
                             <h3>{{ $page_title }}</h3>

                         </div>

                     </div>




                     <div class="header-right">

                         <li class="nav-item dropdown list-style-none">
                             <!-- Notification Bell -->
                             <a class="nav-link position-relative p-0" href="#" id="notificationDropdown"
                                 role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                 onclick="getNotifications()">
                                 <span class="notification-dot" style="display: inline-block;"></span>
                                 <!-- <i class="fa-regular fa-bell fs-5"></i> -->
                                 <!-- Outline bell -->

                                 <!-- <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" role="img" aria-label="Notifications"> -->
                                 <i class="fa-solid fa-bell text-dark fs-5"></i>
                                 <title>Notifications</title>
                                 <path fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6 6 0 1 0-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h11z" />
                                 <path fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                     d="M13.73 21a2 2 0 0 1-3.46 0" />
                                 </svg>

                                 <span id="notification_count"
                                     class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                     style="display: none;">
                                     0
                                 </span>
                             </a>

                             <!-- Dropdown Menu -->
                             <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                                 aria-labelledby="notificationDropdown" style="width: 320px;">
                                 <li class="dropdown-header fw-bold">Notifications</li>
                                 <li>
                                     <hr class="dropdown-divider">
                                 </li>
                                 <div id="notification_data">
                                     <li class="dropdown-item text-muted small">Loading...</li>
                                 </div>


                             </ul>
                         </li>




                         <div class="profile icon-dropdown" data-name="profile-drop">



                             <ul class="profile-dropdown" id="profile-drop">
                                 <li data-name="profile-drop">
                                     <a href="{{ route('admin.profile') }}" data-name="profile-drop">
                                         <span data-name="profile-drop">
                                             <i class="fa-regular fa-circle-user text-dark fs-5"></i>
                                             <!-- <svg data-name="profile-drop" class="stroke-bgray-900 dark:stroke-bgray-50" width="24"
                                                 height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                 <path
                                                     d="M12.1197 12.7805C12.0497 12.7705 11.9597 12.7705 11.8797 12.7805C10.1197 12.7205 8.71973 11.2805 8.71973 9.51047C8.71973 7.70047 10.1797 6.23047 11.9997 6.23047C13.8097 6.23047 15.2797 7.70047 15.2797 9.51047C15.2697 11.2805 13.8797 12.7205 12.1197 12.7805Z"
                                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                 <path
                                                     d="M18.7398 19.3796C16.9598 21.0096 14.5998 21.9996 11.9998 21.9996C9.39977 21.9996 7.03977 21.0096 5.25977 19.3796C5.35977 18.4396 5.95977 17.5196 7.02977 16.7996C9.76977 14.9796 14.2498 14.9796 16.9698 16.7996C18.0398 17.5196 18.6398 18.4396 18.7398 19.3796Z"
                                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                 <path
                                                     d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                             </svg> -->
                                         </span>
                                         My Profile
                                     </a>
                                 </li>

                                 <li class="text-color">
                                     <a href="{{ route('admin.logoutAdmin') }}">
                                         <span>
                                             <i class="fa-solid fa-arrow-right-from-bracket  fs-5"></i>
                                         </span>
                                         Log Out
                                     </a>
                                 </li>



                             </ul>






                             <div class="d-flex gap-2">
                                 <div class="profile-img header-prof-img" data-name="profile-drop">
                                     <img src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('assets/admin/images/Update-profile.png') }}"
                                         alt="img" data-name="profile-drop">
                                 </div>
                                 <div class="profile-taitel" data-name="profile-taitel ">
                                     <h3 data-name="profile-drop">
                                         AJOY Sarker
                                         <span data-name="profile-drop"><svg data-name="profile-drop" width="24"
                                                 height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <path d="M7 10L12 14L17 10" stroke-width="2" stroke-linecap="round"
                                                     stroke-linejoin="round" />
                                             </svg>
                                         </span>
                                     </h3>

                                     <h6 data-name="profile-drop">Super Admin</h6>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
