<?php
namespace Modules\Attribute\Enums;

class AttributeType extends \SplEnum{
    const __default = self::Text;
    const Text="text";
    const Number="number";
    // const File="file";  
    const DropDown="drop_down";
    const Radio="radio";
    // const Date="date";
    // const Url="url";
    // const Email="email";
    const BooleanInput="boolean";

    public static $allowOptions= ["drop_down", "radio"];

    public static $allowValidationNumber= ["number"];

    
    
    public function __construct(){
        parent::__construct("text");
        
    }

    public static function  checkAllowOptions($type){
        return in_array($type, static::$allowOptions);
    }
}