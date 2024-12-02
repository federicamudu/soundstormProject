<x-layout>
    <div class="container pt-5">
        <div class="row pt-5">
            <div class="col-12 text-center">
                <h2>Profilo di {{Auth::user()->name}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <form action="{{route('profile.setAvatar', compact('user'))}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="custom-file-button">
                                    <label for="avatar" class=""><i class="bi bi-pencil-square text-secondary"></i></label>
                                    <button type="submit" class="border-0 bg-white"><i class="bi bi-check2-square text-secondary"></i></button>
                                    <input type="file" class="" name="avatar" id="avatar">
                                    @error('avatar')
                                        <div class="small fst-italic text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </form>
                            <img src="{{$user->profile->avatar ? Storage::url($user->profile->avatar) : 'public/storage/default.png'}}" alt="Admin" class="rounded-circle" width="150">
                            @if (session('success'))
                                <div class="container mt-3">
                                    <div class="row text-center">
                                        <div class="col-12 alert alert-success">
                                            {{session('success')}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="mt-3">
                                <h4>{{Auth::user()->name}}</h4>
                                <p class="text-secondary mb-1">Full Stack Developer</p>
                                <p class="text-muted font-size-sm">{{$user->profile->city}}, {{$user->profile->province}}, {{$user->profile->country}}</p>
                            </div>
                            <div class="mt-3">
                                <a href="{{route('profile.edit', compact('user'))}}" class="btn btn-primary">Aggiorna profilo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="row">
                    <h4 class="text-center">
                        I miei brani
                    </h4>
                </div>
                <div class="row justify-content-center">
                    @foreach ($user->tracks as $track)
                    <div class="col-12 col-md-3">
                    <x-card :track="$track"></x-card>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>