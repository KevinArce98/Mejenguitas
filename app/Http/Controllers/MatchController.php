<?php

namespace Mejenguitas\Http\Controllers;

use Mejenguitas\Match;
use Illuminate\Http\Request;
use Alert;
use DB;

class MatchController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:mod');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*  $sql = "SELECT id, name, players, price, DATE_FORMAT(date, '%d/%m/%Y') AS date, DATE_FORMAT(hour, '%h:%i%p') AS time, site, lat, lng, info FROM `matches`";
        $matches = DB::select($sql)->simplePaginate(5);*/
        $matches = Match::paginate(5);
        return view('matchs.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matchs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validations
        //Messages for validation
        $messages = [
            'name.required'     => 'El campo nombre es requerido.',
            'name.string'       => 'El campo nombre tiene que ser texto.',
            'players.required'  => 'El campo jugadores es requerido.',
            'players.numeric'   => 'El campo jugadores tiene que ser numerico.',
            'players.min'       => 'El campo jugadores tiene que ser mínimo 1.',
            'price.required'    => 'El campo precio es requerido.',
            'price.numeric'     => 'El campo precio tiene que ser numerico.',
            'price.min'         => 'El campo precio tiene que ser mínimo 1.',
            'hour.required'     => 'El campo hora es requerido.',
            'date.required'     => 'El campo fecha es requerido.',
            'site.required'     => 'El campo ubicación es requerido.',
            'lat.required'      => 'El campo latitud es requerido.',
            'lng.required'      => 'El campo longitud es requerido.',
        ];
        $rules = [
            'name'    => 'required|string',
            'players' => 'required|numeric|min:1',
            'price'   => 'required|numeric|min:1',
            'hour'    => 'required',
            'date'    => 'required',
            'site'    => 'required|string',
            'lat'     => 'required',
            'lng'     => 'required'
        ];
        $this->validate($request, $rules, $messages);


        // Create Object and Save it
        $match = new Match;
        $match->name = $request->name;
        $match->players = $request->players;
        $match->price = $request->price;
        $match->hour = $match->convertTimeToSQL($request->hour);
        $match->date = $match->convertDateToSQL($request->date);
        $match->site = $request->site;
        $match->lng = $request->lng;
        $match->lat = $request->lat;
        $match->info = $request->info;
        $match->save(); 


        Alert::success('Mejenga Creada exitosamente.');
        $matches = Match::paginate(5);
        return redirect()->route('matchs.index', compact('matches'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mejenguitas\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mejenguitas\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mejenguitas\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mejenguitas\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }

    public function matchsJoined()
    {
        return view('matchs.matchsJoined');
    }
}
