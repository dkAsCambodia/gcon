<div>
    <section class="page-title-layout2 page-title-light text-center pb-0 bg-overlay bg-parallax">
        <div class="bg-img"><img src="{{ URL::to('website/assets/images/banners/restaurantBanner.png') }}" style="height:100%;width: 100%;" alt="background"></div>
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
                  <a href="/"><i class="icon-home"></i> <span>Home</span></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('message.Restaurants') }}</li>
              </ol>
            </nav>
          </div><!-- /.container -->
        </div><!-- /.breadcrumb-area -->
      </section><!-- /.page-title -->
  
      <!-- ======================
        Blog Grid
      ========================= -->
      <section class="blog-layout1 pb-70">
        <div class="container">
          <div class="row">

            @if(!empty($restaurantList))
              @foreach($restaurantList as $key => $row)
                  <!-- Post Item #1 -->
                  <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="post-item">
                      <div class="post-img">
                        <span class="post-meta-date">
                          <h6><span class="day"><i class='fas fa-percentage'></i>&nbsp;Free Delivery</span></h6>
                          {{-- @if(!empty($row->Discount))
                          <span class="day">Free delivery {{ !empty($row->Discount) ? $row->Discount.'% off' : ''}}</span>
                          @endif --}}
                        </span>
                        <a href="#">
                          <img src="{{ asset('storage/'.$row->imgRestaurant	) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" alt="post image" loading="lazy">
                        </a>
                      </div><!-- /.post-img -->
                      <div class="post-body">
                        <h4 class="post-title"><a href="#">{{!empty($row->translationValue->heading) ? ucwords($row->translationValue->heading) : ''}}</a></h4>
                        <p class="post-desc">{{!empty($row->translationValue->title) ? ucwords($row->translationValue->title) : ''}}</p>
                        <p class="post-desc">Available Daily:</p>
                        <div class="post-meta d-flex align-items-center">
                          <div class="post-meta-cat">
                            <?php   
                              $dateTime1 = DateTime::createFromFormat('H:i:s', $row->openTime);
                              $firstTime=$dateTime1->format('g:i A');

                              $dateTime2 = DateTime::createFromFormat('H:i:s', $row->closedtime);
                              $secondTime=$dateTime2->format('g:i A');
                              
                              ?>
                            <a href="#">{{ ucfirst($row->openingDay) ?? ''}} to {{ ucfirst($row->closingday) ?? ''}}</a>
                          </div><!-- /.blog-meta-cat -->
                          <a class="post-meta-author" href="#">{{ $firstTime ?? ''}} to {{ $secondTime ?? ''}}</a>
                        </div>
                       
                        <a href="blog-single-post.html" class="btn btn-link">
                          <i class="plus-icon">+</i>
                          <span>Read More</span>
                        </a>
                      </div><!-- /.post-body -->
                    </div><!-- /.post-item -->
                  </div><!-- /.col-lg-4 -->
              @endforeach
            @endif  
            
           
          </div><!-- /.row -->
          <div class="row">
            <div class="col-12 text-center">
              <nav class="pagination-area">
                <ul class="pagination justify-content-center mb-0">
                  <li><a class="current" href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#"><i class="icon-arrow-right"></i></a></li>
                </ul>
              </nav><!-- .pagination-area -->
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.blog Grid -->
</div>
