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
</x-layout>