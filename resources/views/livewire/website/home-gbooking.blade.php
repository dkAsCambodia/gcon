<!-- ========================G booking list=========================== -->
<section class="services-layout4 pb-0">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
          <div class="heading-layout2 text-center mb-50">
            <h2 class="heading-subtitle">{{ __('message.G-Booking') }}</h2>
            <h3 class="heading-title">{{ __('message.Our') }} {{ __('message.G-Booking') }}</h3>
          </div>
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="slick-carousel"
            data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": true, "responsive": [ {"breakpoint": 1100, "settings": {"slidesToShow": 2}},{"breakpoint": 992, "settings": {"slidesToShow": 1}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
            @if(!empty($bookingdata))
                @foreach($bookingdata as $key => $booking)
                    <!-- service item #1 -->
                    <div class="service-item">
                    <div class="service-body">
                        <div class="service-icon">
                        <!-- <i class="icon-education4 icon-item"></i>
                        <i class="icon-education4 icon-item"></i> -->
                        <img src="{{ URL::to('website/assets/images/services/beachbarlogo.png') }}" height="100px" width="150" alt="service">
                        </div>
                        <h4 class="service-title">
                        <a href="/{{ $booking->recognize."/".$booking->BookingType ?? ''}}" wire:navigate>{{!empty($booking->translationValue->GBookingname) ? ucwords($booking->translationValue->GBookingname) : ''}}</a>
                        </h4>
                        <p class="service-desc">{{!empty($booking->translationValue->desc) ? ucwords($booking->translationValue->desc) : ''}}</p>
                    </div><!-- /.service-body -->
                    <div class="service-img">
                        <img src="{{ asset('storage/'.$booking->image) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" height="200px" width="600px" alt="service">
                    </div><!-- /.service-img -->
                    <a href="/{{ $booking->recognize."/".$booking->BookingType ?? ''}}" wire:navigate class="service-more">
                        <svg class="service-more-svg">
                        <path stroke-width="2px" stroke="white" fill="transparent"
                            d="M105.000,82.843 L104.995,82.843 C104.982,87.968 102.169,92.700 97.606,95.262 L62.390,115.041 C57.816,117.610 52.181,117.610 47.607,115.041 L12.390,95.262 C7.827,92.700 5.014,87.968 5.001,82.843 L5.000,82.843 L5.000,82.821 C5.000,82.817 4.999,82.812 4.999,82.808 L5.000,82.808 L5.000,39.148 L4.992,39.148 C4.992,34.010 7.810,29.262 12.383,26.694 L47.600,6.915 C52.174,4.346 57.809,4.346 62.383,6.915 L97.599,26.694 C102.157,29.253 104.967,33.977 104.987,39.094 L105.000,39.094 L105.000,82.843 Z">
                        </path>
                        </svg>
                        <i class="plus-icon">+</i>
                    </a>
                    </div><!-- /.service-item -->
                @endforeach
            @endif   
          </div><!-- /.slick-carousel -->
        </div><!-- /.col-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.Services Layout 4 -->