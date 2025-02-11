$(document).ready(function() {
    // Handle delete button clicks
    $('.delete-product').on('click', function() {
        const id = $(this).data('id');
        if (confirm('Are you sure you want to delete this product?')) {
            $.ajax({
                url: `index.php?action=delete&id=${id}`,
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response.success) {
                        $(`[data-product-id="${id}"]`).fadeOut(400, function() {
                            $(this).remove();
                        });
                    }
                },
                error: function() {
                    alert('Error deleting product. Please try again.');
                }
            });
        }
    });
});
