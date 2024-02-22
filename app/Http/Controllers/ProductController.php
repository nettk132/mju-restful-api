<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        $responseData = [
            'status' => 'success',
            'data' => [
                'Product' => $data,
            ],
        ];

        // ส่ง JSON response ในรูปแบบ JSend
        return Response::json($responseData);

    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'product_code' => 'required|string|max:15',
            'name_product' => 'required|string|max:50',
            'detail_product' => 'required|string|max:50',
            'price' => 'required|numeric|max:50',
            'quantity' => 'required|integer|max:50',


        ]);

        Product::create($validated);

        return response()->json(['message' => 'Student created successfully'], 201);
    }


}
