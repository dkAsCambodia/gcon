<section class="pb-80">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4">
          <aside class="sidebar has-marign-right sticky-top mb-50">
            <div class="widget widget-categories">
              <h5 class="widget-title">{{ __('message.My Dashboard') }}</h5>
              <div class="widget-content">
                @include('livewire.website.dashboard.sidebar')
              </div><!-- /.widget-content -->
            </div><!-- /.widget-categories -->
            
           
          </aside><!-- /.sidebar -->
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-12 col-md-12 col-lg-8">

          <div class="tabcontent widget-plan mb-60" id="profile">
            <livewire:website.dashboard.view-profile />
          </div><!-- /.widget-plan -->
          {{-- <div class="tabcontent text-block mb-50"  id="Myorder">
            <h5 class="text-block-title">What We Do?</h5>
            <p class="text-block-desc mb-20">An expanded panel of essential, conditionally essential amino acids, and
              non-essential amino acids provides clinical utility and supports the development of personalized
              treatments. A formula for a customized amino-acid blend is provided with each report, offering suggested
              replacement amounts based on test results.
            </p>
          </div><!-- /.text-block -->
          <div class="tabcontent text-block" id="Address">
            <h5 class="text-block-title">Health Tips & Info </h5>
            <p class="text-block-desc mb-20">Additionally, children’s reference ranges are designed to provide more
              accurate pediatric nutritional evaluations. Identifying metabolic blocks that can be treated
              nutritionally allows individual tailoring of interventions that maximize patient responses and lead to
              improved patient outcomes.</p>
          </div><!-- /.text-block --> --}}

        </div><!-- /.col-lg-8 -->
      </div><!-- /.row -->
    </div><!-- /.container -->

  </section>

  