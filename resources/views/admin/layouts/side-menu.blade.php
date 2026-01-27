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
         <a href="index-2.html">
             <img class="nftmax-logo__main" src="{{ asset('assets/img/logos/logo.png') }}" alt="logo" style="width: 93%;">

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
                                         <!-- <span>
                                             <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <path class="svg-color-1"
                                                     d="M0 8.84719C0 7.99027 0.366443 7.17426 1.00691 6.60496L6.34255 1.86217C7.85809 0.515019 10.1419 0.515019 11.6575 1.86217L16.9931 6.60496C17.6336 7.17426 18 7.99027 18 8.84719V17C18 19.2091 16.2091 21 14 21H4C1.79086 21 0 19.2091 0 17V8.84719Z" />
                                                 <path
                                                     d="M5 17C5 14.7909 6.79086 13 9 13C11.2091 13 13 14.7909 13 17V21H5V17Z" />
                                             </svg>
                                         </span> -->
                                     </div>

                                     <div class="has-child-text">
                                         <span>Dashboards</span>
                                     </div>
                                 </div>


                             </div>



                         </a>



                     </li>



                     <li class="menu-main">
                         <a href="{{ route('admin.incoming.user') }}"
                             class="{{ request()->routeIs('admin.incoming.user') ? 'active' : '' }}">
                             <div class="has-child-main">
                                 <div class="has-child-main-inner">
                                     <div class="has-child-icon">
                                         <!-- <span>
                                             <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <ellipse class="svg-color-1" cx="7" cy="14"
                                                     rx="7" ry="4" />
                                                 <circle cx="7" cy="4" r="4" />
                                             </svg>
                                         </span> -->

                                         <i class="fa-solid fa-user-tie"></i>

                                     </div>

                                     <div class="has-child-text">
                                         <span>Incoming User Management </span>
                                     </div>
                                 </div>
                             </div>
                         </a>
                     </li>

                     <li class="menu-main">
                         <a href="{{ route('admin.approved.user') }}"
                             class="{{ request()->routeIs('admin.approved.user') ? 'active' : '' }}">
                             <div class="has-child-main">
                                 <div class="has-child-main-inner">
                                     <div class="has-child-icon">
                                         <i class="fa-solid fa-thumbs-up"></i>
                                         <!-- <span>
                                             <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <ellipse class="svg-color-1" cx="7" cy="14"
                                                     rx="7" ry="4" />
                                                 <circle cx="7" cy="4" r="4" />
                                             </svg>
                                         </span> -->
                                     </div>

                                     <div class="has-child-text">
                                         <span> Approved User Management </span>
                                     </div>
                                 </div>
                             </div>
                         </a>
                     </li>

                     <li class="menu-main">
                         <a href="{{ route('admin.category.management') }}"
                             class="{{ request()->routeIs('admin.category.management') ? 'active' : '' }}">
                             <div class="has-child-main">
                                 <div class="has-child-main-inner">
                                     <div class="has-child-icon">
                                         <!-- <span>
                                             <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <ellipse class="svg-color-1" cx="7" cy="14"
                                                     rx="7" ry="4" />
                                                 <circle cx="7" cy="4" r="4" />
                                             </svg>
                                         </span> -->

                                         <i class="fa-solid fa-layer-group"></i>

                                     </div>

                                     <div class="has-child-text">
                                         <span> Category Management </span>
                                     </div>
                                 </div>
                             </div>
                         </a>
                     </li>

                     {{-- <li class="menu-main">
                         <a href="{{ route('admin.subcategory.management') }}"
                     class="{{ request()->routeIs('admin.subcategory.management') ? 'active' : '' }}">
                     <div class="has-child-main">
                         <div class="has-child-main-inner">
                             <div class="has-child-icon">
                                 <i class="fa-solid fa-list"></i>
                             </div>

                             <div class="has-child-text">
                                 <span>Sub-Category Management </span>
                             </div>
                         </div>
                     </div>
                     </a>
                     </li> --}}
                     <li class="menu-main">
                         <a href="{{ route('admin.contact.management') }}"
                             class="{{ request()->routeIs('admin.contact.management') ? 'active' : '' }}">
                             <div class="has-child-main">
                                 <div class="has-child-main-inner">
                                     <div class="has-child-icon">
                                         <!-- <span>
                                             <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <ellipse class="svg-color-1" cx="7" cy="14"
                                                     rx="7" ry="4" />
                                                 <circle cx="7" cy="4" r="4" />
                                             </svg>
                                         </span> -->

                                         <i class="fa-solid fa-address-book"></i>
                                     </div>

                                     <div class="has-child-text">
                                         <span>Contact Management</span>
                                     </div>
                                 </div>
                             </div>
                         </a>
                     </li>

                     <li class="menu-main">
                         <a href="{{ route('admin.plan.management') }}"
                             class="{{ request()->routeIs('admin.plan.management') ? 'active' : '' }}">
                             <div class="has-child-main">
                                 <div class="has-child-main-inner">
                                     <div class="has-child-icon">
                                         <!-- <span>
                                             <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <ellipse class="svg-color-1" cx="7" cy="14"
                                                     rx="7" ry="4" />
                                                 <circle cx="7" cy="4" r="4" />
                                             </svg>
                                         </span> -->

                                         <i class="fa-solid fa-coins"></i>
                                     </div>

                                     <div class="has-child-text">
                                         <span>Paid Ads Settings</span>
                                     </div>
                                 </div>
                             </div>
                         </a>
                     </li>

                     <li class="menu-main support-menu-item">
                         <a href="{{ route('admin.support-list') }}"
                             class="{{ request()->routeIs('admin.support-list') ? 'active' : '' }}">
                             <div class="has-child-main">
                                 <div class="has-child-main-inner">
                                     <div class="has-child-icon">
                                         <i class="fa-solid fa-headset"></i>
                                     </div>

                                     <div class="has-child-text">
                                         <span>Support Chat</span>
                                         @if(isset($totalUnreadCount) && $totalUnreadCount > 0)
                                             <span class="support-badge" id="support-unread-badge" style="color: white; padding: 10px;">{{ $totalUnreadCount }}</span>
                                         @else
                                             <span class="support-badge" id="support-unread-badge" style="display: none; color: white; padding: 10px;">0</span>
                                         @endif
                                     </div>
                                 </div>
                             </div>
                         </a>
                     </li>

                     <!-- <li class="menu-main">
                         <a href="{{ route('admin.plan.history') }}"
                             class="{{ request()->routeIs('admin.plan.history') ? 'active' : '' }}">
                             <div class="has-child-main">
                                 <div class="has-child-main-inner">
                                     <div class="has-child-icon">
                                         

                                         <i class="fa-solid fa-file-invoice-dollar"></i>
                                     </div>

                                     <div class="has-child-text">
                                         <span>Plan Purchase History</span>
                                     </div>
                                 </div>
                             </div>
                         </a>
                     </li> -->

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