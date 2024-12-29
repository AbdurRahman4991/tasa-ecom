// Function to handle image preview
document.querySelectorAll(".image-input").forEach((input) => {
    input.addEventListener("change", function (event) {
        const file = event.target.files[0];
        const previewId =
            "preview" +
            event.target.id.charAt(0).toUpperCase() +
            event.target.id.slice(1);
        const previewImage = document.getElementById(previewId);

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
            };
            reader.readAsDataURL(file);
        } else {
            previewImage.src = "#";
            previewImage.style.display = "none";
        }
    });
});

// Add/Remove Feature Functionality
document.getElementById("addFeatureBtn").addEventListener("click", function () {
    const featuresWrapper = document.getElementById("featuresWrapper");
    const newFeature = document.createElement("div");
    newFeature.classList.add("input-group", "mb-2");
    newFeature.innerHTML = `
      <input type="text" name="features[]" class="form-control" placeholder="Feature">
      <button type="button" class="btn btn-danger btn-remove-feature">Remove</button>
    `;
    featuresWrapper.appendChild(newFeature);
});

document.addEventListener("click", function (event) {
    if (event.target.classList.contains("btn-remove-feature")) {
        event.target.closest(".input-group").remove();
    }
});

// Dependency category wise show subcategory

$(document).ready(function () {
    $("#category").change(function () {
        const categoryId = $(this).val();

        // Clear the subcategory dropdown
        $("#subcategory")
            .empty()
            .append('<option value="">Select Subcategory</option>');

        if (categoryId) {
            $.ajax({
                url: "dependncy", // Replace with the correct route
                type: "GET",
                data: { category_id: categoryId },
                success: function (response) {
                    if (response.length > 0) {
                        response.forEach(function (subcategory) {
                            $("#subcategory").append(
                                `<option value="${subcategory.id}">${subcategory.name}</option>`
                            );
                        });
                    }
                },
                error: function (xhr) {
                    console.error("Error loading subcategories:", xhr);
                },
            });
        }
    });
});

// Add new product

$(document).ready(function () {
    // Add Feature Button Click
    $("#addFeatureBtn").on("click", function () {
        $("#featuresWrapper").append(`
            <div class="input-group mb-2">
                <input type="text" name="features[]" class="form-control" placeholder="Feature">
                <button type="button" class="btn btn-danger btn-remove-feature">Remove</button>
            </div>
        `);
    });

    // Remove Feature Button Click
    $(document).on("click", ".btn-remove-feature", function () {
        $(this).closest(".input-group").remove();
    });

    // Image Preview
    $(".image-input").on("change", function (e) {
        const reader = new FileReader();
        const target = $(this).attr("id").replace("Img", "Preview");
        reader.onload = function (e) {
            $("#" + target)
                .attr("src", e.target.result)
                .show();
        };
        reader.readAsDataURL(this.files[0]);
    });

    // Submit Form via AJAX
    $("#productForm").on("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            url: "product-store", // Update with the correct route
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response.message);
                $("#exampleModal").modal("hide");
                $("#productForm")[0].reset();
                $(".img-preview").hide();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = "";
                    $.each(errors, function (key, value) {
                        errorMessage += value + "\n";
                    });
                    alert(errorMessage);
                } else {
                    alert("An error occurred. Please try again.");
                }
            },
        });
    });
});

// Index product //

$(document).ready(function () {
    $("#product-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "product-list", // Replace with your route URL
            type: "GET",
        },
        columns: [
            { data: "title", name: "title" },
            { data: "brand", name: "brand" },
            { data: "price", name: "price" },
            { data: "quantity", name: "quantity" },
            { data: "color", name: "color" },
            { data: "size", name: "size" },
            { data: "material", name: "material" },
            { data: "description", name: "description" },
            { data: "status", name: "status" },
            {
                data: "front_img",
                name: "front_img",
                render: function (data) {
                    return data
                        ? `<img src="${data}" alt="Front Image" width="50" height="50">`
                        : "No Image";
                },
                orderable: false,
                searchable: false,
            },
            {
                data: "id",
                name: "action",
                render: function (data) {
                    return ` <i class="fa-regular fa-pen-to-square edit-product"
                            data-bs-toggle="modal"
                            data-bs-target="#editProductModal"
                            data-id="${data}"
                            data-name="${data.title}"></i>
                        <i class="fa-solid fa-trash delete-product" data-bs-toggle="modal" data-bs-target="#deleteProductModal" data-id="${data.id}"></i>
                        <i class="fa-solid fa-eye show-product" data-bs-toggle="modal" data-bs-target="#detailsProductModal" data-id="${data.id}"></i>
                        `;
                },
                orderable: false,
                searchable: false,
            },
        ],
    });
});

// Edit product

$(document).on("click", ".edit-product", function () {
    let productId = $(this).data("id");
    console.log("Editing Product ID:", productId);

    $.ajax({
        url: `/products/${productId}/edit`,
        type: "GET",
        dataType: "json",
        success: function (response) {
            console.log("AJAX Response:", response);
            if (response.success) {
                let product = response.data;

                // Populate form fields
                $("#category").val(product.category.category_id);
                $("#subcategory").val(product.sub_category_id);
                $('input[name="brand"]').val(product.brand);
                $('input[name="title"]').val(product.title);
                $('input[name="price"]').val(product.price);
                $('input[name="discountPrice"]').val(product.discount);
                $('input[name="quantity"]').val(product.quantity);
                $('input[name="color"]').val(product.color);
                $('input[name="size"]').val(product.size);
                $('input[name="material"]').val(product.material);
                $('input[name="description"]').val(product.description);
                $('input[name="status"]').val(product.status);

                // Update feature fields dynamically
                $("#featuresWrapper").empty();
                if (product.featured && product.featured.length > 0) {
                    product.featured.forEach((feature) => {
                        $("#featuresWrapper").append(`
                            <div class="input-group mb-2">
                                <input type="text" name="features[]" class="form-control" value="${feature}">
                                <button type="button" class="btn btn-danger btn-remove-feature">Remove</button>
                            </div>
                        `);
                    });
                }

                // Handle image previews
                ["front_img", "back_img", "left_image", "right_img"].forEach(
                    (imgField) => {
                        if (product[imgField]) {
                            $(
                                `#preview${
                                    imgField.charAt(0).toUpperCase() +
                                    imgField.slice(1)
                                }`
                            )
                                .attr("src", product[imgField])
                                .show();
                        } else {
                            $(
                                `#preview${
                                    imgField.charAt(0).toUpperCase() +
                                    imgField.slice(1)
                                }`
                            ).hide();
                        }
                    }
                );
            } else {
                alert("Product not found!");
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", status, error);
            alert("An error occurred while fetching product details.");
        },
    });
});

// Update product //

$("#productForm").submit(function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    $.ajax({
        url: "/products/update", // Replace with your update route
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success) {
                alert("Product updated successfully!");
                $("#editProductModal").modal("hide");
                $("#product-table").DataTable().ajax.reload(); // Reload the DataTable
            } else {
                alert("Failed to update product.");
            }
        },
        error: function () {
            alert("An error occurred while updating the product.");
        },
    });
});
