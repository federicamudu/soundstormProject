<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center pt-5">
            <div class="col-12 col-md-6">
                <form action="{{route('login')}}" class="rounded p-5 border border-black bg-body-tertiary" method="POST">
                    @csrf
                    <div class="my-3 text-center pb-5">
                        <h2>Accedi</h2>
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
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-dark">Accedi</button>
                    </div>
                    <div class="mt-2 text-center">
                        <span>Non sei registrato?</span>
                        <a class="text-secondary" href="{{route('register')}}">Clicca qui</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>