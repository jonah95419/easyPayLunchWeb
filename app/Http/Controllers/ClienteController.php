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

        /*$newPost = $database
        ->getReference('Establecimiento/jbuywbeijwnvkj/cliente')
        ->push([
        'imagen' => 'B)' ,
        'mail' => 'thecristianx@hotmail.com',
        'nombre' => "Cristian X. Tapia",
        'tokenUser' => '8tr452'
        ]);
        echo '<pre>';
        print_r($newPost->getvalue());*/

        $ref = $database->getReference('Establecimiento/jbuywbeijwnvkj/cliente');
        $subjects = $ref->getValue();

        foreach($subjects as $subject){

            $all_subject[] = $subject;
        }

        //return json_encode($all_subject);
       return view('pages.cliente', compact('all_subject'));
        



         



    }

    //
}
