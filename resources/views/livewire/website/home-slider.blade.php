<section class="slider">
      <div class="slick-carousel carousel-dots-light m-slides-0"
        data-slick='{"slidesToShow": 1,"autoplay": true, "arrows": true, "dots": true, "speed": 700,"fade": true,"cssEase": "linear"}'>
        @if(!empty($sliders))
        @foreach($sliders as $key => $slider)
        <div class="slide-item bg-overlay align-v-h">
          <div class="bg-img"><img src="{{ asset('storage/'.$slider->image) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" alt="slide img"></div>
          <div class="container"> 
            <div class="row align-items-center">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                <div class="slide-content">
                  <span class="slide-subtitle">{{!empty($slider->translationValue->title) ? ucwords($slider->translationValue->title) : ''}} </span>
                  <h2 class="slide-title">{{!empty($slider->translationValue->GBookingname) ? ucwords($slider->translationValue->GBookingname) : ''}} </h2>
                  <p class="slide-desc">{{!empty($slider->translationValue->desc) ? ucwords($slider->translationValue->desc) : ''}} </p>
                  <div class="d-flex flex-wrap align-items-center">
                    {{-- <a href="#" class="btn btn-white btn-white-style2 mr-30">
                      <span>{{ __('message.Book Now Grand Diamond Hotel') }}</span>
                      <i class="icon-arrow-right"></i>
                    </a>
                    <a href="#" class="btn btn-white btn-outlined">
                      <span>{{ __('message.Enjoy') }} {{ __('message.G-Service') }}</span>
                    </a> --}}
                  </div>
                </div><!-- /.slide-content -->
              </div><!-- /.col-xl-7 -->
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 offset-xl-1">
                <div class="fancybox-layout5 p-0 m-0">
                  <div class="fancybox-container">
                    <!-- fancybox item #1 -->
                    <div class="fancybox-item">
                      <div class="fancybox-body">
                        <div class="fancybox-icon">
                          <!-- <i class="icon-chemical5"></i> -->
                          <img src="{{ URL::to('website/assets/images/services/stein-logo.png') }}" height="100px" width="120" alt="service">
                        </div><!-- /.fancybox-icon -->
                        <h4 class="fancybox-title">{{ __('message.Concert') }} Stein Brew</h4>
                      </div><!-- /.fancybox-body -->
                    </div><!-- /.fancybox-item -->
                    <!-- fancybox item #2 -->
                    <div class="fancybox-item">
                      <div class="fancybox-body">
                        <div class="fancybox-icon">
                          <!-- <i class="icon-chemical2"></i> -->
                          <img src="{{ URL::to('website/assets/images/services/thai-houselogo.png') }}" height="100px" width="150" alt="service">
                        </div><!-- /.fancybox-icon -->
                        <h4 class="fancybox-title">Thai House {{ __('message.Restaurant') }}</h4>
                      </div><!-- /.fancybox-body -->
                    </div><!-- /.fancybox-item -->
                    <!-- fancybox item #3 -->
                    <div class="fancybox-item">
                      <div class="fancybox-body">
                        <div class="fancybox-icon">
                          <!-- <i class="icon-archive"></i> -->
                          <img src="{{ URL::to('website/assets/images/services/saiikulogo.png') }}" height="80px" width="120" alt="service">
                        </div><!-- /.fancybox-icon -->
                        <h4 class="fancybox-title">Saiku {{ __('message.Restaurant') }}</h4>
                      </div><!-- /.fancybox-body -->
                    </div><!-- /.fancybox-item -->
                  </div><!-- /.fancybox-container -->
                </div><!-- /.fancybox-layout5 -->
              </div><!-- /.col-xl-3 -->
            </div><!-- /.row -->
          </div><!-- /.container -->
        </div><!-- /.slide-item -->
        @endforeach
        @endif
      </div><!-- /.carousel -->
    </section><!-- /.slider -->