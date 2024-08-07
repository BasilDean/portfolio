{{--@extends('layouts.admin')--}}

{{--@section('content')--}}
    <h1>Create Menu</h1>
    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="url">URL</label>
            <input type="text" name="url" id="url" required>
        </div>
        <div>
            <label for="type">Type</label>
            <select name="type" id="type" required>
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
        </div>
        <div>
            <label for="group">Group</label>
            <input type="text" name="group" id="group" required>
        </div>
        <button type="submit">Create</button>
    </form>
{{--@endsection--}}
