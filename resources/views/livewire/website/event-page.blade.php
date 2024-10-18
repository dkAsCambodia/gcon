<div>
    <section class="blog-layout2 pb-50">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="heading-layout2">
                <h2 class="heading-title mb-50">{{ __('message.Special Events') }}</h2>
              </div>
            </div>
          </div>
          <div class="row">
            @if(!empty($eventList))
                @foreach($eventList as $key => $event)
                    <div class="col-sm-12 col-md-6 col-lg-6">
                            @php
                            $currentDate = date('Y-m-d');
                            @endphp
                    <!-- Post Item #1 -->
                    <div class="post-item featured-post">
                        
                        @if (strtotime($event->event_date) >= strtotime($currentDate)) 
                        <div class="post-img">
                        <a href="/GEntertainment/events/seatinglayout/{{base64_encode($event->id)}}" wire:navigate>
                            <img src="{{ asset('storage/'.$event->event_img) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" alt="post image" loading="lazy">
                        </a>
                        </div><!-- /.post-img -->
                        <div class="post-body">
                            <div class="post-meta d-flex align-items-center">
                                <div class="post-meta-cat">
                                <a href="/GEntertainment/events/seatinglayout/{{base64_encode($event->id)}}" wire:navigate>{{!empty($event->event_date) ? date('d M Y', strtotime($event->event_date)) : ''}}</a>
                                </div><!-- /.blog-meta-cat -->
                                    <a class="post-meta-author" href="/GEntertainment/events/seatinglayout/{{base64_encode($event->id)}}" wire:navigate><b>{{ __('message.Book Now') }}</b></a>
                            </div>
                            <a href="/GEntertainment/events/seatinglayout/{{base64_encode($event->id)}}" wire:navigate class="btn btn-link">
                                <i class="plus-icon">+</i>
                                <span>Read More</span>
                            </a>
                        </div><!-- /.post-body -->
                        @else
                            <div class="post-img">
                            <a href="#">
                                <img src="{{ asset('storage/'.$event->event_img) ?? 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg' }}" alt="post image" loading="lazy">
                            </a>
                            </div><!-- /.post-img -->
                            <div class="post-body">
                                <div class="post-meta d-flex align-items-center">
                                    <div class="post-meta-cat">
                                    <a href="#">{{!empty($event->event_date) ? date('d M Y', strtotime($event->event_date)) : ''}}</a>
                                    </div><!-- /.blog-meta-cat -->
                                </div>
                                <a href="blog-single-post.html" class="btn btn-link">
                                    <i class="plus-icon">+</i>
                                    <span>Read More</span>
                                </a>
                            </div><!-- /.post-body -->



                        @endif

                    </div><!-- /.post-item -->
                    </div><!-- /.col-lg-4 -->
                @endforeach
            @endif 
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.blog Grid -->
</div>
