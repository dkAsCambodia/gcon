<section class="services-layout1 services-carousel pb-0">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
          <div class="heading text-center mb-50">
            <h2 class="heading-subtitle">{{ __('message.G-Service') }}</h2>
            <h3 class="heading-title">{{ __('message.Our') }} {{ __('message.G-Service') }}</h3>
          </div>
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="slick-carousel"
            data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": true, "responsive": [ {"breakpoint": 1100, "settings": {"slidesToShow": 2}},{"breakpoint": 992, "settings": {"slidesToShow": 1}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
            @if(!empty($serviceLists))
                @foreach($serviceLists as $key => $service)
                    <!-- service item #1 -->
                    <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('storage/'.$service->image) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" height="220px" width="370" alt="service">
                    </div><!-- /.service-img -->
                    <div class="service-body">
                        <div class="service-category">
                        <a href="#">Grand</a>
                        <a href="#">Diamond</a>
                        </div>
                        <h4 class="service-title">
                        <a href="research-single.html">{{!empty($service->translationValue->GBookingname) ? ucwords($service->translationValue->GBookingname) : ''}}</a>
                        </h4>
                        <p class="service-desc">{{!empty($service->translationValue->desc) ? ucwords($service->translationValue->desc) : ''}}</p>
                        <a href="research-single.html" class="btn btn-link btn-primary">
                        <i class="plus-icon">+</i>
                        <span>{{ __('message.View More') }}</span>
                        </a>
                    </div><!-- /.service-body -->
                    </div><!-- /.service-item -->
                @endforeach
            @endif 
  
          </div><!-- /.carousel -->
        </div><!-- /.col-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.Services Layout 1 -->