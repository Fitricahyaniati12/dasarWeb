<?php
class Car {
    // Properti untuk OOP dan Encapsulation
    public $brand;
    private $model;
    private $color;

    // Konstruktor untuk Encapsulation
    public function __construct($model, $color) {
        $this->model = $model;
        $this->color = $color;
    }

    // Metode untuk OOP: Menyalakan mesin
    public function startEngine() {  
        echo "Engine started<br>";
    }

    // Getter untuk model
    public function getModel() {
        return $this->model;
    }

    // Setter untuk color
    public function setColor($color) {
        $this->color = $color;
    }

    // Getter untuk color
    public function getColor() {
        return $this->color;
    }
}

// Membuat objek pertama dengan OOP dan Encapsulation
$car1 = new Car("Toyota", "Blue");
$car1->brand = "Toyota";
$car1->startEngine();  
echo "Model: " . $car1->getModel() . "<br>";
echo "Color: " . $car1->getColor() . "<br>";

// Membuat objek kedua dengan OOP dan Encapsulation
/*$car2 = new Car("Honda", "Green");
$car2->brand = "Honda";
$car2->startEngine();
echo "Brand: " . $car2->brand . "<br>";
echo "Model: " . $car2->getModel() . "<br>";*/

// Mengubah warna mobil pertama
$car1->setColor("Red");
echo "Updated Color of Car1: " . $car1->getColor() . "<br>";
?>
