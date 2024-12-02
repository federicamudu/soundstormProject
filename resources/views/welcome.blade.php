<x-layout>
    <div class="container p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-uppercase">
                    Soundstorm
                </h1>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="container mt-3">
            <div class="row justify-content-center text-center">
                <div class="col-12 alert alert-success">
                    {{session('success')}}
                </div>
            </div>
        </div>
    @endif
    <div class="container my-5 pt-5 border-top">
        <div class="row mb-5">
            <h2>
                Gli ultimi brani inseriti
            </h2>
        </div>
        <div class="row justify-content-center">
            @foreach ($tracks as $track)
            <div class="col-12 col-md-3">
                <x-card :track="$track"></x-card>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>