@extends('layouts.app')

@section('content')
    <div class="w-3/4 p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Game</h1>
        <form method="POST" action="{{ route('games.update', $game) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block">Title</label>
                <input type="text" name="title" value="{{ $game->title }}" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Developer</label>
                <input type="text" name="developer" value="{{ $game->developer }}" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Genre</label>
                <select name="genre" class="w-full p-2 border rounded" required>
                    @foreach(['Action', 'RPG', 'Strategy', 'Adventure'] as $option)
                        <option value="{{ $option }}" {{ $game->genre == $option ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block">Release Date</label>
                <input type="date" name="release_date" value="{{ $game->release_date->format('Y-m-d') }}" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Platform</label>
                <select name="platform" class="w-full p-2 border rounded" required>
                    @foreach(['PC', 'PlayStation', 'Xbox'] as $option)
                        <option value="{{ $option }}" {{ $game->platform == $option ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block">Price (USD)</label>
                <input type="number" step="0.01" name="price" value="{{ $game->price }}" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Cover Image</label>
                <input type="file" name="cover_image" class="w-full p-2 border rounded">
                @if($game->cover_image)
                    <img src="{{ asset('storage/' . $game->cover_image) }}" alt="{{ $game->title }}" class="w-32 mt-2">
                @endif
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update</button>
        </form>
    </div>
@endsection