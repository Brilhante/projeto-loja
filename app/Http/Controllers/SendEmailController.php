<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMessage;
use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    protected $lojas;

    public function __construct(Loja $loja)
    {
        $this->lojas = $loja;
    }

    public function index(Request $request)
    {
        // dd($this->lojas->find($request->id)->email);
        Mail::to($this->lojas->find($request->id)->email)
            ->send(new WelcomeMessage());

        if (Mail::failures()) {
            return redirect()->route('lojas.index')->flash('Erro tente novamente');
        }else{
            return redirect()->route('lojas.index');
        }
    }
}
