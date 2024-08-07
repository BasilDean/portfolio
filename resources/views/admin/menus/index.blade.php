@extends('admin.layouts.admin_layout')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title"><h1>{{ __('menus.title') }}</h1></h3>
        </div> <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">

                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>{{ __('menus.name') }}</th>
                    <th>{{ __('menus.url') }}</th>
                    <th>{{ __('menus.type') }}</th>
                    <th>{{ __('menus.actions') }}</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($menus as $key=>$menu)
                    <tr class="align-middle">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $menu->translated_name }}</td>
                        <td>{{ $menu->url }}</td>
                        <td>{{ $menu->type }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('menus.edit', $menu) }}">{{ __('menus.edit_link') }}</a>
                            <form action="{{ route('menus.destroy', $menu) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">{{ __('menus.delete_link') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn btn-primary" href="{{ route('menus.create') }}">{{ __('menus.create_link') }}</a>
        </div>
    </div>

@endsection
