<div>
    <section class="page-title-layout2 page-title-light text-center pb-0 bg-overlay bg-parallax">
        <div class="bg-img"><img src="https://img.freepik.com/free-psd/food-menu-restaurant-facebook-cover-template_106176-384.jpg?size=626&ext=jpg" style="height:100%;width: 100%;" alt="background"></div>
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
                <li class="breadcrumb-item active" aria-current="page">{{ __('message.Restaurants') }}</li>
              </ol>
            </nav>
          </div><!-- /.container -->
        </div><!-- /.breadcrumb-area -->
      </section><!-- /.page-title -->

      <section class="blog-layout1 pb-70">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
              <div class="heading text-center mb-50">
                <h2 class="heading-subtitle">{{ __('message.G-Booking') }}</h2>
                <h3 class="heading-title">{{ __('message.Our') }} {{ __('message.list of restaurant on G-CON') }}</h3>
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
                          <h6><span class="day"><i class='fas fa-percentage'></i>&nbsp;{{ __('message.Free Delivery') }}</span></h6>
                          {{-- @if(!empty($row->Discount))
                          <span class="day">Free delivery {{ !empty($row->Discount) ? $row->Discount.'% off' : ''}}</span>
                          @endif --}}
                        </span>
                        <a href="/GBooking/restaurant/foods/{{ base64_encode($row->id) }}" wire:navigate>
                          <img src="{{ asset('storage/'.$row->imgRestaurant	) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" height="250px" width="100%" alt="post image" loading="lazy">
                        </a>
                      </div><!-- /.post-img -->
                      <div class="post-body">
                        <h4 class="post-title"><a href="/GBooking/restaurant/foods/{{ base64_encode($row->id) }}" wire:navigate>{{!empty($row->translationValue->heading) ? ucwords($row->translationValue->heading) : ''}}</a></h4>
                        <p class="post-desc">{{!empty($row->translationValue->title) ? ucwords($row->translationValue->title) : ''}}</p>
                        <p class="post-desc">{{ __('message.Available Daily') }}:</p>
                        <div class="post-meta d-flex align-items-center">
                          <div class="post-meta-cat">
                            <?php   
                              $dateTime1 = DateTime::createFromFormat('H:i:s', $row->openTime);
                              $firstTime=$dateTime1->format('g:i A');

                              $dateTime2 = DateTime::createFromFormat('H:i:s', $row->closedtime);
                              $secondTime=$dateTime2->format('g:i A');
                              
                              ?>
                            <a href="/GBooking/restaurant/foods/{{ base64_encode($row->id) }}" wire:navigate>{{ ucfirst($row->openingDay) ?? ''}} {{ __('message.to') }} {{ ucfirst($row->closingday) ?? ''}}</a>
                          </div><!-- /.blog-meta-cat -->
                          <a class="post-meta-author" href="/GBooking/restaurant/foods/{{ base64_encode($row->id) }}" wire:navigate>{{ $firstTime ?? ''}} {{ __('message.to') }} {{ $secondTime ?? ''}}</a>
                        </div>
                       
                        <a href="/GBooking/restaurant/foods/{{ base64_encode($row->id) }}" wire:navigate class="btn btn-link">
                          <i class="plus-icon">+</i>
                          <span>{{ __('message.View More') }}</span>
                        </a>
                      </div><!-- /.post-body -->
                    </div><!-- /.post-item -->
                  </div><!-- /.col-lg-4 -->
              @endforeach
            @endif  
            
           
          </div><!-- /.row -->
          {{-- <div class="row">
            <div class="col-12 text-center">
              <nav class="pagination-area">
                <ul class="pagination justify-content-center mb-0">
                  <li><a class="current" href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#"><i class="icon-arrow-right"></i></a></li>
                </ul>
              </nav><!-- .pagination-area -->
            </div><!-- /.col-12 -->
          </div><!-- /.row --> --}}
        </div><!-- /.container -->
      </section><!-- /.blog Grid -->
      <section class="banner-layout3 py-0">
        <div class="top-shape"></div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-xl-6 banner-img d-flex align-items-center">
              <div class="bg-img">
                <img src="https://images.deliveryhero.io/image/foodpanda/home-vendor-kh.jpg?width=1400&height=896" alt="backgrounds">
              </div>
              <div class="banner-shape"></div>
            </div><!-- /.col-lg-6 -->
            <div class="col-12 col-xl-6 banner-content">
              <div class="banner-text">
                <div class="heading-layout2 heading-light">
                  <h3 class="heading-title">{{ __('message.Do you want to become our partner and increase your revenue') }}!</h3>
                  <p class="heading-desc mb-10">{{ __('message.Would you like millions of new customers to enjoy your amazing food and groceries? So would we') }}!</p>
                  <p class="heading-desc mb-10">{{ __("message.It's simple: we list your menu and product lists online, help you process orders, pick them up, and deliver them to hungry – in a heartbeat") }}!</p>
                  <p class="heading-desc mb-10">{{ __("message.Interested? Let's start our partnership today") }}!</p>
                </div>
                <div class="mx-80 mt-20">
                  <a href="/GBooking/restaurant/newSeller" wire:navigate class="btn btn-white btn-xl">
                    <span>{{ __('message.Get started') }}</span> <i class="icon-arrow-right"></i>
                  </a>
                </div>
              </div><!-- /.banner-text -->
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.Banner Layout3 -->

</div>
