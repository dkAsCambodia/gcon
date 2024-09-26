<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Provetta - Laboratory & Science Research HTML5 Template">
  <link href="{{ URL::to('website/assets/images/favicon/favicon.png') }}" rel="icon">
  <title>{{ $title ?? 'Gcon' }}</title>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&amp;display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="../../../use.fontawesome.com/releases/v5.15.1/css/all.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
  <link rel="stylesheet" href="{{ URL::to('website/assets/css/libraries.css') }}">
  <link rel="stylesheet" href="{{ URL::to('website/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ URL::to('website/assets/css/customStyle.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Toster CSS START Livewire-->
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Toster CSS END Livewire-->
  @livewireStyles
</head>
<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->

    <!-- =========================Header=========================== -->
    <livewire:website.header />


    {{ $slot }}

 
    <!-- ======================== Footer   ========================== -->
    <footer class="footer">
      <div class="footer-primary">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="footer-widget-contact">
                <h6 class="footer-widget-title">{{ __('message.Quick Contacts') }}</h6>
                <p>{{ __('message.We always provide 100% customer satisfaction and absolute quality without any compromise.') }}</p>
                <ul class="contact-list list-unstyled">
                  <li>
                    <a href="mailto:provetta@7oroof.com">
                      <i class="contact-icon icon-email"></i> <span>provetta@7oroof.com</span>
                    </a>
                  </li>
                  <li>
                    <a href="tel:00201061245741">
                      <i class="contact-icon icon-phone"></i> <span>(855) 69861401</span>
                    </a>
                  </li>
                </ul>
                <a href="contact-us.html" class="btn btn-white mr-10">
                  <i class="fas fa-map-marker-alt"></i> Beer City Poipet Zone 3.
                </a>
              </div>
            </div><!-- /.col-xl-2 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="footer-widget-nav">
                <h6 class="footer-widget-title">{{ __('message.City Areas') }} Gcon</h6>
                <nav>
                  <ul class="list-unstyled">
                    <li><a href="/GBooking/restaurant/DeliveryBoyRegistration" wire:navigate >{{ __('message.Delivery Boy') }}</a></li>
                    <li><a href="team.html">{{ __('message.Our Team') }}</a></li>
                    <li><a href="blog.html">{{ __('message.News & Media') }}</a></li>
                    <li><a href="services.html">{{ __('message.Upcoming Events') }}</a></li>
                    
                  </ul>
                </nav>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-lg-2 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="footer-widget-nav">
                  <h6 class="footer-widget-title">{{ __('message.exclusive offers') }}</h6>
                  <nav>
                    <ul class="list-unstyled">
                      <li><a href="careers.html">{{ __('message.Contact with Grand Diamond City') }}</a></li>
                      <li><a href="careers.html">{{ __('message.Popular Festivals') }}</a></li>
                      <li><a href="careers.html">{{ __('message.Careers options') }}</a></li>
                    </ul>
                  </nav>
                  <div class="d-flex">
                    <ul class="social-icons list-unstyled mb-0 mr-30">
                      <li><a href="#"><i class="fab fa-facebook-f" style="position: absolute;top: 16%;left: 17%;"></i></a></li>
                      <li><a href="#"><i class="fab fa-instagram" style="position: absolute;top: 16%;left: 17%;"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter" style="position: absolute;top: 16%;left: 17%;"></i></a></li>
                      <li><a href="#"><i class="fab fa-line" style="position: absolute;top: 16%;left: 17%;"></i></a></li>
                    </ul><!-- /.social-icons -->
                  </div>

                </div><!-- /.footer-widget-content -->
              </div><!-- /.col-lg-2 -->
           
            
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.footer-primary -->
      <div class="footer-secondary">
        <div class="container">
          <div class="row">
            
                <div class="col-sm-4"></div>
                <div class="col-sm-4 align-items-center">
                  <b><span> {{ __('message.Copyright') }} &copy; 2024-2025 {{ __('message.by') }} </span>
                  <a class="color-secondary" href="/" wire:navigate >Gcon</a> {{ __('message.All Rights Reserved') }}.</b>
                </div>
                <div class="col-sm-4"></div>
              
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.footer-secondary -->
    </footer><!-- /.Footer -->
    <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>

    <svg class="svg-pathes" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">

      <clipPath id="hexagon-clippath" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.701 L1,0.701 C1,0.747,0.972,0.789,0.926,0.812 L0.574,0.989 C0.528,1,0.472,1,0.426,0.989 L0.074,0.812 C0.028,0.789,0,0.747,0,0.701 L0,0.701 L0,0.311 L0,0.311 C0,0.265,0.028,0.223,0.074,0.2 L0.426,0.023 C0.472,0,0.528,0,0.574,0.023 L0.926,0.2 C0.972,0.223,1,0.265,1,0.311 L1,0.311 L1,0.701">
        </path>
      </clipPath>
      <clipPath id="hexagon-clippath2" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.701 L1,0.701 C1,0.747,0.972,0.789,0.926,0.812 L0.574,0.989 C0.528,1,0.472,1,0.426,0.989 L0.074,0.812 C0.028,0.789,0,0.747,0,0.701 L0,0.701 L0,0.311 L0,0.311 C0,0.265,0.028,0.223,0.074,0.2 L0.426,0.023 C0.472,0,0.528,0,0.574,0.023 L0.926,0.2 C0.972,0.223,1,0.265,1,0.311 L1,0.311 L1,0.701">
        </path>
      </clipPath>
      <clipPath id="path-direction-right" clipPathUnits="objectBoundingBox">
        <path
          d="M0.006,1 C0.156,1,0.295,0.972,0.371,0.926 L0.95,0.574 C1,0.528,1,0.472,0.95,0.426 L0.371,0.074 C0.295,0.028,0.156,0,0.006,0 L0.006,1">
        </path>
      </clipPath>
      <clipPath id="path-direction-left" clipPathUnits="objectBoundingBox">
        <path
          d="M0.892,1 L0.892,0 L1,0 L1,1 L0.892,1 M0.05,0.574 C-0.017,0.528,-0.017,0.472,0.05,0.426 L0.567,0.074 C0.634,0.028,0.757,0,0.892,0 L0.892,1 C0.757,1,0.634,0.972,0.567,0.926 L0.05,0.574">
        </path>
      </clipPath>
      <clipPath id="path-direction-left2" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0 C0.85,0,0.711,0.028,0.635,0.074 L0.056,0.426 C-0.019,0.472,-0.019,0.528,0.056,0.574 L0.635,0.926 C0.711,0.972,0.85,1,1,1 L1,0">
        </path>
      </clipPath>
      <clipPath id="path-direction-right2" clipPathUnits="objectBoundingBox">
        <path
          d="M0,0 C0.151,0,0.289,0.028,0.365,0.074 L0.944,0.426 C1,0.472,1,0.528,0.944,0.574 L0.365,0.926 C0.289,0.972,0.151,1,0,1 L0,0">
        </path>
      </clipPath>
      <clipPath id="path-direction-up" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.258 C1,0.258,1,0.258,1,0.258 L1,0.258 L1,0.976 C1,0.989,0.993,1,0.983,1 L0.017,1 C0.007,1,0,0.989,0,0.976 L0,0.257 L0,0.257 C0,0.219,0.028,0.183,0.074,0.164 L0.426,0.015 C0.472,-0.005,0.528,-0.005,0.574,0.015 L0.926,0.164 C0.972,0.183,1,0.219,1,0.257 L1,0.257 L1,0.258">
        </path>
      </clipPath>
      <clipPath id="path-direction-down" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.859 C0.998,0.88,0.97,0.898,0.926,0.909 L0.574,0.992 C0.528,1,0.472,1,0.426,0.992 L0.074,0.909 C0.03,0.898,0.002,0.88,0,0.859 L0,0.859 L0,0.857 C0,0.856,0,0.856,0,0.856 L0,0.856 L0,0 L1,0 L1,0.859 L1,0.859">
        </path>
      </clipPath>
      <clipPath id="path-direction-down2" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.743 C1,0.781,0.972,0.817,0.926,0.836 L0.574,0.985 C0.528,1,0.472,1,0.426,0.985 L0.074,0.836 C0.028,0.817,0,0.781,0,0.743 L0,0.743 L0,0.742 C0,0.742,0,0.742,0,0.742 L0,0.742 L0,0.024 C0,0.011,0.007,0,0.017,0 L0.983,0 C0.993,0,1,0.011,1,0.024 L1,0.743 L1,0.743">
        </path>
      </clipPath>
      <clipPath id="path-direction-down-sm" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.686 C0.997,0.732,0.969,0.773,0.926,0.796 L0.574,0.982 C0.528,1,0.472,1,0.426,0.982 L0.074,0.796 C0.03,0.773,0.003,0.732,0,0.686 L0,0.686 L0,0.681 C0,0.68,0,0.68,0,0.679 L0,0.679 L0,0.042 C0,0.019,0.011,0,0.024,0 L0.976,0 C0.989,0,1,0.019,1,0.042 L1,0.686 L1,0.686">
        </path>
      </clipPath>

      <clipPath id="path-direction-left-large" clipPathUnits="objectBoundingBox">
        <path
          d="M0.301,1 L0.301,0 L1,0 L1,1 L0.301,1 M0.191,0.926 L0.017,0.574 C-0.006,0.528,-0.006,0.472,0.017,0.426 L0.191,0.074 C0.214,0.028,0.256,0,0.301,0 L0.301,1 C0.256,1,0.214,0.972,0.191,0.926">
        </path>
      </clipPath>
      <clipPath id="path-direction-right-large" clipPathUnits="objectBoundingBox">
        <path
          d="M0.983,0.574 L0.809,0.926 C0.786,0.972,0.744,1,0.699,1 L0.699,0 C0.744,0,0.786,0.028,0.809,0.074 L0.983,0.426 C1,0.472,1,0.528,0.983,0.574 M0,0 L0.699,0 L0.699,1 L0,1 L0,0">
        </path>
      </clipPath>
    </svg>

  </div><!-- /.wrapper -->
  {{-- sweetalert 2 js START --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {{-- sweetalert 2 js END --}}
  <script src="{{ URL::to('website/assets/js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ URL::to('website/assets/js/plugins.js') }}"></script>
  <script src="{{ URL::to('website/assets/js/main.js') }}"></script>
  <!-- Toster JS START For Livewire-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    document.addEventListener("livewire:init", () => {
        Livewire.on("toast", (event) => {
            toastr[event.notify](event.message);
        });
    });
</script>
     <!-- Toster JS END For Livewire-->
 
  <script type="text/javascript">
    var url = "{{ route('LangChange') }}";
    $("#Langchange li").on("click", function(){
        window.location.href = url + "?lang=" + this.id;
    });
</script>

{{-- toastr js START for LARAVEL controller--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('warning'))
            toastr.warning('{{ Session::get('warning') }}');
        @endif
    });
</script>
{{-- toastr js END for LARAVEL controller--}}
@livewireScripts
</body>
</html>