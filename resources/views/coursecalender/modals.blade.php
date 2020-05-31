<!--     Edit Event  -->
<div class="modal fade" id="edit_event_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content admin-form">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Course Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div id="edit_event_alert"></div>
        <form id="edit_event_frm" action=""  method="post" enctype="multipart/form-data"  >
             {{ csrf_field() }}

          <div class="row">
            <div class="col-lg-12 col-xs-12">
              <div class="form-group">
                <label class="col-lg-4 col-xs-4">Event Title</label>
                <div class="col-lg-8 col-xs-8" id="edit_event_title"></div>
              </div>
              <input type="hidden" id="edit_event_id" value="" name="id" />
            </div>
          </div>

           <div class="row">
            <div class="col-lg-12 col-xs-12">
              <div class="form-group">
                <label class="col-lg-4 col-xs-4">Price</label>
                <div class="col-lg-8 col-xs-8" id="edit_price"></div>
              </div>
              <input type="hidden" id="edit_event_id" value="" name="id" />
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-xs-12">
              <div class="form-group">
                <label class="col-lg-4 col-xs-4">Start Date</label>
                <div class="col-lg-8 col-xs-8" id="edit_event_start_date"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-xs-12">
              <div class="form-group">
                <label class="col-lg-4 col-xs-4">End Date</label>
                <div class="col-lg-8 col-xs-8" id="edit_event_end_date"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-xs-12">
              <div class="form-group">
                <label class="col-lg-4 col-xs-4">Event Description</label>
                <div class="col-lg-8 col-xs-8" id="edit_event_description"></div>
              </div>
            </div>
          </div>
          <!-- end section row -->
        </form>
      </div>
      <div class="modal-footer">
         <button type="button" id="edit_event_btn"  class="btn btn-primary">Buy</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

      <!--begin::Modal-->
<div class="modal fade" id="userLoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
     <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Login</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           </button>
        </div>
        <form method="POST" id='Login'>
           <div class="modal-body">
              <div class='alert alert-success' style="display:none" id="loginsuccess-msg"></div>
              <div class="form-group row">
                 <label for="email" class="login-modal col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                 <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="text-danger">
                    <strong id="email-errorlogin"></strong>
                    </span>
                 </div>
              </div>
              <div class="form-group row">
                 <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                 <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span class="text-danger">
                    <strong id="password-errorlogin"></strong>
                    </span>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="button" id='submitLoginForm' class="training_btnpopup btn btn-primary">Login</button>
                <button type="button" class="training_btnpopup btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
           </div>
        </form>
     </div>
  </div>
</div>