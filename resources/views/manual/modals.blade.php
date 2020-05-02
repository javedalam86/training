  <!--begin::View Modal-->
<div class="modal fade" id="manualview_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Manual Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="manual" class="form-control-label">Manual:</label>
            <input type="text" class="form-control" value="" name="manual_title" id="manual_title" readonly="">
          </div>
          <div class="form-group">
            <label for="manual" class="form-control-label">Order:</label>
            <input type="number" autocomplete="off" placeholder="0" class="form-control"  id="section_order" readonly="">
          </div>
          <div class="form-group">
            <label for="option_aEdit" class="form-control-label">Description:</label>
            <textarea  rows="9" class="form-control" id="description"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div>

  <!--begin::Add Modal-->
<div class="modal fade" id="manualadd_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Manual</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      {{ Form::open(array('method'=>'post','url' => 'manualadd', 'id'=>'manualadd', 'enctype'=>"multipart/form-data")) }}
        <div class="modal-body">
          <div class="alert alert-danger" style="display:none" id='addmanualmessage'> </div>
          <div class="form-group">
            <label for="manual" class="form-control-label">Manual:</label>
            <input type="text" class="form-control" required='required'  name="manual_title" id="manual_title">
          </div>
          <div class="form-group">
            <label for="manual" class="form-control-label">Order:</label>
            <input type="number" autocomplete="off" placeholder="0" class="form-control" required='required'  name="section_order" id="section_order">
          </div>
          <div class="form-group">
            <label for="option_aEdit" class="form-control-label">Description:</label>
            <textarea name="manual_text"  id="manual_text" class="summernote" rows="18"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="addManualSBtn">Add Manual</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--end::Modal-->
<!--begin::Edit manual Modal-->
<div class="modal fade" id="manualedit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Manual</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      {{ Form::open(array('method'=>'post','url' => 'manualedit', 'id'=>'manualedit')) }}
        <div class="modal-body">
          <div class="alert alert-danger" id='editmanualmessage'> </div>
          <div class="form-group">
            <label for="manual" class="form-control-label">Manual:</label>
            <input type="text" class="form-control" required='required'  name="manual_title" id="manual_titleEdit">
            <input type='hidden' name='manualId' id='manualId'>
          </div>
          <div class="form-group">
            <label for="manual" class="form-control-label">Order:</label>
            <input type="number" autocomplete="off" placeholder="0" class="form-control" required='required'  name="section_order" id="section_order">
          </div>
          <div class="form-group">
            <label for="option_aEdit" class="form-control-label">Description</label>
            <textarea class="manual_textEdit" name="manual_text"  id="manual_textEdit" class="summernote" rows="10"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end::Modal-->

<!-- Confirm Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Manual</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{ Form::open(array('method'=>'post','url' => 'manualdelete', 'id'=>'manualdelete')) }}
        <div class="modal-body">
          Are you sure you want to delete this Manual?
          <input type='hidden' name='manualIdDelete' id='manualIdDelete'>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>