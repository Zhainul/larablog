<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">{{ $data['name'] }}</h3>
    <p>{{ $data['email'] }}</p>
</x-layout>