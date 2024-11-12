<?php
/*class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function eat() {
        echo $this->name . " is eating.<br>";
    }

    public function sleep() {
        echo $this->name . " is sleeping.<br>";
    }
}

class Cat extends Animal {
    public function meow() {
        echo $this->name . " says meow!<br>";
    }
}

class Dog extends Animal {
    public function bark() {
        echo $this->name . " says woof!<br>";
    }
}

$cat = new Cat("Whiskers");
$dog = new Dog("Buddy");

$cat->eat();
$cat->sleep();
$cat->meow();

$dog->eat();
$dog->sleep();
$dog->bark();
?>*/

// Encapsulation and Access Modifiers


class Animal {
    public $name;
    protected $age;
    private $color;

    public function __construct($name, $age, $color) {
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }

    public function getName() {
        return $this->name;
    }

    // Mengakses protected method di dalam class
    public function getAge() {
        return $this->age;
    }

    // Mengakses private method melalui method publik
    public function getColor() {
        return $this->color;
    }
}

$animal = new Animal("Dog", 3, "Brown");

echo "Name: " . $animal->getName() . "<br>";
echo "Age: " . $animal->getAge() . "<br>"; // Dapat mengakses melalui method publik
echo "Color: " . $animal->getColor() . "<br>"; // Dapat mengakses melalui method publik
?>

