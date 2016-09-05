<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;
/**
 * Description of miFormulario
 *
 * @author GGuerra
 */
class miFormulario extends Request{
    //put your code here
    protected $redirect ="home/miformulario";
    
    public function rules(){
        return[
        'nombre'=>'required|min:3|max:12}|regex:/^{[a-z]+$/i',  
        ];
    }
        public function messages(){
            return 
            ['nombre.required'=> 'el campo nombre es requerido',
             'nombre.min'=> 'el min son 3',   
                'nombre.max'=> 'el max son 12',
                'nombre.regex'=> 'solo se aceptan letras',
                ];
            
        }
    public function response(array $errors)
    {
        return redirect()->route('home.miformulario')
            ->withErrors($errors, 'formulario')
            ->withInput();
    }

}

