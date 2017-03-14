<?php
class Page{
    private $name,$class;
    public function __construct($name="Undefined",$class="undefined"){
        $this->name = $name;
        $this->class = $class;
    }
    public function getName(){
        return $this->name;
    }
    public function getClass(){
        return $this->class;
    }
}
?>