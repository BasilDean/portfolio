@extends('admin.layouts.admin_layout')

@section('content')

    <div class="card card-primary card-outline mb-4 mt-5 col-12 col-md-8 mx-auto"> <!--begin::Header-->
        <div class="card-header">
            <h1>{{ __('menus.create_title') }}</h1>
        </div> <!--end::Header--> <!--begin::Form-->

        <form action="{{ route('menus.store') }}" method="POST">

            <div class="card-body">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name_en" class="form-label">Name (English)</label>
                    <input class="form-control" type="text" name="name_en" id="name_en" value="" required>
                </div>
                <div class="mb-3">
                    <label for="name_ru" class="form-label">Name (Russian)</label>
                    <input class="form-control" type="text" name="name_ru" id="name_ru" value="" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="url">{{ __('menus.url') }}</label>
                    <input class="form-control" type="text" name="url" id="url" value="" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="type">{{ __('menus.type') }}</label>
                    <select class="form-control" name="type" id="type" required>
                        <option value="public" selected>Public</option>
                        <option value="private">Private</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="group">{{ __('menus.group') }}</label>
                    <input class="form-control" type="text" name="group" id="group" value="" required>
                </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">{{ __('menus.save') }}</button>
            </div>
        </form>

    </div>
@endsection
