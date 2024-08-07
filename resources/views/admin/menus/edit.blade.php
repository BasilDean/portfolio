{{--@extends('layouts.admin')--}}

{{--@section('content')--}}
    <h1>Edit Menu</h1>
    <form action="{{ route('menus.update', $menu) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $menu->name }}" required>
        </div>
        <div>
            <label for="url">URL</label>
            <input type="text" name="url" id="url" value="{{ $menu->url }}" required>
        </div>
        <div>
            <label for="type">Type</label>
            <select name="type" id="type" required>
                <option value="public" {{ $menu->type == 'public' ? 'selected' : '' }}>Public</option>
                <option value="private" {{ $menu->type == 'private' ? 'selected' : '' }}>Private</option>
            </select>
        </div>
        <div>
            <label for="group">Group</label>
            <input type="text" name="group" id="group" value="{{ $menu->group }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
{{--@endsection--}}
