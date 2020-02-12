<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $produtos = [
            [
                'eaea' => 'eae',
                'eae' => 'eae'
            ],
            [
                'eaea' => 'eae',
                'eae' => 'eae'
            ]

        ];
        return json_encode($produtos);
    }
}
