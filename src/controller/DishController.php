<?php
require_once '../model/Dish.php';

class DishController {
    private $dish;

    public function __construct() {
        $this->dish = new Dish();
    }

    public function getDishes() {
        return $this->dish->getAll();
    }

    public function addDish($name, $description, $image_url) {
        return $this->dish->create($name, $description, $image_url);
    }

    public function deleteDish($id) {
        return $this->dish->delete($id);
    }
}
?>
