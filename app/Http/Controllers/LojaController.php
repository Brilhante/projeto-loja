<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateLoja;
use App\Models\Loja;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    protected $repository;

    public function __construct(Loja $loja)
    {
        $this->repository = $loja;        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lojas = $this->repository->latest()->paginate();

        return view('pages.lojas.index', ['lojas' => $lojas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.lojas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateLoja $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('lojas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$loja = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('pages.lojas.show', compact('loja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$loja = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('pages.lojas.edit', compact('loja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateLoja $request, $id)
    {
        if(!$loja = $this->repository->find($id)){
            return redirect()->back();
        }

        $loja->update($request->all());

        return redirect()->route('lojas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$loja = $this->repository->find($id)){
            return redirect()->back();
        }

        $loja->delete();

        return redirect()->route('lojas.index');
    }
}
