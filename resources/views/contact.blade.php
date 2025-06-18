<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>{{ $header }}</x-slot:header>
    <h3 class="text-xl">{{ $data['name'] }}</h3>
    <p>{{ $data['email'] }}</p>
</x-layout>