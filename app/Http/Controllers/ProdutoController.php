<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProduto;
use App\Mail\WelcomeMessage;
use App\Models\Loja;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProdutoController extends Controller
{
    protected $repository;

    public function __construct(Produto $produto)
    {
        $this->repository = $produto;        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->repository->latest()->paginate();

        return view('pages.produtos.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lojas = Loja::all();
        return view('pages.produtos.create', compact('lojas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProduto $request)
    {
        // dd($data = $request->all());
        $lojas = $request->lojas;
        $data = $request->all();
        $produto = $this->repository->create($data);
        $pivot = $produto->lojas()->attach($lojas);
        
        if($request->lojas)
        $emailLojas = Loja::whereIn('id', $lojas)->get();
        // dd($emailLojas);
        foreach ($emailLojas as $enviar){
        
            Mail::to($enviar->email)
            ->send(new WelcomeMessage());
        }
        return redirect()->route('produtos.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$produto = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('pages.produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$produto = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('pages.produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProduto $request, $id)
    {
        if(!$produto = $this->repository->find($id)){
            return redirect()->back();
        }

        $produto->update($request->all());

        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$produto = $this->repository->find($id)){
            return redirect()->back();
        }

        $produto->delete();

        return redirect()->route('produtos.index');
    }
}
