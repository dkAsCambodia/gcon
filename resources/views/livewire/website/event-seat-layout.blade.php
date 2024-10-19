<div>
    <style>
.seat {
    color: #1ea83c;
    border:1px solid #1ea83c;
    height: 40px;
    width: 55px;
    margin: 3px;
    cursor: pointer;
    text-align: center;
    line-height: 37px;
}
.seat:hover {
    color: #fff;
    background-color: #1ea83c;
    border:1px solid #1ea83c;
    height: 40px;
    width: 55px;
    margin: 3px;
    text-align: center;
}
input.seat-checkbox {
    visibility: hidden;
    height: 0px;
    width: 0px;
}
    </style>
    <section class="page-title-layout4 py-0">
        <div class="breadcrumb-area">
          <div class="container">
              <nav>
              <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                  <a href="/" wire:navigate><i class="icon-home"></i> <span>{{ __('message.Home') }}</span></a>
                  </li>
                  <li class="breadcrumb-item">
                  <a href="#"> {{ __('message.G-Entertainment') }} </a>
                  </li>
                  <li class="breadcrumb-item">
                  <a href="/GEntertainment/events" wire:navigate>{{ __('message.Special Events') }}</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">{{ __('message.Seating Layout') }}</li>
              </ol>
              </nav>
          </div><!-- /.container -->
        </div><!-- /.breadcrumb-area --> 
      </section><!-- /.page-title -->
    <section class="blog-layout2">
        <div class="container">
          <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <!-- Post Item #1 -->
                    <div class="post-item featured-post">
                            <div class="post-img">
                            <a href="#">
                                <img src="{{ asset('storage/'.$event->event_img) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" alt="post image"  height="370px" loading="lazy">
                            </a>
                            </div><!-- /.post-img -->
                            <div class="post-body">
                                <div class="post-meta d-flex align-items-center">
                                    <div class="post-meta-cat">
                                    <a href="/GEntertainment/events/seatinglayout/{{base64_encode($event->id)}}" wire:navigate>{{!empty($event->event_date) ? date('d M Y', strtotime($event->event_date)) : ''}}</a>
                                    </div><!-- /.blog-meta-cat -->
                                </div>
                                <a href="/GEntertainment/events/seatinglayout/{{base64_encode($event->id)}}" wire:navigate class="btn btn-link">
                                    <i class="plus-icon">+</i>
                                    <span>Read More</span>
                                </a>
                            </div><!-- /.post-body -->
                    </div><!-- /.post-item -->
                </div><!-- /.col-lg-4 -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <!-- Post Item #1 -->
                    <div class="post-item featured-post">
                            <div class="post-img">
                            <a href="#">
                                <img src="{{ URL::to('website/assets/images/sitlayout.png') }}" alt="post image"  height="370px" loading="lazy">
                            </a>
                            </div><!-- /.post-img -->
                            <div class="post-body">
                                <div class="post-meta d-flex align-items-center">
                                    <div class="post-meta-cat">
                                    <a href="#">{{ __('message.Seating Layout') }}</a>
                                    </div><!-- /.blog-meta-cat -->
                                </div>
                                <a href="/GEntertainment/events/seatinglayout/{{base64_encode($event->id)}}" wire:navigate class="btn btn-link">
                                    <i class="plus-icon">+</i>
                                    <span>Read More</span>
                                </a>
                            </div><!-- /.post-body -->
                    </div><!-- /.post-item -->
                </div><!-- /.col-lg-4 -->
               
           
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.blog Grid -->
      {{-- <section class=""> --}}
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                @foreach($seatlist as $key => $event)
                    <div class="locations-panel">
                        <div class="locations-panel-header">
                        <h4 class="locations-panel-title">Section V </h4>
                        </div><!-- /.locations-panel-header -->

                        <div class="screen"></div>
                            <div class="row">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="seat">&nbsp;VVIP1<input type="checbox" value="VVIP1" class="seat-checkbox"></div>
                                <div class="seat">&nbsp;V2<input type="checbox" value="VVIP1" class="seat-checkbox"></div>
                                <div class="seat">&nbsp;V3<input type="checbox" value="VVIP1" class="seat-checkbox"></div>
                                <div class="seat">&nbsp;V4<input type="checbox" value="VVIP1" class="seat-checkbox"></div>
                                <div class="seat">&nbsp;V5<input type="checbox" value="VVIP1" class="seat-checkbox"></div>
                                <div class="seat">&nbsp;V6<input type="checbox" value="VVIP1" class="seat-checkbox"></div>
                                <div class="seat">&nbsp;V7<input type="checbox" value="VVIP1" class="seat-checkbox"></div>
                                <div class="seat">&nbsp;V8<input type="checbox" value="VVIP1" class="seat-checkbox"></div>
                            </div>
                    </div><!-- /.locations-panel -->
                @endforeach
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      {{-- </section><!-- /.locations --> --}}

      <br/><br/>
</div>
