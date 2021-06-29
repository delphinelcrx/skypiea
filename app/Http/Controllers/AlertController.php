<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlertController extends Controller
{
    // Ici c'est la fonction qui va permettre d'afficher le form de création d'alerte lié à ma ville

    public function create($weather)
    {
        $url = "https://api.airvisual.com/v2/city?city=" . $weather . "&state=Auvergne-Rh%C3%B4ne-Alpes&country=FRANCE&key=2cb6dd10-0354-496b-b1aa-64dbf8ad7012";

        $response = Http::get($url);

        $pollution = $response->json();

        return view('alerts.create', [
            'pollution' => $pollution
        ]);
    }

    // Ici c'est la fonction qui va permettre d'afficher la liste de mes alertes

    public function index()

    {
        $alerts = Alert::all();

        return view('alerts.index', [
            'alerts' => $alerts
        ]);
    }

    // Ici c'est la fonction pour créer une alerte, l'envoyer en bdd et mettre des conditions pour les champs de mon form de création

    public function store(Request $request)
    {
        $this->validate($request, [
            'city' => 'string|required',
            'name' => 'string|required',
            'aqius' => 'numeric|required|digits_between:1,4',
            'movement' => 'size:1|in:+,-|required',
        ]);


        $alert = new Alert();
        $alert->name = $request->get('name');
        $alert->city = strtoupper($request->get('city'));
        $alert->aqius = $request->get('aqius');
        $alert->movement = $request->get('movement');
        $alert->save();

        return redirect()->route('dashboard');
    }

    // Ici c'est la fonction qui va permettre de suprimer une alerte

    public function delete(Alert $alert)
    {
        $alert->delete();

        return redirect()->back();
    }

    // Ici c'est la fonction qui va permettre d'afficher le form de modification de l'alerte que je selectionne

    public function edit(Alert $alert)

    {
        return view('alerts.edit', [
            'alert' => $alert
        ]);
    }

    // Ici c'est la fonction pour modifer une alerte, l'envoyer en bdd et mettre des conditions pour les champs de mon form de création

    public function update(Alert $alert, Request $request)

    {

        $this->validate($request, [
            'name' => 'string|required',
            'aqius' => 'numeric|required|digits_between:1,4',
            'movement' => 'size:1|in:+,-|required',
        ]);

        $alert->name = $request->get('name');
        $alert->aqius = $request->get('aqius');
        $alert->movement = $request->get('movement');
        $alert->save();

        return redirect()->route('alerts.index');
    }
}
