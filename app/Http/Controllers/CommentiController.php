<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Http\Requests\CommentiEditRequest;
use App\Models\Commenti;
use App\Models\Insalatona;
use App\Models\Pizza;
use App\Models\User;
use App\Models\Voti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentiController extends Controller
{
    public function index()
    {
        $commenti = Commenti::with('pizza', 'insalatona', 'user')->distinct()->paginate(10);
        $pizze = Pizza::with('voti')->distinct()->get();
        $insalatone = Insalatona::with('voti')->distinct()->get();
        return view('commenti.index', compact('commenti','pizze','insalatone'));
    }

    public function create()
    {
        return view('commenti.create');
    }

    public function store(CommentFormRequest $request)
    {
        $commento = new Commenti(array(
            'pizza_id' => $request->get('pizza_id'),
            'insalatona_id' => $request->get('insalatona_id'),
            'utente_id' => $request->get('utente_id'),
            'testo' => $request->get('testo')
        ));
        $commento->save();
        return redirect()->back('status', 'Commento aggiunto correttamente');
    }
    public function edit($id)
    {
        $commento = Commenti::whereId($id)->firstOrFail();
        return view('commenti.edit', compact('commento'));
    }
    public function update($id, CommentiEditRequest $request)
    {
        $commento = Commenti::whereId($id)->firstOrFail();
        $commento->testo = $request->get('testo');
        $commento->voti->id = $request->get('rate_id');
        $voto = Voti::whereId($commento->voti->id)->firstOrFail();
        $voto->rate = $request->get('rate');
        $commento->save();
        $voto->save();
        return redirect(action([CommentiController::class,'edit'],$commento->id))->with('status','Commento e/o voto modificato con successo!');
    }
    public function destroy($id)
    {
        $commento = Commenti::whereId($id)->firstOrFail();
        $voto = Voti::whereId($commento->voti->id)->firstOrFail();
        $commento->delete();
        $voto->delete();
        return redirect(action([CommentiController::class,'edit'],$commento->id))->with('status','Commento eliminato con successo!');
    }
}
