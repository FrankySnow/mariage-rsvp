<?php

namespace App\Http\Controllers;

use App\User;
use App\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Notifications\NouvelleReponse;
use Illuminate\Support\Facades\Notification;

class ReponsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reponses = Reponse::all()
            ->groupBy(function($item,$key)
            {
                return $item->created_at->format('U'); // temps Unix
            })
            ->toArray();

        return response()->json([
            'data' => $reponses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reponse = [];

        $this->validate($request, [
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required',
            'presence_id' => 'required',
            'prenom_conjoint' => 'required_with:conjoint',
            'nom_conjoint' => 'required_with:conjoint',
        ]);

        if( $request->has('conjoint') ) {
            $conjoint = [
                'prenom' => $request->prenom_conjoint,
                'nom' => $request->nom_conjoint,
                'email' => $request->email,
                'remarque' => $request->remarque,
                'presence_id' => $request->presence_id,
            ];

            $reponse['conjoint'] = Reponse::create( $conjoint );
        }
        
        $reponse['principal'] = Reponse::create( $request->except(['conjoint', 'prenom_conjoint','nom_conjoint']) );

        if( User::count() ) {
            Notification::send( User::all(), new NouvelleReponse($reponse) );
        }

        return response()->json(['message' => 'Réponse enregistrée !'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reponse = Reponse::find($id);

        if( $reponse )
        {
            return response()->json([
                'data' => $reponse
            ]);
        }

        return response()->json([
            'erreur' => "Cette réponse n'existe pas."
        ], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
