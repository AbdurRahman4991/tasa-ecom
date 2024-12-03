$(document).ready(function () {
    $("#subcategory").DataTable({
        processing: true, // Show processing indicator
        serverSide: true, // Enable server-side processing
        ajax: {
            url: "sub-category/create", // Replace with the route to your Laravel `create` method
            type: "GET",
            data: function (d) {
                // Include CSRF token for Laravel
                d._token = $('meta[name="csrf-token"]').attr("content");
            },
        },
        columns: [
            { data: "category.name", name: "category.name", title: "Category" }, // Display category name
            { data: "name", name: "name", title: "Subcategory" }, // Display subcategory name
            {
                data: null,
                name: "action",
                title: "Action",
                orderable: false,
                searchable: false,
                render: function (data) {
                    return `
                        <i class="fa-regular fa-pen-to-square edit-sub-category" data-bs-toggle="modal" data-bs-target="#editeModal" data-id="${data.id}" data-name="${data.name}"></i>
                        <i class="fa-solid fa-trash delete-sub-category" data-bs-toggle="modal" data-bs-target="#deleteSubCategoryModal" data-id="${data.id}"></i>
                    `;
                },
            },
        ],
        order: [[1, "asc"]], // Default ordering by subcategory name
    });

    // Add Category //

    $("#subCategoryForm").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: "/sub-category", // Replace with your store route
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                // Reset the form
                $("#subCategoryForm")[0].reset();

                // Reload DataTable
                $("#subcategory").DataTable().ajax.reload(null, false);

                // Hide the modal
                $("#exampleModal").modal("hide");
            },
            error: function (xhr) {
                if (xhr.responseJSON.errors) {
                    // Loop through errors and display them
                    for (let field in xhr.responseJSON.errors) {
                        let errorMsg =
                            xhr.responseJSON.errors[field].join(", ");
                        $(`[name="${field}"]`).addClass("is-invalid");
                        $(`[name="${field}"]`)
                            .next(".invalid-feedback")
                            .text(errorMsg)
                            .show();
                    }
                } else {
                    alert("Something went wrong! Please try again.");
                }
            },
        });
    });

    // Clear validation error on input focus
    $(document).on("focus", "input, select", function () {
        $(this).removeClass("is-invalid").next(".invalid-feedback").hide();
    });

    // Handle the edit button click
    $(document).on("click", ".edit-btn", function () {
        const id = $(this).data("id");
        // Add logic to open the edit modal and populate it with data
        console.log("Edit Subcategory ID:", id);
    });

    // Handle the delete button click
    $(document).on("click", ".delete-btn", function () {
        const id = $(this).data("id");
        // Add logic to handle delete functionality
        console.log("Delete Subcategory ID:", id);
    });
});
