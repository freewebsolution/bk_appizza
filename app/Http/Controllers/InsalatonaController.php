<?php

namespace App\Http\Controllers;

use App\Http\Requests\insalatonaEditFormRequest;
use App\Http\Requests\InsalatonaFormRequest;
use App\Models\Commenti;
use App\Models\Insalatona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsalatonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insalatone= Insalatona::select('insalatona.*')
            ->join('voti', 'voti.insalatona_id', '=', 'insalatona.id')
            ->groupBy('insalatona.id')
            ->orderByRaw('min(voti.rate) desc')
            ->paginate(10);
        return view('insalatone.index', compact('insalatone'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insalatone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsalatonaFormRequest $request)
    {
        $insalatona = new Insalatona(array(
            'titolo' => $request->get('titolo'),
            'descrizione' => $request->get('descrizione'),
            'prezzo' => $request->get('prezzo'),
            'inevidenza' => $request->get('inevidenza'),
        ));
        $thumb = $_FILES['image']['name'];
        $thumb = substr($thumb, 0, strpos($thumb, "."));
        $imageName = $thumb . ' .' . $request->image->extension();
        $request->image->move(public_path('assets/insalatone'), $imageName);
        $data = $imageName;
        $insalatona->img = '/assets/insalatone/' . $data;
        $insalatona->save();
        return redirect('/admin/insalatone')->with('status', 'insalatona aggiunta correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Insalatona $insalatona
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $insalatona = Insalatona::where(['titolo' => $name])->firstOrFail();
        $commenti = $insalatona
            ->comments()
            ->orderByRaw('IF(user_id = ?,1,0) DESC', [auth()->id()])
            ->paginate(10);
        $auth = Commenti::select('user_id')
            ->where([
                ['user_id', '=', Auth::id()],
                ['insalatona_id', '=', $insalatona->id]
            ])
            ->first();
        $voti = $insalatona->voti()->get();
        return view('insalatone.show', compact('insalatona', 'commenti', 'voti','auth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Insalatona $insalatona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insalatona = Insalatona::whereId($id)->firstOrFail();
        return view('insalatone.edit', compact('insalatona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Insalatona $insalatona
     * @return \Illuminate\Http\Response
     */
    public function update($id, insalatonaEditFormRequest $request)
    {
        $insalatona = Insalatona::whereId($id)->firstOrFail();
        $insalatona->titolo = $request->get('titolo');
        $insalatona->descrizione = $request->get('descrizione');
        $insalatona->prezzo = $request->get('prezzo');
        $insalatona->inevidenza = $request->get('inevidenza');
        if ($request->hasFile('image')) {
            $nomeImg = explode('/assets/insalatone', $insalatona->img);
            $nomeImg = $nomeImg[1];
            if (file_exists(public_path("assets/insalatone/" . $nomeImg))) {
                unlink(public_path("assets/insalatone/" . $nomeImg));
            }
            $thumb = $_FILES['image']['name'];
            $thumb = substr($thumb, 0, strpos($thumb, "."));
            $imageName = $thumb . ' .' . $request->image->extension();
            $request->image->move(public_path('assets/insalatone'), $imageName);
            $data = $imageName;
            $insalatona->img = '/assets/insalatone/' . $data;
        } else {
            $insalatona->img = $request->get('img');
        }

        $insalatona->save();
        return redirect(action([InsalatonaController::class, 'edit'], $insalatona->id))->with('status', 'insalatona modificata  correttamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Insalatona $insalatona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $insalatona = Insalatona::whereId($id)->firstOrFail();
            $insalatona->delete();
            $nomeImg = explode('/assets/insalatone', $insalatona->img);
            $nomeImg = $nomeImg[1];
            if (file_exists(public_path("assets/insalatone/" . $nomeImg))) {
                unlink(public_path("assets/insalatone/" . $nomeImg));
            }
            return redirect('/admin/insalatone')->with('status', 'La insalatona: ' . $insalatona->name . ' è stata eliminata con successo');
        }
    }

}
