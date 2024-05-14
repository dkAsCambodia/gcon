<section class="pricing pb-0">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
          <div class="heading text-center mb-50">
            <h2 class="heading-subtitle">{{ __('message.Booking Now') }}</h2>
            <h5>{{ __('message.Booking Now title') }}</h5>
          </div>
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="pricing-widget-layout1 mb-30">
            <h5 class="pricing-title">{{ __('message.G-Entertainment') }}</h5>
            <ul class="pricing-list list-unstyled mb-0">
                @forelse($entertainments as $key => $entertainment)
                <li><span><a href="/{{ $entertainment->recognize."/".$entertainment->BookingType ?? ''}}" wire:navigate>{{!empty($entertainment->translationValue->GBookingname) ? ucwords($entertainment->translationValue->GBookingname) : ''}}</a></span><a href="/{{ $entertainment->recognize."/".$entertainment->BookingType ?? ''}}" wire:navigate><span class="price"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a></li>
                @empty
                <li><span>Not Found! </span><span class="price"></span></li>
                @endforelse
          </div>
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="pricing-widget-layout2 mb-30">
            <h5 class="pricing-title">{{ __('message.G-Booking') }}</h5>
            <ul class="pricing-list list-unstyled mb-0">
                @forelse($bookings as $key => $booking)
                <li><span><a href="/{{ $booking->recognize."/".$booking->BookingType ?? ''}}" wire:navigate>{{!empty($booking->translationValue->GBookingname) ? ucwords($booking->translationValue->GBookingname) : ''}}</a></span><a href="/{{ $booking->recognize."/".$booking->BookingType ?? ''}}" wire:navigate><span class="price"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a></li>
                @empty
                <li><span>Not Found! </span><span class="price"></span></li>
                @endforelse
            </ul>
          </div>
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="pricing-widget-layout3 mb-30">
            <h5 class="pricing-title">{{ __('message.G-Service') }}</h5>
            <ul class="pricing-list list-unstyled mb-0">
                @forelse($services as $key => $service)
                <li><span><a href="/{{ $service->recognize."/".$service->BookingType ?? ''}}" wire:navigate>{{!empty($service->translationValue->GBookingname) ? ucwords($service->translationValue->GBookingname) : ''}}</a></span><a href="/{{ $service->recognize."/".$service->BookingType ?? ''}}" wire:navigate><span class="price"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a></li>
                @empty
                <li><span>Not Found! </span><span class="price"></span></li>
                @endforelse
            </ul>
          </div>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    
    </div><!-- /.container -->
  </section><!-- /.pricing -->