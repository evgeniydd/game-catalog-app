@extends('layouts.app')

@section('sidebar')
    <div class="w-1/4 p-4 bg-white rounded shadow">
        <form method="GET" action="{{ route('games.index') }}">
            <div class="flex mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title" class="w-full p-2 border rounded">
                <button class="bg-blue-500 text-white rounded px-4" type="submit" name="reset" value="1">Reset</button>
            </div>
            <div class="mb-4">
            <div class="flex justify-between items-center my-4">
                <h3 class="font-bold">Genres</h3>
                <span class="text-xs text-zinc-500 cursor-pointer clear-genres">Clear</span>
            </div>
                @foreach(['Action', 'RPG', 'Strategy', 'Adventure', 'Sandbox'] as $genre)
                    <label class="block">
                        <input type="checkbox" name="genre" value="{{ $genre }}" {{ request('genre') == $genre ? 'checked' : '' }}>
                        {{ $genre }}
                    </label>
                @endforeach
            </div>
            <div class="mb-4">
                <div class="flex justify-between items-center my-4">
                    <h3 class="font-bold">Platforms</h3>
                    <span class="text-xs text-zinc-500 cursor-pointer clear-platforms">Clear</span>
                </div>
                @foreach(['PC', 'PlayStation', 'Xbox', 'PS4', 'Switch'] as $platform)
                    <label class="block">
                        <input type="checkbox" name="platform" value="{{ $platform }}" {{ request('platform') == $platform ? 'checked' : '' }}>
                        {{ $platform }}
                    </label>
                @endforeach
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Filter</button>
        </form>
    </div>
@endsection

@section('content')
    <div class="w-3/4 p-4">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Game Catalog</h1>
            <a href="{{ route('games.create') }}" class="bg-green-500 text-white p-2 rounded">Add Game</a>
        </div>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif
        <div class="grid grid-cols-3 gap-4" id="games-list">
            @foreach ($games as $game)
                <div class="bg-white p-4 rounded shadow">
                    <img src="{{ $game->cover_image ? asset('storage/' . $game->cover_image) : 'https://placehold.co/600x400' }}" alt="{{ $game->title }}" class="w-full h-48 object-cover">
                    <h2 class="text-lg font-bold">{{ $game->title }}</h2>
                    <p>{{ $game->developer }}</p>
                    <p>{{ $game->genre }}</p>
                    <p>{{ $game->release_date->format('Y-m-d') }}</p>
                    <p>{{ $game->platform }}</p>
                    <p>${{ number_format($game->price, 2) }}</p>
                    <div class="flex justify-between mt-2">
                        <a href="{{ route('games.edit', $game) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('games.destroy', $game) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $games->links() }}
        </div>
    </div>
@endsection