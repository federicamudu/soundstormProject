<x-layout>
    <div class="container p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-uppercase">
                    Aggiorna profilo
                </h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form action="{{route('profile.update', compact('user'))}}" method="POST" class="rounded p-5 border">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                        @error('name')
                            <span class="small fst-italic text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" aria-describedby="emailHelp">
                        @error('email')
                            <span class="small fst-italic text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">Numero di cellulare</label>
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{$user->profile->mobile_number}}">
                        @error('mobile_number')
                            <span class="small fst-italic text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="col-7">
                            <label for="address" class="form-label">Residenza</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$user->profile->address}}">
                            @error('address')
                                <span class="small fst-italic text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="zip_code" class="form-label">CAP</label>
                            <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{$user->profile->zip_code}}">
                            @error('zip_code')
                                <span class="small fst-italic text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="col-7">
                            <label for="city" class="form-label">Citta'</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{$user->profile->city}}">
                            @error('city')
                                <span class="small fst-italic text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="province" class="form-label">Provincia</label>
                            <input type="text" class="form-control" id="province" name="province" value="{{$user->profile->province}}">
                            @error('province')
                                <span class="small fst-italic text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="col-5">
                            <label for="region" class="form-label">Regione</label>
                            <input type="text" class="form-control" id="region" name="region" value="{{$user->profile->region}}">
                            @error('region')
                                <span class="small fst-italic text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-5">
                            <label for="country" class="form-label">Paese</label>
                            <input type="text" class="form-control" id="country" name="country" value="{{$user->profile->country}}">
                            @error('country')
                                <span class="small fst-italic text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Aggiorna profilo</button>
                    <a href="{{route('profile.page')}}" class="btn btn-outline-primary">Torna indietro</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>