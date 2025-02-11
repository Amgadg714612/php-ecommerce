<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($product) ? 'Edit' : 'Add'; ?> Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1><?php echo isset($product) ? 'Edit' : 'Add'; ?> Product</h1>        
        <form id="product-form" method="POST" class="needs-validation" novalidate>
            <?php if (isset($product)): ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($product->getId()); ?>">
            <?php endif; ?>
            
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required
                       value="<?php echo isset($product) ? htmlspecialchars($product->getName()) : ''; ?>">
                <div class="invalid-feedback">Please enter a product name.</div>
            </div>
            
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required
                       value="<?php echo isset($product) ? htmlspecialchars($product->getPrice()) : ''; ?>">
                <div class="invalid-feedback">Please enter a valid price.</div>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php 
                    echo isset($product) ? htmlspecialchars($product->getDescription()) : ''; 
                ?></textarea>
                <div class="invalid-feedback">Please enter a product description.</div>
            </div>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save Product</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/validation.js"></script>
</body>
</html>
