<div>
     <!-- ============================Slider============================== -->
     <livewire:website.home-slider />

     <!-- ============================G booking list============================== -->
     <livewire:website.home-gbooking />

     <!-- ============================G service list============================== -->
     <livewire:website.home-gservice />

     <!-- ============================G Entertainment list============================== -->
     <livewire:website.home-gentertainment />

     
    

      <section class="counters pb-80 pt-40 pb-40 mt-50">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="counter-item">
              <h4 class="counter-number"><span class="counter">7154</span>+</h4>
              <p class="counter-desc mb-0">{{ __('message.Total Membership') }}</p>
            </div><!-- /.counter-item -->
          </div><!-- /.col-lg-3 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="counter-item">
              <h4 class="counter-number"><span class="counter">1381</span>+</h4>
              <p class="counter-desc mb-0">{{ __('message.Total Hotel Rooms') }}</p>
            </div><!-- /.counter-item -->
          </div><!-- /.col-lg-3 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="counter-item">
              <h4 class="counter-number"><span class="counter">7154</span>+</h4>
              <p class="counter-desc mb-0">{{ __('message.Total Concert Table') }}</p>
            </div><!-- /.counter-item -->
          </div><!-- /.col-lg-3 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="counter-item">
              <h4 class="counter-number"><span class="counter">980</span>+</h4>
              <p class="counter-desc mb-0">{{ __('message.Total Grocery Foods') }}</p>
            </div><!-- /.counter-item -->
          </div><!-- /.col-lg-3 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Counters -->

    <!-- ========================About Layout 2=========================== -->
    <section class="about-layout2 pt-30 pb-130">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-10 col-lg-8 col-xl-8">
            <div class="about-text mb-30">
              <div class="about-badge">
                <div class="about-icon"><i class="icon-beaker"></i></div>
              </div>
              <div class="about-text-banner">
                <div class="heading-layout2">
                  <h3 class="heading-title mb-0">{{ __('message.We Are providing Gold & Diamond card for discount Since') }} 2024</h3>
                </div>
              </div>
            </div>
            <div class="about-img d-flex justify-content-end">
              <img src="{{ URL::to('website/assets/images/about/2.png') }}" alt="about">
            </div>
          </div><!-- /.col-12 -->
          <div class="col-sm-12 col-md-10 col-lg-8 col-xl-4">
            <div class="about-Text">
              <p class="mb-30">{{ __('message.check-in location') }}</p>
              <ul class="features-list-layout2 list-unstyled mb-40">
                <li class="feature-item">
                  <i class="feature-icon"></i>
                  <h4 class="feature-title mb-0">Gcon {{ __('message.Near At You') }}</h4>
                </li>
                <li class="feature-item">
                  <i class="feature-icon"></i>
                  <h4 class="feature-title mb-0">{{ __('message.exclusive offers') }}</h4>
                </li>
                <li class="feature-item">
                  <i class="feature-icon"></i>
                  <h4 class="feature-title mb-0">{{ __('message.Subscribe Now') }}</h4>
                </li>
              </ul>
              <p class="mb-30">{{ __('message.night sleep') }}</p>
              <div class="author-meta d-flex flex-wrap align-items-center mr-30">
                <div class="author-img">
                  <img src="{{ URL::to('website/assets/images/testimonials/thumbs/7.jpg') }}" alt="thumb">
                </div>
                <div>
                  <h4 class="author-title">Jane Winston</h4>
                  <span class="author-desc">Our Founder</span>
                </div>
                <img src="{{ URL::to('website/assets/images/about/singnture2.png') }}" class="author-singnture" alt="singnture">
              </div>
            </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.About Layout 2 -->

    <!-- ========================Banner Layout 8=========================== -->
    <section class="banner-layout8 bg-primary">
      <div class="top-shape"></div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-xl-5 banner-content">
            <div class="banner-text">
              <div class="heading-layout2 heading-light">
                <h3 class="heading-title">{{ __('message.We Are providing Gold & Diamond card for discount Since') }} 2024</h3>
                <p class="heading-desc font-weight-bold mb-40">{{ __('message.check-in location') }}</p>
              </div>
              <div class="d-flex flex-wrap mb-90">
                <a href="/bookingList" wire:navigate class="btn btn-white btn-white-style2 mr-30">
                  <span>{{ __('message.Booking Now') }} !</span> <i class="icon-arrow-right"></i>
                </a>
                <a href="/contact" wire:navigate class="btn btn-light btn-outlined">{{ __('message.Contacts') }}</a>
              </div>
              <div class="fancybox-layout2 fancybox-light">
                <div class="fancybox-item">
                  <div class="fancybox-icon">
                    <i class="icon-chemistry"></i>
                  </div><!-- /.fancybox-icon -->
                  <div class="fancybox-body">
                    <h4 class="fancybox-title">{{ __('message.exclusive offers') }}</h4>
                    <p class="fancybox-desc">{{ __('message.night sleep') }}</p>
                  </div><!-- /.fancybox-body -->
                </div><!-- /.fancybox-item -->
                <div class="fancybox-item">
                  <div class="fancybox-icon">
                    <i class="icon-drug"></i>
                  </div><!-- /.fancybox-icon -->
                  <div class="fancybox-body">
                    <h4 class="fancybox-title">{{ __('message.Subscribe Now') }}</h4>
                    <p class="fancybox-desc">{{ __('message.night sleep') }}</p>
                  </div><!-- /.fancybox-body -->
                </div><!-- /.fancybox-item -->
              </div><!-- /.fancybox-layout2 -->
            </div><!-- /.banner-text -->
          </div><!-- /.col-xl-5 -->
          <div class="col-12 col-xl-7 d-flex align-items-center pl-50 pr-0">
            <div class="banner-img">
              <div class="bg-img">
                <img src="{{ URL::to('website/assets/images/banners/8.jpg') }}" alt="backgrounds">
              </div>
            </div>
            <div class="banner-shape"></div>
          </div><!-- /.col-xl-7 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Banner Layout8 -->
</div>
