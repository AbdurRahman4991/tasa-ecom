$("#subcategory").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: "sub-category/create",
        type: "GET",
        data: function (d) {
            d._token = $('meta[name="csrf-token"]').attr("content");
        },
    },
    columns: [
        { data: "category.name", name: "category.name", title: "Category" },
        { data: "name", name: "name", title: "Subcategory" },
        {
            data: null,
            name: "action",
            title: "Action",
            orderable: false,
            searchable: false,
            render: function (data) {
                return `
                    <i class="fa-regular fa-pen-to-square edit-sub-category"
                        data-bs-toggle="modal"
                        data-bs-target="#editeModal"
                        data-category-id="${data.category_id}"
                        data-id="${data.id}"
                        data-name="${data.name}">
                    </i>
                    <i class="fa-solid fa-trash delete-sub-category"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteSubCategoryModal"
                        data-id="${data.id}">
                    </i>
                `;
            },
        },
    ],
    order: [[1, "asc"]],
});

$(document).ready(function () {
    $("#subCategoryForm").on("submit", function (e) {
        e.preventDefault();

        let formData = {
            category: $("#category").val(),
            subCategory: $("#subCategory").val(),
            _token: $('input[name="_token"]').val(),
        };

        $.ajax({
            url: $(this).data("action"), // Use the data-action attribute
            method: "POST",
            data: formData,
            success: function (response) {
                alert("Subcategory added successfully!");
                $("#exampleModal").modal("hide");
                $("#subCategoryForm")[0].reset();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    if (errors.category) {
                        $("#categoryError").text(errors.category[0]).show();
                    }
                    if (errors.subCategory) {
                        $("#subCategoryError")
                            .text(errors.subCategory[0])
                            .show();
                    }
                } else {
                    alert("An error occurred. Please try again.");
                }
            },
        });
    });
});

// Edit data

// $(document).on("click", ".edit-sub-category", function () {
//     const categoryId = $(this).data("category-id");
//     const subcategory = $(this).data("name");

//     console.log("Category ID:", categoryId);
//     console.log("Subcategory:", subcategory);

//     $("input[name='subCategory']").val(subcategory);
//     $("select[name='category']").val(categoryId).change();
// });

$(document).on("click", ".edit-sub-category", function () {
    const subcategoryId = $(this).data("id"); // Get subcategory ID
    const categoryId = $(this).data("category-id");
    const subcategory = $(this).data("name");

    console.log("Subcategory ID:", subcategoryId);
    console.log("Category ID:", categoryId);
    console.log("Subcategory:", subcategory);

    // Set values in the modal
    $("input[name='subCategory']").val(subcategory);
    $("select[name='category']").val(categoryId).change();

    // Store the subcategory ID in the form
    $("#updatesubCategoryForm").data("id", subcategoryId);
});

$("#updatesubCategoryForm").on("submit", function (e) {
    e.preventDefault(); // Prevent normal form submission

    const subcategoryId = $(this).data("id"); // Retrieve the stored subcategory ID
    const formData = $(this).serialize(); // Serialize form data

    console.log("Form Data:", formData);

    $.ajax({
        url: "/sub-category/" + subcategoryId, // Backend route to update the subcategory
        method: "PUT", // HTTP method
        data: formData,
        success: function (response) {
            console.log("Success Response:", response);

            if (response.success) {
                alert("Subcategory updated successfully!");
                $("#editeModal").modal("hide"); // Close the modal
                location.reload(); // Reload the page to reflect changes
            } else {
                alert(response.message || "Failed to update subcategory.");
            }
        },
        error: function (xhr) {
            console.error("Error Response:", xhr);

            if (xhr.responseJSON && xhr.responseJSON.errors) {
                const errors = xhr.responseJSON.errors;

                if (errors.category) {
                    $("#category").addClass("is-invalid");
                    $("#category")
                        .next(".invalid-feedback")
                        .text(errors.category[0]);
                }

                if (errors.subCategory) {
                    $("#subCategory").addClass("is-invalid");
                    $("#subCategory")
                        .next(".invalid-feedback")
                        .text(errors.subCategory[0]);
                }
            } else {
                alert("Error updating subcategory.");
            }
        },
    });
});

// delete sub category

$(document).ready(function () {
    let deleteId;

    // When the delete icon is clicked, capture the ID
    $(".delete-sub-category").on("click", function () {
        deleteId = $(this).data("id");
        $("#confirmDelete").data("id", deleteId); // Assign the ID to the confirm button
    });

    // Confirm delete action
    $("#confirmDelete").on("click", function () {
        const id = $(this).data("id");
        const token = $('meta[name="csrf-token"]').attr("content"); // Ensure CSRF token is included

        $.ajax({
            url: `/sub-category/${id}`, // Update URL as per your routes
            type: "DELETE",
            data: {
                _token: token, // Pass CSRF token
            },
            success: function (response) {
                // Handle success response
                //alert("Sub-category deleted successfully!");
                $("#deleteSubCategoryModal").modal("hide");
                // Optionally, remove the deleted row from the table
                $(`.delete-sub-category[data-id='${id}']`)
                    .closest("tr")
                    .remove();
            },
            error: function (xhr) {
                // Handle error response
                alert("Failed to delete sub-category. Please try again.");
            },
        });
    });
});
