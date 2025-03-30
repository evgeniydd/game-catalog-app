@extends('layouts.app')

@section('content')
    <div class="w-3/4 p-4">
        <h1 class="text-2xl font-bold mb-4">Add New Game</h1>
        <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block">Title</label>
                <input type="text" name="title" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Developer</label>
                <input type="text" name="developer" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Genre</label>
                <select name="genre" class="w-full p-2 border rounded" required>
                    <option value="Action">Action</option>
                    <option value="RPG">RPG</option>
                    <option value="Strategy">Strategy</option>
                    <option value="Adventure">Adventure</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block">Release Date</label>
                <input type="date" name="release_date" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Platform</label>
                <select name="platform" class="w-full p-2 border rounded" required>
                    <option value="PC">PC</option>
                    <option value="PlayStation">PlayStation</option>
                    <option value="Xbox">Xbox</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block">Price (USD)</label>
                <input type="number" step="0.01" name="price" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Cover Image</label>
                <input type="file" name="cover_image" class="w-full p-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Save</button>
        </form>
    </div>
@endsection