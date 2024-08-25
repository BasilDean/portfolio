@extends('layouts.gymTracker.layout')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">{{ __('gymTracker.bodyParts.title') }}</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                        <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                {{ __('gymTracker.bodyParts.id') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                {{ __('gymTracker.bodyParts.name') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                {{ __('gymTracker.bodyParts.icon') }}
                                            </th>
                                            <th rowspan="1" colspan="1">{{ __('gymTracker.bodyParts.edit_title') }}</th>
                                            <th rowspan="1" colspan="1">{{ __('gymTracker.bodyParts.delete_title') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bodyParts as $bodyPart)
                                            <tr>
                                                <td class="dtr-control sorting_1" tabindex="0">{{$bodyPart->id}}</td>
                                                <td>{{$bodyPart->translated_title}}</td>
                                                <td>
                                                    <img src="{{ asset($bodyPart->icon) }}" alt="">
                                                </td>
                                                <td>
                                                    <a class="btn btn-warning" href="{{ route('gymtracker.bodyparts.edit', $bodyPart) }}">{{ __('menus.edit_link') }}</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('gymtracker.bodyparts.destroy', $bodyPart) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">{{ __('menus.delete_link') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">{{ __('gymTracker.bodyParts.id') }}</th>
                                            <th rowspan="1" colspan="1">{{ __('gymTracker.bodyParts.name') }}</th>
                                            <th rowspan="1" colspan="1">{{ __('gymTracker.bodyParts.icon') }}</th>
                                            <th rowspan="1" colspan="1">{{ __('gymTracker.bodyParts.edit_title') }}</th>
                                            <th rowspan="1" colspan="1">{{ __('gymTracker.bodyParts.delete_title') }}</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <!-- Pagination links -->
                            {{ $bodyParts->links('vendor.pagination.lte') }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
