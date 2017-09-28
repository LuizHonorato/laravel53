<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    public function __construct(){
      /*$this->middleware('auth')
           ->only([
              'contato',
              'categoria'
            ]);
            */

        /*
        $this->middleware('auth')
            ->except([
                'index',
                'contato'
            ]);
            */


    }

    public function index(){

      $var1 = '124';

      $arrayData = [1,2,3,4,5,6,7,8,9,10];

      return view('site.home.index', compact('var1', 'arrayData'));
    }

    public function contato(){
      return view('site.contato.contato');
    }

    public function categoria($id = 1){
      return "Lista dos filme da categoria: {$id}";
    }

    public function erro404(){
      return view('error404');
    }

}
