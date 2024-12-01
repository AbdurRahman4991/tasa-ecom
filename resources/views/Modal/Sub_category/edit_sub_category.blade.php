  <!-- Modal -->
  <div class="modal fade" id="editeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit sub category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div class="input-groupe">
                    <label for="">Category name</label>
                    <select name="subCategory" class="form-select" id="">
                        <option value="">Oile</option>
                        <option value="">Food</option>
                        <option value="">Fruite</option>
                    </select>
                    <div class="input-groupe">
                        <label for="">Sub category</label>
                        <input type="text" name='subCategory' placeholder="sub category" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>
