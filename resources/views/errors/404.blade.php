<x-layout>

    <x-slot:heading>
        404 Not Found
    </x-slot:heading>

    <h1 class="text-lg">
        The page you are looking for doesn't exist or has been moved.
    </h1>
    <a href="{{ route('home') }}" class="text-blue-800 hover:underline">Go Back Home...</a>
</x-layout>


