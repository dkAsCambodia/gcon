
<section  class="about-layout2">
    <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-10 col-lg-8 col-xl-8 offset-md-2">
              <div class="author-meta d-flex flex-wrap align-items-center mr-30">
                  <div class="author-img">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/3/34/Estrela_azul_fundo_branco.PNG" alt="thumb">
                  </div>
                  <div>
                    <h4 class="author-title">{{ ucfirst($customer->name) ?? 'Guest' }}</h4>
                    <span class="author-desc"><strong>G-CON : {{ $customer->card_number ?? '' }}</strong></span>
                  </div>
                  <img src="{{ URL::to('website/assets/images/about/singnture2.png') }}" class="author-singnture" alt="singnture">
              </div><br/>
              <div class="about-Text">
                  <ul class="features-list-layout2 list-unstyled">
                      <li class="feature-item">
                          <i class="contact-icon icon-phone"></i>&nbsp;&nbsp;:&nbsp;&nbsp;
                          <h4 class="feature-title mb-0">{{ $customer->phone ?? '' }}</h4>
                      </li>
                      <li class="feature-item">
                          <i class="contact-icon icon-email"></i>&nbsp;&nbsp;:&nbsp;&nbsp; 
                          <h4 class="feature-title mb-0">{{ $customer->email ?? '' }}</h4>
                      </li>
                  </ul>
                  <div class="d-flex">
                      <ul class="social-icons list-unstyled mb-0 mr-30">
                          <li><a href="{{!empty($customer->line_id) ? $customer->line_id : '#'}}" target="_blank"><i class="fab fa-brands fa-line"></i></a></li>
                          <li><a href="{{!empty($customer->facebook_id) ? $customer->facebook_id : '#'}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="{{!empty($customer->instagram) ? $customer->instagram : '#'}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                      </ul><!-- /.social-icons -->
                  </div>
                  <br/>
                  <p class="mb-30"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;{{ ucfirst($customer->address) ?? '' }}, {{ ucfirst($customer->city) ?? '' }}, {{ ucfirst($customer->state) ?? '' }}, {{ ucfirst($customer->country) ?? '' }}</p>
                  <a href="/dashboard/updateProfile" wire:navigate class="btn btn-secondary mb-10">Edit <i class="fa fa-edit"></i></a>
              </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
  </section><!-- /.About Layout 2 -->
  