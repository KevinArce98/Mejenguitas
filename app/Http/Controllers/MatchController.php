<?php

namespace Mejenguitas\Http\Controllers;

use Mejenguitas\Match;
use Mejenguitas\Role;
use Mejenguitas\User;
use Mejenguitas\RequestAdmin;
use Illuminate\Http\Request;
use Mejenguitas\Http\Requests\MatchRequest;
use Alert;
use DB;

class MatchController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:mod', ['except' => ['matchsJoined', 'index', 'show', 'joinToMatch']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;

        $matches = DB::select('SELECT DISTINCT matches.* FROM matches, assigned_matchs WHERE matches.user_id != ? AND assigned_matchs.user_id != ? AND matches.id NOT IN (SELECT match_id FROM assigned_matchs WHERE user_id = ?)', [$id, $id, $id]);
        
        return view('home', compact('matches'));
    }

    public function indexForUser($id)
    {
        $user = User::findOrFail($id);
        $this->authorize($user);

        $matches = $user->matchs()->paginate(5);
        return view('matchs.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::findOrFail($id);
        $this->authorize($user);
        return view('matchs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Mejenguitas\Http\Requests\MatchRequest;
     * @return \Illuminate\Http\Response
     */
    public function store(MatchRequest $request, $id)
    {
        // Validations
        $user = User::findOrFail($id);
        $this->authorize($user);

        //Save Model Match
        auth()->user()->matchs()->create($request->all());

        Alert::success('Mejenga Creada exitosamente.');
        $matches = $user->matchs()->paginate(5);
        return redirect()->route('matchs.mymatchs', compact('id', 'matches'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mejenguitas\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $match = Match::findOrFail($id);
        return view('matchs.show', compact('match'));
    }

    public function search(Request $request)
    {
        $matches = Match::name($request->name)->site($request->site)->date($request->date)->where('user_id','!=', auth()->user()->id)->paginate(10);
        return view('home', compact('matches'));   
    }

    /*
    *
    *
    *
    */
    public function joinToMatch($id)
    {
        $match = Match::findOrFail($id);
        if ($match->players > count($match->users)) {
            $aux = false;
            foreach (auth()->user()->matchsJoined as $matchJoin) {
                $dateMatchNew = new \DateTime($match->date.' '.$match->match);
                $dateMatchOld = new \DateTime($matchJoin->date.' '.$match->matchJoin);
                if ($dateMatchNew == $dateMatchOld) {
                    return redirect()->back();
                }
            }
            auth()->user()->matchsJoined()->attach($match->id);
            $doIt = 1;
            $match = Match::findOrFail($id);
            return view('matchs.show', compact('match', 'doIt'));
        }
        return redirect()->back();
    }

    public function showPlayers($id)
    {
       $match = Match::findOrFail($id);
       return view('matchs.playersMatch', compact('match'));
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
    public function destroy($match_id)
    {
        /* VERIFICACION DE HORA  */
        $match = Match::findOrFail($match_id);
        $actual = new \DateTime('now');
        $dateMatch = new \DateTime($match->date.' '.$match->hour);
        $intervalo = $actual->diff($dateMatch);

        $minutes = (int) $intervalo->format('%i');
        if ($actual < $dateMatch) {
            if ($minutes > 30) {
                DB::delete('DELETE FROM `assigned_matchs` WHERE user_id = ? AND match_id = ?', [auth()->user()->id, $match_id]);
                $matchs = auth()->user()->matchsJoined;   
                $doIt = 1;
                return view('matchs.matchsJoined', compact('matchs', 'doIt')); 
            }else{
                $matchs = auth()->user()->matchsJoined;  
                $doIt = 0;
                return view('matchs.matchsJoined', compact('matchs', 'doIt'));
            }
        }elseif ($actual > $dateMatch || $actual == $dateMatch) {
            $matchs = auth()->user()->matchsJoined;  
            $doIt = 0;
            return view('matchs.matchsJoined', compact('matchs', 'doIt'));
        } 
    }

    public function pushOut($match, $user_id)
    {
        DB::delete('DELETE FROM `assigned_matchs` WHERE user_id = ? AND match_id = ?', [$user_id, $match]);
        return redirect()->back();
    }

    public function matchsJoined()
    {
        $matchs = auth()->user()->matchsJoined;   
        return view('matchs.matchsJoined', compact('matchs'));
    }
}
