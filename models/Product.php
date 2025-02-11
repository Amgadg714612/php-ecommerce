<?php
class Product {
    private $id;
    private $name;
    private $price;
    private $description;
    public function __construct($id = null, $name = '', $price = 0, $description = '') {
        $this->id = $id ?? uniqid();
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    // Setters
    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        if ($price < 0) {
            throw new Exception("السعر لا يمكن أن يكون سالبًا.");
        }
        $this->price = $price;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description
        ];
    }
    
    public static function fromArray($data) {
        return new self(
            id:$data['id'] ?? null,
            name:$data['name'] ?? '',
            price:$data['price'] ?? 0,
            description:$data['description'] ?? ''
        );


    }
    public function setFromArray($data) {
        if (isset($data['name'])) {
            $this->setName($data['name']);
        }
        if (isset($data['price'])) {
            $this->setPrice($data['price']);
        }
        if (isset($data['description'])) {
            $this->setDescription($data['description']);
        }
    }
}
// 
// $product = new Product(name: "Laptop", price: 500, description: "كمبيوتر محمول للألعاب");
// echo json_encode($product->toArray(), JSON_PRETTY_PRINT);
// $data = json_decode(file_get_contents('products.json'), true);
// $product = Product::fromArray($data[0]); 

// echo json_encode($product->toArray(), JSON_PRETTY_PRINT);
// $product->setFromArray(['price' => 550, 'description' => 'كمبيوتر محمول محدث']);

// echo json_encode($product->toArray(), JSON_PRETTY_PRINT);
