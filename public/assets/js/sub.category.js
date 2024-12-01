$(document).ready(function() {
    $('#category').change(function() {
        var categoryId = $(this).val(); // Get selected category ID

        // Check if a valid category is selected
        if (categoryId) {
            $.ajax({
                url: '/get-subcategories/' + categoryId,  // URL to get subcategories based on category
                method: 'GET',
                success: function(response) {
                    var subCategorySelect = $('#subCategory');
                    subCategorySelect.empty(); // Clear existing options

                    subCategorySelect.append('<option value="">Select Subcategory</option>'); // Default option

                    // Loop through the response and add subcategories as options
                    response.subcategories.forEach(function(subcategory) {
                        subCategorySelect.append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                    });
                },
                error: function() {
                    alert('Error fetching subcategories');
                }
            });
        } else {
            $('#subCategory').empty().append('<option value="">Select Subcategory</option>'); // Clear subcategory options
        }
    });
});
