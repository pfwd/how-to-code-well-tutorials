<?php
interface ShapeInterface{
    public function draw();
    public function colour();
    public function reDraw();
}

class Circle implements ShapeInterface {
    public function draw(){}
    public function colour(){}
    public function reDraw()
    {
        // TODO: Implement reDraw() method.
    }
}
class Square implements ShapeInterface {
    public function draw(){}
    public function colour(){}
    public function reDraw()
    {
        // TODO: Implement reDraw() method.
    }
}
class Line implements ShapeInterface {
    public function draw(){}
    public function colour(){}
    public function reDraw()
    {
        // TODO: Implement reDraw() method.
    }
}

class Painter{
    public function addShape(ShapeInterface $shape){
        return $shape->colour();
    }
}

$shape = new Square();
$artist = new Painter();
$artist->addShape($shape);