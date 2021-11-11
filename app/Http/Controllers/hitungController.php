<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hitungController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function hitung(Request $request)
    {

        $request->validate([
            'bil1' => 'numeric|integer',
            'bil2' => 'numeric|integer'
        ]);

        if (isset($_POST['hitung'])) {
            $hasilnya = 0;
            $bil1 = null;
            $bil2 = null;
            if($request->bil1 == '')
            {
                $bil1 = 0;
            }
            else
            {
                $bil1 = $request->bil1;
            }
            if($request->bil2 == '')
            {
                $bil2 = 0;
            }
            else
            {
                $bil2 = $request->bil2;
            }


            $operator = $request->operator;
           
            if($operator === '+')
            {
                $hasilnya = $bil1 + $bil2;
                
               
            }
            elseif($operator === '-')
            {
                $hasilnya = $bil1 - $bil2;
            }
            elseif($operator === '/')
            {
                $hasilnya = $bil1 / $bil2;
               
            }
            else
            {
                $hasilnya = $bil1 * $bil2;
            }
           
            $result = array(
                'bil1' => $bil1,
                'bil2' => $bil2,
                'operator' => $operator,
                'hasil' => $hasilnya,
                
            );
        } else if (isset($_POST['reset'])) {
            $result = array(
                'bil1' => "",
                'bil2' => "",
                'operator' => "+",
                'hasil' => ""
            );
        }
        return view('index')->with($result);
    }
}
