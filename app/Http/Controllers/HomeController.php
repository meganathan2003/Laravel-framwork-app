<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Below the code create the function
    public function aboutUs(){
        // Simple logic
        if(true){
            return redirect()->route('article');
        }
        return 'Youre not welcome';
    }
}
