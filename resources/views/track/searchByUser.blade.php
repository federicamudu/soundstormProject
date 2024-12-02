<x-layout>
    <div class="container p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="display-1 text-uppercase">
                    tutti i brani di {{$user->name}}
                </h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach ($tracks as $track)
            <div class="col-12 col-md-3">
            <x-card :track="$track"></x-card>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>