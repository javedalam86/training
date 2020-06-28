 <!--begin::Add Modal-->
  <div class="modal fade" id="quize_result_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Quiz answers:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
      
          <div class="modal-body" style="height: 350px; overflow-y: auto;"> 
		    {{ Form::open(array('method'=>'post','url' => '', 'id'=>'submitquizevaluation')) }}			
				<div id='quizquestionList'> </div>			
				<div class="row col-lg-2" style="float: right;">
					<button type="submit" class="btn btn-primary">Save</button>
				</div> 
			</form>
          </div>
          <div class="modal-footer"></div>
       
      </div>
    </div>
  </div>
  <!--end::Modal-->
  <!--begin::Edit course Modal-->
  <div class="modal fade" id="courseedit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        {{ Form::open(array('method'=>'post','url' => 'courseedit', 'id'=>'courseedit')) }}
          <div class="modal-body">
            <div class="alert alert-danger" id='editcoursemessage'> </div>
            <div class="form-group">
              <label for="course" class="form-control-label">Course Type:</label>
              <select class="form-control" id="course_typeEdit" name="course_typeEdit">
                <option value="Basic">Basic</option>
                <option value="Advanced">Advance</option>
              </select>
            </div>
            <div class="form-group">
              <label for="course" class="form-control-label">Course:</label>
              <input type="text" required='required' class="form-control" id="nameEdit" name="nameEdit">
              <input type='hidden' name='courseId' id='courseId'>
            </div>
            <div class="form-group">
              <label for="option_aEdit" class="form-control-label">Description</label>
              <input type="text" required='required' class="form-control" id="descriptionEdit" name="descriptionEdit">
            </div>
            <div class="form-group">
              <label for="course" class="form-control-label">Price:</label>
              <input type="text" class="form-control" required='required' name="costEdit" id="costEdit">
            </div>
            <div class="form-group">
              <label for="course" class="form-control-label">Start Date:</label>
              <input type="text" class="form-control" required='required' name="startDateEdit" id="startDateEdit" autocomplete="off" />
            </div>
            <div class="form-group">
              <label for="course" class="form-control-label">End Date:</label>
              <input type="text" class="form-control" required='required' name="endDateEdit" id="endDateEdit" autocomplete="off" />
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          <div class="modal-footer"></div>
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
          <h5 class="modal-title" id="exampleModalLabel">Delete Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{ Form::open(array('method'=>'post','url' => 'coursedelete', 'id'=>'coursedelete')) }}
          <div class="modal-body">
            Are you sure you want to delete this Course?
            <input type='hidden' name='courseIdDelete' id='courseIdDelete'>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>