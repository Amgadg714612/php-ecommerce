<?php
require_once 'models/Product.php';
class ProductController {
    private $dataFile = 'data/products.json';
    private function loadProducts() {
        if (file_exists(filename:$this->dataFile)) {
            $data = json_decode(json:file_get_contents(filename:$this->dataFile), associative:true);
            return array_map(function($item) {
                return Product::fromArray(data: $item);
            }, array:$data);
        }
        return [];
    }
    
    private function saveProducts($products) {
        $data = array_map(callback: function($product) {
            return $product->toArray();
        }, array: $products);
        file_put_contents(filename: $this->dataFile, data: json_encode(value: $data, flags: JSON_PRETTY_PRINT));
    }
    public function list() {
        $products = $this->loadProducts();
        include 'views/product-list.php';
    }
    
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Product(
                null,
                $_POST['name'],
                floatval($_POST['price']),
                $_POST['description']
            );
            
            $products = $this->loadProducts();
            $products[] = $product;
            $this->saveProducts($products);
            
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
                echo json_encode(['success' => true, 'product' => $product->toArray()]);
                exit;
            }
            
            header('Location: index.php');
            exit;
        }
        
        include 'views/product-form.php';
    }
    
    public function edit() {
        $products = $this->loadProducts();
        $id = $_GET['id'] ?? null;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedProduct = new Product(
                $_POST['id'],
                $_POST['name'],
                floatval($_POST['price']),
                $_POST['description']
            );
            
            $products = array_map(function($product) use ($updatedProduct) {
                return $product->getId() === $updatedProduct->getId() ? $updatedProduct : $product;
            }, $products);
            
            $this->saveProducts($products);
            header('Location: index.php');
            exit;
        }
        
        $product = current(array_filter($products, function($product) use ($id) {
            return $product->getId() === $id;
        }));
        
        include 'views/product-form.php';
    }
    
    public function delete() {
        if (isset($_GET['id'])) {
            $products = $this->loadProducts();
            

            $products = array_filter($products, function($product) {
                return $product->getId() !== $_GET['id'];
            });
            $this->saveProducts($products);
            
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
                echo json_encode(['success' => true]);
                exit;
            }
        }
        header('Location: index.php');
        exit;
    }
}
