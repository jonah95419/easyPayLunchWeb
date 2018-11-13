<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;
 
use Kreait\Firebase\Factory;
 
use Kreait\Firebase\ServiceAccount;
 
use Kreait\Firebase\Database;
 
class FirebaseController extends Controller
 
{
 
//
 
public function index(){
 
		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/easy-pay-lunch-firebase-adminsdk-v0h28-f1a2d0ed14.json');
		 
		$firebase = (new Factory)
		 
		->withServiceAccount($serviceAccount)
		 
		->create();
		 
		$db=$firebase->getDatabase();
		 echo 'funciona';
 }
}