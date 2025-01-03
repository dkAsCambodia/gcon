
<header class="header header-layout1">
  <style>
.dropdown-submenu {
    position: relative;
}
.dropdown-submenu > .dropdown-menu {
    top: 0;
    left: 100%; 
    margin-top: -1px;
}
.nav-item.has-dropdown:hover > .dropdown-menu {
    display: block;
}
.dropdown-submenu:hover > .dropdown-menu {
    display: block;
}
  </style>
      <div class="header-topbar">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="d-flex align-items-center justify-content-between">
                <ul class="contact-list d-flex flex-wrap align-items-center list-unstyled mb-0">
                  <li class="miniPopup-language-area">
                    <button class="miniPopup-language-trigger" type="button">@if(session()->get('locale') == 'th-TH')
                                                                            Thai
                                                                            @elseif(session()->get('locale') == 'km')
                                                                            Khmer
                                                                            @elseif(session()->get('locale') == 'en')
                                                                            English
                                                                            @else
                                                                            Change language
                                                                            @endif
                    </button>
                    <ul id="Langchange" class="miniPopup miniPopup-language list-unstyled">
                        @forelse($languages as $language)
                            <li id="{{ $language->code }}">
                                <button>
                                <img src="{{ asset('storage/'.$language->icon) }}" alt="en" height="23px" width="35px">
                                <span>{{ $language->name }}</span>
                                </button>
                            </li>
                        @empty
                            <li id="en">
                                <button>
                                <img src="{{ URL::to('website/assets/images/flags/en.png') }}" alt="en">
                                <span>English</span>
                                </button>
                            </li>
                        @endforelse
                    </ul><!-- /.miniPopup-language -->
                  </li>
                  <li>
                    <i class="icon-phone"></i><a href="tel:+855973294524">(+855) 973294524</a>
                  </li>
                  <li>
                    <i class="icon-location"></i><a href="https://www.google.com/maps/place/BEER+CITY+Poipet+%E0%B9%82%E0%B8%8B%E0%B8%993/@13.64539,102.568582,16z/data=!4m6!3m5!1s0x311b174af664d179:0x767a10d402b36706!8m2!3d13.6453903!4d102.568582!16s%2Fg%2F11v19mtpyz?hl=en&entry=ttu&g_ep=EgoyMDI0MTAxMy4wIKXMDSoASAFQAw%3D%3D" target="_blank">Beer City Poipet Zone 3</a>
                  </li>
                  <li>
                    <i class="icon-clock"></i><a href="#">{{ __('message.Opening Hours') }}: 24*7</a>
                  </li>
                </ul><!-- /.contact-list -->
                <div class="d-flex">
                  <ul class="social-icons list-unstyled mb-0 mr-30">
                    <li><a href="https://www.facebook.com/beercitypoipet" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  </ul><!-- /.social-icons -->
                  <form class="header-topbar-search" wire:submit.prevent="getSerachDataFun">
                    {{-- <input type="text" class="form-control" placeholder="{{ __('message.Search here') }}"> --}}
                    

                    <input list="foodSuggestions" type="text" wire:model.live="search" placeholder="Search..." class="form-control">
                     
                      <button class="header-topbar-search-btn" type="submit"><i class="fa fa-search"></i></button>
                      <datalist id="foodSuggestions">
                        @if(!empty($foods))
                          @foreach($foods as $food)
                              <option value="{{ !empty($food->food_translation_name) ? ucwords($food->food_translation_name) : '' }}"></option>
                          @endforeach
                          @endif
                      </datalist>


                  </form>
                </div>
              </div>
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.header-top -->
      <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="/" wire:navigate >
            <img src="{{ URL::to('website/assets/images/logo/gconlogo.png') }}" class="logo-dark" alt="logo">
          </a>
          <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="mainNavigation">
            <ul class="navbar-nav">
              <li class="nav-item"><a href="/" wire:navigate class="nav-item-link {{ Route::is('home') ? 'active' : '' }}">{{ __('message.Home') }}</a></li><!-- /.nav-item -->
              <li class="nav-item has-dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-item-link {{ Route::is('Gentertainment') ? 'active' : '' }}">{{ __('message.G-Entertainment') }}</a>
                  <ul class="dropdown-menu">
                  @if(!empty($entertainments))
                    @foreach($entertainments as $key => $entertainment)
                        <li class="nav-item">
                          <a href="/{{ $entertainment->recognize."/".$entertainment->BookingType ?? ''}}" wire:navigate class="nav-item-link">{{!empty($entertainment->translationValue->GBookingname) ? ucwords($entertainment->translationValue->GBookingname) : ''}}</a>
                        </li><!-- /.nav-item -->
                    @endforeach
                  @endif
                    </ul><!-- /.dropdown-menu -->
              </li><!-- /.nav-item -->

              <li class="nav-item has-dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-item-link {{ Route::is('Gentertainment') ? 'active' : '' }}">
                    {{ __('message.G-Booking') }}
                </a>
                <ul class="dropdown-menu">
                    @if(!empty($bookings))
                        @foreach($bookings as $key => $booking)
                            <li class="nav-item {{ $booking->BookingType=='BookingRestaurant' ? 'has-dropdown' : '' }}">
                                <a href="/{{ $booking->recognize . '/' . ($booking->BookingType ?? '') }}" wire:navigate class="nav-item-link">
                                    {{ !empty($booking->translationValue->GBookingname) ? ucwords($booking->translationValue->GBookingname) : '' }}
                                </a>
                                  @if(!empty($booking->BookingType=='BookingRestaurant'))
                                    <ul class="dropdown-menu dropdown-submenu">
                                        @foreach($restaurantList as $submenu) 
                                            <li class="nav-item" ><a href="" class="nav-item-link">{{ !empty($submenu->restaurantName) ? ucwords($submenu->restaurantName) : '' }}</a></li>
                                            
                                        @endforeach
                                    </ul><!-- /.dropdown-menu for submenus --> 
                                  @endif
                            </li><!-- /.nav-item -->
                        @endforeach
                    @endif
                </ul><!-- /.dropdown-menu -->
            </li><!-- /.nav-item -->
            
            

              <li class="nav-item has-dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-item-link {{ Route::is('Gentertainment') ? 'active' : '' }}">{{ __('message.G-Service') }}</a>
                  <ul class="dropdown-menu">
                  @if(!empty($services))
                    @foreach($services as $key => $service)
                        <li class="nav-item">
                          <a href="/" wire:navigate class="nav-item-link">{{!empty($service->translationValue->GBookingname) ? ucwords($service->translationValue->GBookingname) : ''}}</a>
                        </li><!-- /.nav-item -->
                    @endforeach
                  @endif
                    </ul><!-- /.dropdown-menu -->
              </li><!-- /.nav-item -->
                        
              <li class="nav-item"><a href="/contact" wire:navigate class="nav-item-link {{ Route::is('contact') ? 'active' : '' }}">{{ __('message.Contacts') }}</a></li><!-- /.nav-item -->
              {{-- <li class="nav-item"><a href="/aboutus" wire:navigate class="nav-item-link {{ Route::is('aboutus') ? 'active' : '' }}">{{ __('message.AboutUs') }}</a></li><!-- /.nav-item --> --}}
              <li class="nav-item"><a href="/GEntertainment/events" wire:navigate class="nav-item-link {{ Route::is('events') ? 'active' : '' }}">{{ __('message.Special Events') }}</a></li><!-- /.nav-item -->
              @if(!empty(Session::get('memberdata')))
              <li class="nav-item"><a href="/dashboard" wire:navigate class="nav-item-link {{ Route::is('dashboard.*') ? 'active' : '' }}">{{ __('message.Dashboard') }}</a></li><!-- /.nav-item -->
              <li class="nav-item"><a href="#" wire:click="customerlogout" class="nav-item-link">{{ __('message.Logout') }}</a></li><!-- /.nav-item -->
              @else
              <li class="nav-item"><a href="/login" wire:navigate class="nav-item-link {{ Route::is('login') ? 'active' : '' }}">{{ __('message.Login') }}</a></li><!-- /.nav-item -->
              @endif
            </ul><!-- /.navbar-nav -->
            <ul class="header-actions d-flex align-items-center position-relative list-unstyled mb-0">
              <li class="d-none d-xl-flex align-items-center">
                <a href="/bookingList" wire:navigate class="btn btn-primary btn-outlined btn-contact">
                  {{ __('message.Booking Now') }}
                </a>
              </li>
              <li>
                <a href="/GBooking/restaurant/viewcart" wire:navigate class="action-btn action-btn-cart" wire:ingore>
                  <i class="icon-cart"></i><span class="cart-counter">{{$cartCount}}</span>
                </a>
                <div class="cart-minipopup">
                  <ul class="list-unstyled">
                    @forelse($cartList as $cartrow)
                    <li class="cart-item">
                      <div class="cart-img">
                        <a href="#" wire:click="loadFoodDetails( {{ $cartrow->id }} )">
                          <img src="{{ asset('storage/'.$cartrow->food_img ) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" height="50px" width="100%" alt="product" />
                              </a>
                      </div>
                      <div class="cart-content">
                        <a class="cart-title"href="void:javascript()" wire:click="loadFoodDetails( {{ $cartrow->id }} )" wire:loading.attr="disabled" data-toggle="modal" data-target="#myModal">
                          {{ !empty($cartrow->translationValue->food_translation_name) ? ucwords($cartrow->translationValue->food_translation_name) : '' }}
                      </a>
                        <span class="cart-price">{{ !empty($cartrow->getcurrencyData->currency_symbol) ? ucwords($cartrow->getcurrencyData->currency_symbol) : '' }} {{ !empty($cartrow->price) ? ucwords($cartrow->price) : '' }}</span>
                        {{-- <button class="cart-delete">&times;</button> --}}
                      </div><!-- /.cart-item-content -->
                    </li><!-- /.cart-item -->
                    @empty
                    <li>{{ __('message.Empty Cart') }}</li>
                    @endforelse
                  </ul>
                  {{-- <div class="cart-total">
                    <span>Total:</span>
                    <span>$14.00</span>
                  </div><!-- /.cart-subtotal --> --}}
                  <a href="shopping-cart.html" class="btn btn-secondary btn-block">View Cart</a>
                </div><!-- /.cart-minipopup -->
              </li>
            </ul>
            <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
          </div><!-- /.navbar-collapse -->
          <div class="d-none d-xl-flex align-items-center position-relative ml-30">
            <div class="contact-phone d-flex align-items-center">
              <div class="contact-icon"><i class="icon-chemical9"></i></div>
              <div>
                <span class="d-block">{{ __('message.Get updates') }} : </span>
                <a class="phone-link d-block" href="tel:00201061245741">+855 973294524</a>
              </div>
            </div>
          </div>
        </div><!-- /.container -->
      </nav><!-- /.navabr -->
    </header><!-- /.Header -->
    
