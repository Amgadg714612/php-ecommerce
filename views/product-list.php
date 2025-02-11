<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Product Listing</h1>
            <a href="index.php?action=add" class="btn btn-primary">Add New Product</a>
        </div>        

        <div class="row" id="product-list">
            <?php
             foreach ($products as $product): ?>
                <div class="col-md-4 mb-4" data-product-id="<?php echo htmlspecialchars($product->getId()); ?>">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product->getName()); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($product->getDescription()); ?></p>
                            <p class="card-text"><strong>Price: $<?php echo number_format($product->getPrice(), 2); ?></strong></p>
                            <div class="btn-group">
                                <a href="index.php?action=edit&id=<?php echo htmlspecialchars($product->getId()); ?>" 
                                   class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-sm btn-danger delete-product" 
                                        data-id="<?php echo htmlspecialchars($product->getId()); ?>">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
