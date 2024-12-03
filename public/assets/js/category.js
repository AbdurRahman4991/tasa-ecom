$(document).ready(function () {
    // Initialize DataTable and store it in a variable
    let table = $("#example").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/category/create",
            type: "GET",
        },
        columns: [
            { data: "name", name: "name" },
            {
                data: null,
                name: "action",
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    return `
                        <i class="fa-regular fa-pen-to-square edit-category" data-bs-toggle="modal" data-bs-target="#editModal" data-id="${row.id}" data-name="${row.name}"></i>
                        <i class="fa-solid fa-trash delete-category" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="${row.id}"></i>
                    `;
                },
            },
        ],
        order: [[0, "desc"]],
    });

    // Set up CSRF token for AJAX
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Add Category
    $("#categoryForm").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: "/category",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                $("#responseMessage")
                    .removeClass("alert-danger")
                    .addClass("alert-success")
                    .text(response.message)
                    .show();
                $("#categoryForm")[0].reset(); // Reset the form
                table.ajax.reload(null, false);

                setTimeout(function () {
                    $("#exampleModal").modal("hide"); // Hide the modal
                    $("#responseMessage").hide(); // Hide the response message
                    console.log("Modal and response message hidden");
                }, 2000);
            },
            error: function (xhr) {
                $(".alert")
                    .removeClass("alert-success alert-danger")
                    .html("")
                    .hide();

                if (xhr.responseJSON.message) {
                    $("#responseMessage")
                        .addClass("alert-danger")
                        .text(xhr.responseJSON.message)
                        .show();
                }

                if (xhr.responseJSON.errors) {
                    for (let field in xhr.responseJSON.errors) {
                        let errorMsg =
                            xhr.responseJSON.errors[field].join(", ");
                        $("#" + field)
                            .addClass("is-invalid")
                            .next(".invalid-feedback")
                            .text(errorMsg)
                            .show();
                    }
                }
            },
        });
    });

    // Handle Edit Button Click
    $(document).on("click", ".edit-category", function () {
        const categoryId = $(this).data("id");
        const categoryName = $(this).data("name");

        // Debugging: Check categoryName
        console.log("Category Name:", categoryName);

        // Prefill the modal fields
        $("input[name='categoryName']").val(categoryName);
        $("#editModal").data("category-id", categoryId); // Store the ID for submission
    });

    // Handle Save Button Click
    $("#updateCategoryForm").on("submit", function (e) {
        var formData = $("#updateCategoryForm").serialize();
        e.preventDefault(); // Prevent normal form submission

        var categoryId = $("#editModal").data("category-id"); // Get the category ID set in the modal
        var categoryName = document.getElementById("#categoryName"); // Get the value of the input field
        console.log("categoryname" + categoryName);
        $.ajax({
            url: "/category/" + categoryId, // The route for updating the category
            method: "PUT",
            data: formData,
            success: function (response) {
                if (response.success) {
                    alert("Category updated successfully!");
                    $("#editModal").modal("hide"); // Close the modal
                    location.reload(); // Reload the page to reflect changes (optional)
                } else {
                    alert("Failed to update category.");
                }
            },
            error: function () {
                alert("Error updating category.");
            },
        });
    });

    // Delete category //

    $(document).on("click", ".delete-category", function () {
        const categoryId = $(this).data("id");
        $.ajax({
            url: "/category/" + categoryId, // The route for updating the category
            method: "DELETE",
            success: function (response) {
                if (response.success) {
                    alert("Category delete successfully!");
                    $("#deleteModal").modal("hide"); // Close the modal
                    location.reload(); // Reload the page to reflect changes (optional)
                } else {
                    alert("Failed to delette category.");
                }
            },
            error: function () {
                alert("Error delete category.");
            },
        });
    });
}); // Jquery wrapper
