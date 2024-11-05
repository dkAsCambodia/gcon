<div>
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
      {{-- <section> --}}
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="contact-panel">
                <form wire:submit.prevent="saveTable" >
                    @foreach($seatlist as $item)
                        <div class="locations-panel">
                            <div class="locations-panel-header">&nbsp;&nbsp;
                             <h4 class="locations-panel-title">{{ !empty($item->sitting_table_name) ? ucwords($item->sitting_table_name) : '' }} : {{ !empty($item->price) ? $item->price.$item->currency_name : '' }}</h4>
                        </div><!-- /.locations-panel-header -->
                            <div class="screen"></div>
                                <div class="row">
                                
                                    @forelse($item->layoutRecord as $layout)
                                        <div 
                                            class="seat {{ in_array($layout->id, $sitting_layouts) ? 'checked' : '' }}" 
                                            wire:click="toggleSelection({{ $layout->id }})"
                                        >
                                            &nbsp;{{ !empty($layout->table_name) ? ucwords($layout->table_name) : '' }}
                                            <input 
                                                type="checkbox" 
                                                value="{{ $layout->id }}" 
                                                wire:model="sitting_layouts" 
                                                class="seat-checkbox" 
                                                {{ in_array($layout->id, $sitting_layouts) ? 'checked' : '' }}
                                            >
                                        </div>
                                    @empty
                                        <p>No layout records available.</p>
                                    @endforelse


                                    
                                </div> 
                                    {{-- <div class="seat">&nbsp;V2<input type="checbox" value="VVIP1" class="seat-checkbox"></div> --}}
                                    
            
                        </div><!-- /.locations-panel -->
                    @endforeach
                    <br/>
                    @if(!empty($totalPrice))
                    <button type="submit" class="btn btn-success btn-block mb-10">
                        <span>{{ __('message.Book Now') }} {{ !empty($item->price) ? $item->currency_name : '' }}{{ $totalPrice ?? ''}}</span> <i class="icon-arrow-right"></i>
                    </button>
                    @endif
                </form>
              </div>
            </div><!-- /.col-lg-7 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      {{-- </section><!-- /.contact layout 3 --> --}}
      <br/>
</div>
