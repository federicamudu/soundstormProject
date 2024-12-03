<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DownloadNotificationMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class TrackController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['index', 'searchByUser'])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks = Track::orderBy('created_at', 'desc')->get();
        return view('track.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('track.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'cover' => 'required|image',
            'description' => 'required',
            'path' => 'required|file|mimes:mp3,wav,aac',
            'genres' => 'required'
        ]);
        $track = Track::create([
            'title' => $request->title,
            'cover' => $request->file('cover')->store('covers', 'public'),
            'description' => $request->description,
            'path' => $request->file('path')->store('tracks', 'public'),
            'user_id' => Auth::user()->id
        ]);

        $track->genres()->attach($request->genres);

        return redirect()->route('homepage')->with('success', 'Track caricata');
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        if (!$track->authIsCreator()) {
            abort(403, 'Non sei autorizzato');
        }
        $genres = Genre::all();
        return view('track.edit', compact('track', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genres' => 'required'
        ]);
        $track->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        if ($request->cover) {
            $request->validate([
                'cover' => 'image'
            ]);
            $track->update([
                'cover' => $request->file('cover')->store('covers', 'public')
            ]);
        }
        if ($request->path) {
            $request->validate([
                'path' => 'file|mimes:mp3,wav,aac'
            ]);
            $track->update([
                'path' => $request->file('path')->store('tracks', 'public')
            ]);
        }
        $track->genres()->sync($request->genres);
        return redirect()->route('profile.page')->with('success', 'Track modificata');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        $track->genres()->detach($track->genres);
        $track->delete();
        return redirect()->route('profile.page')->with('success', 'Track eliminata');
    }

    public function filterByUser(User $user)
    {
        $tracks = Track::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('track.searchByUser', compact('tracks', 'user'));
    }

    public function filterByGenre(Genre $genre)
    {
        $tracks = $genre->tracks->sortByDesc('created_at');
        return view('track.searchByGenre', compact('tracks', 'genre'));
    }
    public function download(Track $track)
    {
        $email=$track->user->email;
        $username=$track->user->name;
        $trackTitle=$track->title;
        Mail::to($email)->send(new DownloadNotificationMail($username, $trackTitle));
        return Storage::disk('public')->download($track->path);
    }
}
