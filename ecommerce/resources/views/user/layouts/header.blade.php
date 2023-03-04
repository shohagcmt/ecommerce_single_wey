<!--catagory  model-->
@php
$categorys=App\Models\Category::latest()->get();    
@endphp

<div class="banner_bg_main">
    <!-- header top section start -->
    <div class="container">
       <div class="header_section_top">
          <div class="row">
             <div class="col-sm-12">
                <div class="custom_menu">
                   <ul>
                      <li><a href="#">Best Sellers</a></li>
                      <li><a href="#">Gift Ideas</a></li>
                      <li><a href="{{ route('newrelease') }}">New Releases</a></li>
                      <li><a href="{{ route('todaysdeal') }}">Today's Deals</a></li>
                      <li><a href="{{ route('customerservice') }}">Customer Service</a></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- header top section start -->
    <!-- logo section start -->
    <div class="logo_section">
       <div class="container">
          <div class="row">
             <div class="col-sm-12">
                <div class="logo"><a href="{{ asset('home/index.html') }}"><img src="{{ asset('home/images/logo.png') }}"></a></div>
             </div>
          </div>
       </div>
    </div>
    <!-- logo section end -->
    <!-- header section start -->
    <div class="header_section">
       <div class="container">
          <div class="containt_main">
             <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="index.html">Home</a>
                @foreach($categorys as $category)
                <a href="{{ route('category',[$category->id , $category->slug]) }}">{{ $category->category_name }}</a>
                @endforeach
             </div>
             <span class="toggle_icon" onclick="openNav()"><img src="{{ asset('home/images/toggle-icon.png') }}"></span>
             <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  @foreach($categorys as $category)
                  <a class="dropdown-item" href="{{ route('category',[$category->id , $category->slug]) }}">{{ $category->category_name }}</a>
                  @endforeach
                </div>
             </div>
             <div class="main">
                <!-- Another variation with a button -->
                <div class="input-group">
                   <input type="text" class="form-control" placeholder="Search this blog">
                   <div class="input-group-append">
                      <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                      <i class="fa fa-search"></i>
                      </button>
                   </div>
                </div>
             </div>
             <div class="header_box">
                <div class="lang_box ">
                   <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                   <img src="{{ asset('home/images/flag-uk.png') }}" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                   </a>
                   <div class="dropdown-menu ">
                      <a href="#" class="dropdown-item">
                      <img src="{{ asset('home/images/flag-france.png') }}" class="mr-2" alt="flag">
                      French
                      </a>
                   </div>
                </div>
                <div class="login_menu">
                   <ul>
                      <li><a href="#">
                         <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                         <span class="padding_10">Cart</span></a>
                      </li>
                      <li><a href="#">
                         <i class="fa fa-user" aria-hidden="true"></i>
                         <span class="padding_10">Cart</span></a>
                      </li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- header section end -->
 </div>
 