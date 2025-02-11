
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('product-form');    
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
    // Custom price validation
    const priceInput = document.getElementById('price');
    priceInput.addEventListener('input', function() {
        const price = parseFloat(this.value);
        if (isNaN(price) || price < 0) {
            this.setCustomValidity('Please enter a valid positive price');
        } else {
            this.setCustomValidity('');
        }
    });
});
