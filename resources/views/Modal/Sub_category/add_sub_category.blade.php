

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add sub category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="subCategoryForm">
                @csrf
                <div class="mb-3">
                    <label for="category" class="form-label">Category name</label>
                    <select name="category" id="category" class="form-select">
                        @foreach ($category as $categories)
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="subCategory" class="form-label">Sub category</label>
                    <input type="text" name="subCategory" id="subCategory" class="form-control" placeholder="Sub category">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
      </div>
    </div>
  </div>
