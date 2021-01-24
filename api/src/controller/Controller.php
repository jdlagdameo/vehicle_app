<?php 
namespace Src\Controller;

class Controller{


    public function sanitize($str){
        return filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    }

    public function convert_engine_displacement($unit_measure, $engine_displacement){
        switch($unit_measure){
            // Liters
            case 'l':
                $cubic_in =  $engine_displacement * 61.024;
                $cubic_cm = $engine_displacement / 0.0010000;
                $liter = $engine_displacement;
                break;
            
            // Cubic Centimeters
            case 'cm3':
                $cubic_in = $engine_displacement * 0.061024;
                $cubic_cm = $engine_displacement;
                $liter = $engine_displacement / 1000.0;
                break;
            
            // Cubic Inches
            case 'in3':
                $cubic_in = $engine_displacement;
                $cubic_cm = $engine_displacement/0.061024;
                $liter = $engine_displacement/61.024;
                break;

            default:
                $cubic_in = 0;
                $cubic_cm = 0;
                $liter = 0;
        
            break;
        }

        return compact("cubic_in","cubic_cm","liter");
    }

}