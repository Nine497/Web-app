<div class="modal fade" id="borrowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <button type="button" id="first-tab-button" class="btn btn-primary" data-toggle="tab" href="#first-tab"
          role="tab" aria-controls="first-tab" aria-selected="true">Page 1</button>
        <button type="button" id="second-tab-button" class="btn btn-secondary" data-toggle="tab" href="#second-tab"
          role="tab" aria-controls="second-tab" aria-selected="false">Page 2</button>
      </div>
      <div class="modal-body">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="first-tab" role="tabpanel" aria-labelledby="first-tab-button">
            <!-- Content for page 1 goes here -->
          </div>
          <div class="tab-pane fade" id="second-tab" role="tabpanel" aria-labelledby="second-tab-button">
            <!-- Content for page 2 goes here -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>