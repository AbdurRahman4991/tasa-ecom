<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="updateCategoryForm" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="categoryName" class="form-label">Name</label>
                    <input type="text" name="categoryName" id="categoryName" class="form-control">
                </div>
                <button type="submit" class="btn btn-danger">Save</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
