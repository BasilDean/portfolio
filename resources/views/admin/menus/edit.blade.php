@extends('admin.layouts.admin_layout')

@section('content')

    <div class="card card-primary card-outline mb-4 mt-5 col-12 col-md-8 mx-auto"> <!--begin::Header-->
        <div class="card-header">
            <h1>{{ __('menus.edit_title') }}</h1>
        </div> <!--end::Header--> <!--begin::Form-->

        <form action="{{ route('menus.update', $menu) }}" method="POST">

            <div class="card-body">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name_en" class="form-label">Name (English)</label>
                <input class="form-control" type="text" name="name_en" id="name_en" value="{{ $translation_en->name ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="name_ru" class="form-label">Name (Russian)</label>
                <input class="form-control" type="text" name="name_ru" id="name_ru" value="{{ $translation_ru->name ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="url">{{ __('menus.url') }}</label>
                <input class="form-control" type="text" name="url" id="url" value="{{ $menu->url }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="type">{{ __('menus.type') }}</label>
                <select class="form-control" name="type" id="type" required>
                    <option value="public" {{ $menu->type == 'public' ? 'selected' : '' }}>Public</option>
                    <option value="private" {{ $menu->type == 'private' ? 'selected' : '' }}>Private</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="group">{{ __('menus.group') }}</label>
                <input class="form-control" type="text" name="group" id="group" value="{{ $menu->group }}" required>
            </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">{{ __('menus.save') }}</button>
            </div>
        </form>

    </div>

@endsection
