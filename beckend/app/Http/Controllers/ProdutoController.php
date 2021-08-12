<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->produto->all();
        //return $produto;
        //return Produto::all();
        return response()->json($produtos);
    }    

    public function show($id)
    {
        $produto = $this->produto->find($id);
        return response()->json($produto);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $data = $request->all();
       $produto =  $this->produto->create($data);
        return response()->json($produto);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $produto = $this->produto->find($data['id']);
        $produto->update($data);

        return response()->json($produto);
    }

    public function delete($id)
    {
        $produto = $this->produto->find($id);
        $produto->delete();

        return response()->json(['message'=>'Produto deletado com Sucesso!']);
    }


}
