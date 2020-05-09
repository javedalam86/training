  <!--begin::View Modal-->
<div class="modal fade" id="auditview_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Audit Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="audit" class="form-control-label">Audit:</label>
            <input type="text" class="form-control" value="" name="audit_title" id="audit_title" readonly="">
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
<div class="modal fade" id="auditadd_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Audit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      {{ Form::open(array('method'=>'post','url' => 'auditadd', 'id'=>'auditadd', 'enctype'=>"multipart/form-data")) }}
        <div class="modal-body">
          <div class="alert alert-danger" style="display:none" id='addauditmessage'> </div>
          <div class="form-group">
            <label for="audit" class="form-control-label">Audit:</label>
            <input type="text" class="form-control" required='required'  name="audit_title" id="audit_title">
          </div>
          
          <div class="form-group">
            <label for="option_aEdit" class="form-control-label">Description:</label>
            <textarea name="audit_text"  id="audit_text" class="summernote" rows="18"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="addManualSBtn">Add Audit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--end::Modal-->
<!--begin::Edit audit Modal-->
<div class="modal fade" id="auditedit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Audit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      {{ Form::open(array('method'=>'post','url' => 'auditedit', 'id'=>'auditedit')) }}
        <div class="modal-body">
          <div class="alert alert-danger" id='editauditmessage'> </div>
          <div class="form-group">
            <label for="audit" class="form-control-label">Audit:</label>
            <input type="text" class="form-control" required='required'  name="audit_title" id="audit_titleEdit">
            <input type='hidden' name='auditId' id='auditId'>
          </div>
      
          <div class="form-group">
            <label for="option_aEdit" class="form-control-label">Description</label>
            <textarea class="audit_textEdit" name="audit_text"  id="audit_textEdit" class="summernote" rows="10"></textarea>
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
        <h5 class="modal-title" id="exampleModalLabel">Delete Audit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{ Form::open(array('method'=>'post','url' => 'auditdelete', 'id'=>'auditdelete')) }}
        <div class="modal-body">
          Are you sure you want to delete this Audit?
          <input type='hidden' name='auditIdDelete' id='auditIdDelete'>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>