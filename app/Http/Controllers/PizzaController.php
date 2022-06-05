<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaEditFormRequest;
use App\Http\Requests\PizzaFormRequest;
use App\Models\Commenti;
use App\Models\Pizza;
use App\Models\User;
use App\Models\Voti;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ('voti.pizza_id' === 'pizza.id') {
            $pizze = Pizza::select('pizza.*')
                ->join('voti', 'voti.pizza_id', '=', 'pizza.id')
                ->groupBy('pizza.id')
                ->orderByRaw('min(voti.rate) desc')
                ->paginate(10);
        } else {
            $pizze = Pizza::paginate(10);
        }

        return view('pizze.index', compact('pizze'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizze.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaFormRequest $request)
    {
        $slug = uniqId();
        $pizza = new Pizza(array(
            'titolo' => $request->get('titolo'),
            'descrizione' => $request->get('descrizione'),
            'prezzo' => $request->get('prezzo'),
            'inevidenza' => $request->get('inevidenza'),
            'slug' => $slug
        ));
        $thumb = $_FILES['image']['name'];
        $thumb = substr($thumb, 0, strpos($thumb, "."));
        $imageName = $thumb . ' .' . $request->image->extension();
        $request->image->move(public_path('assets/pizze'), $imageName);
        $data = $imageName;
        $pizza->img = '/assets/pizze/' . $data;
        $pizza->save();
        return redirect('/admin/pizze')->with('status', 'Pizza aggiunta correttamente');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Pizza $pizza
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $pizza = Pizza::where(['titolo' => $name])->firstOrFail();
        $commenti = $pizza
            ->comments()
            ->orderByRaw('IF(user_id = ?,1,0) DESC', [auth()->id()])
            ->paginate(10);
        $auth = Commenti::select('user_id')
            ->where([
                ['user_id', '=', Auth::id()],
                ['pizza_id', '=', $pizza->id]
            ])
            ->first();
        $voti = $pizza->voti()->get();
        return view('pizze.show', compact('pizza', 'commenti', 'voti', 'auth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Pizza $pizza
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::whereId($id)->firstOrFail();
        return view('pizze.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pizza $pizza
     * @return \Illuminate\Http\Response
     */
    public function update($id, PizzaEditFormRequest $request)
    {
        $pizza = Pizza::whereId($id)->firstOrFail();
        $pizza->titolo = $request->get('titolo');
        $pizza->descrizione = $request->get('descrizione');
        $pizza->prezzo = $request->get('prezzo');
        $pizza->inevidenza = $request->get('inevidenza');
        if ($request->hasFile('image')) {
            $nomeImg = explode('/assets/pizze', $pizza->img);
            $nomeImg = $nomeImg[1];
            if (file_exists(public_path("assets/pizze/" . $nomeImg))) {
                unlink(public_path("assets/pizze/" . $nomeImg));
            }
            $thumb = $_FILES['image']['name'];
            $thumb = substr($thumb, 0, strpos($thumb, "."));
            $imageName = $thumb . ' .' . $request->image->extension();
            $request->image->move(public_path('assets/pizze'), $imageName);
            $data = $imageName;
            $pizza->img = '/assets/pizze/' . $data;
        } else {
            $pizza->img = $request->get('img');
        }

        $pizza->save();
        return redirect(action([PizzaController::class, 'edit'], $pizza->id))->with('status', 'Pizza modificata  correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Pizza $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pizza = Pizza::whereId($id)->firstOrFail();
        $pizza->delete();
        $nomeImg = explode('/assets/pizze', $pizza->img);
        $nomeImg = $nomeImg[1];
        if (file_exists(public_path("assets/pizze/" . $nomeImg))) {
            unlink(public_path("assets/pizze/" . $nomeImg));
        }
        return redirect('/admin/pizze')->with('status', 'La pizza : ' . $pizza->name . ' è stata eliminata con successo');
    }
}
