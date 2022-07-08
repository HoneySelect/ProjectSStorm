<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ShirtsController extends Controller
{

    private $sizes = ['S','M','L','XL'];


    public function save(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|max:30',
            'email' => 'required|email',
            'size' => [
                'required',
                Rule::in($this->sizes),
            ]
        ]);
        $data = $request->only(['address', 'email', 'size']);
        $this->writeCsv($data);
        return view('welcome',['sizes'=>$this->sizes]);
    }
   
   
    public function index()
    {
        return view('welcome',['sizes'=> $this->sizes]);

    }
    private function writeCsv($data)
    
{
    $data = array(
        $_POST['address'],        $_POST['email'],         $_POST['size' ] 
    );
      
    $fp = fopen('databse.csv', 'a');
      
    fputcsv($fp, $data,';');
      
    fclose($fp);
    
}
}   
