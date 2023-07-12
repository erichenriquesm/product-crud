<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    public function list()
    {
        $products = $this->product->all();

        return response()->json($products);
    }

    public function index($id)
    {
        $product = $this->product->where('id', $id)->first();

        return response()->json($product);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|string',
            'valor' => 'required|integer',
            'descricao' => 'string',
        ]);

        $product = $this->product->create([
            'nome' => $request->input('nome'),
            'valor' => $request->input('valor'),
            'descricao' =>  $request->input('descricao'),
        ]);


        return response()->json(["menssagem" => "Produto ciado com sucesso", "produto" => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = $this->product->findOrFail($id);

        $product->fill($request->all())->update();


        return response()->json(["menssagem" => "Produto atualizado com sucesso", "produto" => $product]);
    }

    public function delete($id)
    {
        $this->product->where('id', $id)->delete();

        return response()->json(["menssagem" => "Produto deleado com sucesso"]);
    }

    protected $product;
}
