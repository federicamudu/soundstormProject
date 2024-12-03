<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genre;
use App\Models\Track;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdminController extends Controller implements HasMiddleware
{
    public static function middleware(){
        return [
            new Middleware('auth'),
        ];
    }
    public function dashboard(){
        if(!auth()->user()->isAdmin()){
            abort(403, 'Non autorizzato');
        }
        $users=User::all();
        $tracks=Track::all();
        $usersCount = User::all()->count();
        $tracksCount = Track::all()->count();
        $tracksSize=0;
        foreach($tracks as $track){
            $tracksSize+= Storage::disk('public')->size($track->path);
        }
        $tracksSize=number_format($tracksSize/1000000, 2, ',');
        //metriche temporali
        $now= CarbonImmutable::now();
        $previousWeek=$now->subWeek();
        $firstWeekDay=$previousWeek->startOfWeek();
        $lastWeekDay=$previousWeek->endOfWeek();
        $lastWeekUsers=$users->whereBetween('created_at', [$firstWeekDay, $lastWeekDay])->count();
        $lastWeekTracks=$tracks->whereBetween('created_at', [$firstWeekDay, $lastWeekDay])->count();
        return view('admin.dashboard', compact('usersCount', 'tracksCount', 'tracksSize', 'lastWeekUsers', 'lastWeekTracks'));
    }
    public function users(){
        if(!auth()->user()->isAdmin()){
            abort(403, 'Non autorizzato');
        }
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function tracks(){
        if(!auth()->user()->isAdmin()){
            abort(403, 'Non autorizzato');
        }
        $tracks = Track::all();
        return view('admin.tracks', compact('tracks'));
    }
    public function genres(){
        if(!auth()->user()->isAdmin()){
            abort(403, 'Non autorizzato');
        }
        $genres=Genre::all();
        return view('admin.genres', compact('genres'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        Genre::create([
            'name' => $request->name
        ]);
        return redirect()->back()->with('success', 'Genere creato con successo');
    }

    public function update(Request $request, Genre $genre){
        $request->validate([
            'name' => 'required'
        ]);
        $genre->update([
            'name' => $request->name
        ]);
        return redirect()->back()->with('success', 'Genere modificato con successo');
    }

    public function delete(Genre $genre){
        $genre->delete();
        return redirect()->back()->with('success', 'Genere eliminato con successo');
    }
}
