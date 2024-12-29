  <!-- Modal -->
  <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="productForm" enctype="multipart/form-data">
                @csrf
                <!-- Category and Subcategory -->
                <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="category" class="form-label">Category</label>
                      <select name="category" id="category" class="form-select">
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="subcategory" class="form-label">Subcategory</label>
                      <select name="subcategory" id="subcategory" class="form-select">
                        <option value="">Select Subcategory</option>
                      </select>
                    </div>
                  </div>


                <!-- Brand and Title -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="brandName" class="form-label">Brand Name</label>
                    <input type="text" name="brand" class="form-control" placeholder="Brand Name">
                  </div>
                  <div class="col-md-6">
                    <label for="productName" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Product Name">
                  </div>
                </div>

                <!-- Price, Discount Price, and Quantity -->
                <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" placeholder="Price">
                  </div>
                  <div class="col-md-4">
                    <label for="discountPrice" class="form-label">Discount Price</label>
                    <input type="number" name="discountPrice" class="form-control" placeholder="Discount Price %">
                  </div>
                  <div class="col-md-4">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" placeholder="Quantity">
                  </div>
                </div>

                <!-- colro, size, and meterial -->
                <div class="row mb-3">
                    <div class="col-md-4">
                      <label for="price" class="form-label">Color</label>
                      <input type="text" name="color" class="form-control" placeholder="color">
                    </div>
                    <div class="col-md-4">
                      <label for="size" class="form-label">Size</label>
                      <input type="text" name="size" class="form-control" placeholder="size">
                    </div>
                    <div class="col-md-4">
                      <label for="material" class="form-label">Material</label>
                      <input type="text" name="material" class="form-control" placeholder="Material">
                    </div>
                  </div>

                <!-- Features with Add/Remove Functionality -->
                <div class="row mb-3">
                  <div class="col-12">
                    <label for="features" class="form-label">Features</label>
                    <div id="featuresWrapper">
                      <div class="input-group mb-2">
                        <input type="text" name="features[]" class="form-control" placeholder="Feature">
                        <button type="button" class="btn btn-danger btn-remove-feature">Remove</button>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="addFeatureBtn">Add Feature</button>
                  </div>
                </div>

                <!-- Description and Status -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Description">
                  </div>
                  <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" name="status" class="form-control" placeholder="Status">
                  </div>
                </div>

                <!-- Images with Preview -->
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="frontImg" class="form-label">Front Image</label>
                    <input type="file" name="frontImg" class="form-control image-input" id="frontImg">
                    <img id="previewFrontImg" class="img-preview mt-2" src="#" alt="Front Image Preview" style="display:none; max-width: 100%; height: auto;">
                  </div>
                  <div class="col-md-3">
                    <label for="backImg" class="form-label">Back Image</label>
                    <input type="file" name="backImg" class="form-control image-input" id="backImg">
                    <img id="previewBackImg" class="img-preview mt-2" src="#" alt="Back Image Preview" style="display:none; max-width: 100%; height: auto;">
                  </div>
                  <div class="col-md-3">
                    <label for="leftImg" class="form-label">Left Image</label>
                    <input type="file" name="leftImg" class="form-control image-input" id="leftImg">
                    <img id="previewLeftImg" class="img-preview mt-2" src="#" alt="Left Image Preview" style="display:none; max-width: 100%; height: auto;">
                  </div>
                  <div class="col-md-3">
                    <label for="rightImg" class="form-label">Right Image</label>
                    <input type="file" name="rightImg" class="form-control image-input" id="rightImg">
                    <img id="previewRightImg" class="img-preview mt-2" src="#" alt="Right Image Preview" style="display:none; max-width: 100%; height: auto;">
                  </div>
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
