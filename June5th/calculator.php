<?php  
  
interface interfaceMethods{ 
  
    public function addMethod(); 
    public function substractMethod(); 
    public function multiplyMethod(); 
    public function divideMethod(); 
  
} 
  
class Calculator implements interfaceMethods{ 

    public $num1;
    public $num2;

    public function __construct ($value1,$value2)
    {
    $this->num1 = $value1;
    $this->num2 = $value2;
    }

    public function addMethod(){               
        return $this->num1 + $this->num2;
    }
    public function substractMethod(){ 
        return $this->num1 - $this->num2;
    }
    public function multiplyMethod(){ 
        return $this->num1 * $this->num2;
    }
    public function divideMethod(){ 
        return $this->num1 / $this->num2;
    } 
}  

class Area extends Calculator{

    public function areaMethod(){
            return $this->num1 * $this->num2;
    }
}

$Area     = new Area(10,5);
$add      = $Area->addMethod(); 
$sub      = $Area->substractMethod(); 
$mul      = $Area->multiplyMethod();
$divide   = $Area->divideMethod();
$Area     = $Area->areaMethod();

echo "Addition==>".$add;
echo "Subtraction==>".$sub;
echo "Multiply==>".$mul;
echo "Division==>".$divide;
echo "Area==>".$area;

?>


  
