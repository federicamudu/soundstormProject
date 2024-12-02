<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center pt-5">
            <div class="col-12 col-md-9">
                <form action="{{route('register')}}" class="rounded p-5 border border-black bg-body-tertiary" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="my-3 text-center pb-5">
                                <h2>Registrati</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name">
                                @error('name')
                                    <div class="small fst-italic text-danger">{{ $message }}</di>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                                @error('email')
                                    <div class="small fst-italic text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @error('password')
                                    <div class="small fst-italic text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Conferma password:</label>
                                <input type="password" class="form-control" id="password" name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="small fst-italic text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="mb-3">
                                <label for="address" class="form-label">Residenza:</label>
                                <input type="text" class="form-control" id="address" name="address">
                                @error('address')
                                    <div class="small fst-italic text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <div class="col-5">
                                    <label for="city" class="form-label">Città:</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                    @error('city')
                                        <div class="small fst-italic text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label for="zip_code" class="form-label">CAP:</label>
                                    <input type="text" class="form-control" id="zip_code" name="zip_code">
                                    @error('zip_code')
                                        <div class="small fst-italic text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <div class="col-5">
                                    <label for="province" class="form-label">Provincia:</label>
                                    <input type="text" class="form-control" id="province" name="province">
                                    @error('province')
                                        <div class="small fst-italic text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-5">
                                    <label for="region" class="form-label">Regione:</label>
                                    <input type="text" class="form-control" id="region" name="region">
                                    @error('region')
                                        <div class="small fst-italic text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <div class="col-5">
                                    <label for="country" class="form-label">Stato:</label>
                                    <input type="text" class="form-control" id="country" name="country">
                                    @error('country')
                                        <div class="small fst-italic text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-5">
                                    <label for="mobile_number" class="form-label">Telefono:</label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number">
                                    @error('mobile_number')
                                        <div class="small fst-italic text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-dark">Registrati</button>
                    </div>
                    <div class="mt-2 text-center">
                        <span>Sei già registrato?</span>
                        <a class="text-secondary" href="{{route('login')}}">Clicca qui</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>