<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckAboutSymbols implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */

    //return true atarebs, return false->message
    public function passes($attribute, $value)
    {   
        $symbols = array("!","@","#","$","%","^","&","*","~");
        for ($i=0; $i < strlen($value); $i++) { 
            foreach ($symbols as $s) {
                if($value[$i] == $s){
                    return false;
                }
            }
         /*   for($a=0; $a < sizeof($symbols)+1; $a++)
            { 
                if($value[$i] == $symbols[$a])
                return false; 
            }*/
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "There mustn't be symbols";
    }
}
