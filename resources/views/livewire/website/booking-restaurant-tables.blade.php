<div>
    <section class="page-title-layout2 page-title-light text-center pb-0 bg-overlay">
        <div class="bg-img"><img src="{{ URL::to('website/assets/images/banners/restBanner1.jpg') }}" style="height:200px;width:100%;" alt="background"></div>
        <div class="container">
          <div class="row">
            {{-- <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 offset-xl-3">
              <h1 class="pagetitle-heading">Res</h1>
            </div><!-- /.col-xl-6 --> --}}
          </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="breadcrumb-area">
          <div class="container">
            <nav>
              <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                  <a href="/"><i class="icon-home"></i> <span>{{ __('message.Home') }}</span></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('message.Booking Restaurants') }}</li>
              </ol>
            </nav>
          </div><!-- /.container -->
        </div><!-- /.breadcrumb-area -->
      </section><!-- /.page-title -->

      <section class="">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
              <div class="heading text-center mb-50">
                <h2 class="heading-subtitle">{{ __('message.G-Booking') }}</h2>
                <h3 class="heading-title">{{ __('message.Our') }} {{ __('message.Grand Restaurants') }}</h3>
              </div>
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
          <div class="row">

            @if(!empty($restaurantList))
              @foreach($restaurantList as $key => $row)
                  <!-- Post Item #1 -->
                  <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="post-item">
                      <div class="post-img">
                        <span class="post-meta-date">
                          <h6><span class="day"><i class='fas fa-star'></i>&nbsp;</span></h6>
                          {{-- @if(!empty($row->Discount))
                          <span class="day">Free delivery {{ !empty($row->Discount) ? $row->Discount.'% off' : ''}}</span>
                          @endif --}}
                        </span>
                        <a href="/GBooking/BookingRestaurant/seatinglayout/{{ base64_encode($row->id) }}" wire:navigate>
                          <img src="{{ asset('storage/'.$row->imgRestaurant	) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" height="250px" width="100%" alt="post image" loading="lazy">
                        </a>
                      </div><!-- /.post-img -->
                      <div class="post-body">
                        <h4 class="post-title"><a href="/GBooking/BookingRestaurant/seatinglayout/{{ base64_encode($row->id) }}" wire:navigate>{{!empty($row->translationValue->heading) ? ucwords($row->translationValue->heading) : ''}}</a></h4>
                        <p class="post-desc">{{!empty($row->translationValue->title) ? ucwords($row->translationValue->title) : ''}}</p>
                        <p class="post-desc">{{ __('message.Availability') }}:</p>
                        <div class="post-meta d-flex align-items-center">
                          <div class="post-meta-cat">
                            <?php   
                              $dateTime1 = DateTime::createFromFormat('H:i:s', $row->openTime);
                              $firstTime=$dateTime1->format('g:i A');

                              $dateTime2 = DateTime::createFromFormat('H:i:s', $row->closedtime);
                              $secondTime=$dateTime2->format('g:i A');
                              
                              ?>
                            <a href="/GBooking/BookingRestaurant/seatinglayout/{{ base64_encode($row->id) }}" wire:navigate>{{ ucfirst($row->openingDay) ?? ''}} {{ __('message.to') }} {{ ucfirst($row->closingday) ?? ''}}</a>
                          </div><!-- /.blog-meta-cat -->
                          <a class="post-meta-author" href="/GBooking/BookingRestaurant/seatinglayout/{{ base64_encode($row->id) }}" wire:navigate>{{ $firstTime ?? ''}} {{ __('message.to') }} {{ $secondTime ?? ''}}</a>
                        </div>
                       
                        <a href="/GBooking/BookingRestaurant/seatinglayout/{{ base64_encode($row->id) }}" wire:navigate class="btn btn-link">
                          <i class="plus-icon">+</i>
                          <span>{{ __('message.View More') }}</span>
                        </a>
                      </div><!-- /.post-body -->
                    </div><!-- /.post-item -->
                  </div><!-- /.col-lg-4 -->
              @endforeach
            @endif  
            
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.blog Grid -->
</div>
