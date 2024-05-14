<section class="services-layout2">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ul class="list-filter d-flex flex-wrap justify-content-center list-unstyled mb-30">
            <li><a class="filter active" href="#" data-filter="all">G-Entertainment </a></li>
          </ul><!-- /.portfolio-filter  -->
        </div><!-- /.col-lg-12 -->
      </div>
      <div id="filtered-items" class="row">
        @if(!empty($entertainmentLists))
            @foreach($entertainmentLists as $key => $entertainment)
                <!-- service item #1 -->
                <div class="col-sm-12 col-md-12 col-lg-6 mix filter-pandemic">
                <div class="service-item">
                    <div class="service-img">
                    <div class="bg-img"><img src="{{ asset('storage/'.$entertainment->image) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" alt="service"></div>
                    </div><!-- /.service-img -->
                    <div class="service-body">
                    <div class="service-category">
                        <a href="#">Grand</a>
                        <a href="#">Diamond</a>
                    </div>
                    <h4 class="service-title">
                        <a href="/{{ $entertainment->recognize."/".$entertainment->BookingType ?? ''}}" wire:navigate>{{!empty($entertainment->translationValue->GBookingname) ? ucwords($entertainment->translationValue->GBookingname) : ''}}</a>
                    </h4>
                    <p class="service-desc">{{!empty($entertainment->translationValue->desc) ? ucwords($entertainment->translationValue->desc) : ''}}</p>
                    <a href="/{{ $entertainment->recognize."/".$entertainment->BookingType ?? ''}}" wire:navigate class="btn btn-link btn-primary">
                        <i class="plus-icon">+</i>
                        <span>{{ __('message.View More') }}</span>
                    </a>
                    </div><!-- /.service-body -->
                </div><!-- /.service-item -->
                </div><!-- /.col-lg-4 -->
            @endforeach
        @endif 
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.Services Layout 2 -->