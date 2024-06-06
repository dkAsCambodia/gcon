<section class="pb-40">
    <div class="container">
      <div class="row">
        
        <div class="col-sm-12 col-md-12 col-lg-8 offset-md-2">
          <div class="contact-panel">
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="contact-panel-title">{{ __('message.Cancellation Policy') }}</h4>
                </div>
                <div class="col-12">
                  <div class="border-top mb-30"></div>
                  <p class="mb-10">{{ __('message.cancelDesc1') }}.</p>
                  <p class="mb-10">{{ __('message.cancelDesc2') }}.</p>
                  <p class="mb-10">{{ __('message.cancelDesc3') }}.</p>
                </div><!-- /.col-lg-12 -->
                <div class="col-12">
                   <div class="form-group">
                       <label for="address">{{ __('message.Cancellation follow on online payment') }}</label>
                       <p class="mb-10"><i class="feature-icon"></i> {{ __('message.cancelCharge1') }}.</p>
                       <p class="mb-10">{{ __('message.cancelCharge2') }}.</p>
                   </div>
                </div>
                <div class="col-12">
                   <div class="form-group">
                       <p class="mb-30">{{ __('message.Last Updated') }} : JUN 2024</p>
                   </div>
                </div>
                <div class="col-12">
                   <div class="form-group mb-20">
                     {{-- <label class="mb-20">Special Hours and Access</label> --}}
                     <div class="d-flex flex-wrap checkbox-controls">
                       <div class="custom-control custom-checkbox">
                         <input type="checkbox"  wire:model="checked" class="custom-control-input" id="customCheck7" wire:change="processMark()">
                         <label class="custom-control-label" for="customCheck7">{{ __('message.I have read and accept the privacy & policy') }}</label>
                       </div>
                     </div>
                   </div>
                 </div><!-- /.col-lg-12 -->
                <div class="col-12">
                  <button wire:click.prevent="cancelButtonfun({{ base64_decode($recordId) ??  '' }})" type="button" {{$botton == 'inactive' ? 'disabled' : ''}} class="btn btn-secondary">
                    <span>{{ __('message.Submit') }} </span> <i class="icon-arrow-right"></i>
                  </button>
                  <a href="{{ url()->previous() }}" wire:navigate class="btn btn-primary btn-link btn-block">{{ __('message.Back') }}</a>
                </div>
                {{-- @endif --}}
              </div><!-- /.row -->
            
          </div>
        </div><!-- /.col-lg-8 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
    {{-- Code for Cancel Booking Js via sweetalert 2 START --}}
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          window.addEventListener('show-cancel-confirmation', event => {
              Swal.fire({
                  title: "{{ __('message.Are you sure?') }}",
                  text: "{{ __('message.You want to cancel this booking!') }}",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "{{ __('message.Yes, cancel it!') }}",
                  cancelButtonText: "{{ __('message.Cancel') }}"
              }).then((result) => {
                  if (result.isConfirmed) {
                      if (typeof Livewire !== 'undefined' && typeof Livewire.dispatch === 'function') {
                          Livewire.dispatch('cancelConcertTicket');
                      } else {
                          console.error('Livewire is not available or dispatch function is not defined.');
                      }
                  }
              });
          });
      });
    window.addEventListener('ticketCancelled', event => {
      Swal.fire(
          "{{ __('message.Cancelled') }}!",
          "{{ __('message.Your Booking has been Cancelled') }}.",
          'success',
        )
       
        setTimeout(() => {
          window.location.href="{{ url()->previous() }}";
        }, "2000");
    });
</script>
{{-- Code for Cancel Booking Js via sweetalert 2 END --}}
  </section>
