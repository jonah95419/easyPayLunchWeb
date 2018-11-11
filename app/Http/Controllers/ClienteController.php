<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class ClienteController extends Controller
{

    public function index(){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseService.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://easy-pay-lunch.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

       /* $newPost = $database
        ->getReference('Establecimiento/Restaurante/Cliente')
        ->push([
        'Direccion' => 'La Cocha' ,
        'Nombre' => 'Cristian Tapia',
        'Telefono' => '0992874448',
        'Token' => '8tr452'
        ]);
        echo '<pre>';
        print_r($newPost->getvalue());*/

        $ref = $database->getReference('Establecimiento/Restaurante/cliente');
        $subjects = $ref->getValue();

        foreach($subjects as $subject){

            $all_subject[] = $subject;
        }

        //return json_encode($all_subject);
       return view('pages.cliente', compact('all_subject'));
        



         



    }

    //
}
