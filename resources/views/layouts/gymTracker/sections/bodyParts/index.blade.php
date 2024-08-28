@extends('layouts.gymTracker.layout')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header d-flex space-between">
                        <h2 class="card-title">{{ __('gymTracker.bodyParts.title') }}</h2>
                        <div class="btn btn-success ml-5" id="createNewParameter" type="button">{{ __('gymTracker.bodyParts.create_btn') }}</div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                           aria-describedby="example2_info">
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
                                            <th rowspan="1" colspan="1">{{ __('gymTracker.bodyParts.edit_btn') }}</th>
                                            <th rowspan="1"
                                                colspan="1">{{ __('gymTracker.bodyParts.delete_btn') }}</th>
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
                                                    <a class="btn btn-warning editItem" data-element-id="{{$bodyPart->id}}"
                                                       href="{{ route('gymtracker.bodyparts.edit', $bodyPart) }}">{{ __('gymTracker.bodyParts.edit_btn') }}</a>
                                                </td>
                                                <td>
                                                    <form class="deleteItem"
                                                        action="{{ route('gymtracker.bodyparts.destroy', $bodyPart) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger"
                                                                type="submit">{{ __('gymTracker.bodyParts.delete_btn') }}</button>
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
                                            <th rowspan="1" colspan="1">{{ __('gymTracker.bodyParts.edit_btn') }}</th>
                                            <th rowspan="1" colspan="1">{{ __('gymTracker.bodyParts.delete_btn') }}</th>
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

    <div class="modal fade show" id="paramModal" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="editor">
                        @csrf
                        <div class="form-group">
                            <label for="locale_ru">title (ru)</label>
                            <input type="text" class="form-control form-control-border border-width-2"
                                   id="locale_ru" name="locale_ru" placeholder="title (ru)">
                        </div>
                        <div class="form-group">
                            <label for="locale_en">title (en)</label>
                            <input type="text" class="form-control form-control-border border-width-2"
                                   id="locale_en" name="locale_en" placeholder="title (en)">
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <div class="custom-file">
                                <input type="file" name="icon" id="icon">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('gymTracker.bodyParts.create_btn') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script>
        const translations = {
            modalTitle: "{{ __('gymTracker.bodyParts.create_btn') }}",
            createRoute: "{{ route('gymtracker.bodyparts.store') }}",
        };
        document.addEventListener('DOMContentLoaded', function () {
            // Set up CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const showModalCreate = () => {
                const modal = $('#paramModal');
                const form = modal.find('form');
                console.log(form)
                form.trigger('reset'); // Reset the form fields
                form.attr('action', translations.createRoute); // Set the form action to the create route
                form.attr('method', 'POST'); // Ensure the method is POST for creating new items
                const paramModal = new bootstrap.Modal(modal[0])
                paramModal.show();
                $(modal).find('.modal-title').text(translations.modalTitle)
                return false;
            };

            const addEditElement = (formData, actionUrl, method) => {
                $.ajax({
                    url: actionUrl,
                    method: method,
                    data: formData,
                    contentType: false, // Important
                    processData: false, // Important
                    success: function(response) {
                        console.log(response);
                        $('#editModal').modal('hide');
                        location.reload(); // Optionally update the list without a full page reload
                    },
                    error: function() {
                        alert('Failed to save the item.');
                    }
                });
            }

            const deleteElement = (formData, actionUrl, method) => {
                $.ajax({
                    url: actionUrl,
                    method: method,
                    data: formData,
                    contentType: false, // Important
                    processData: false, // Important
                    success: function(response) {
                        console.log(response);
                        location.reload(); // Optionally update the list without a full page reload
                    },
                    error: function() {
                        alert('Failed to delete the item.');
                    }
                });
            }

            $('#createNewParameter').on('click', showModalCreate);

            $('#editor').on('submit', function (e) {
                e.preventDefault();
                addEditElement(new FormData(this), $(this).attr('action'), $(this).attr('method'));
            });

            $('.editItem').on('click', function (e) {
                e.preventDefault();
                const elementId = $(this).data('elementId');
                console.log(elementId);
            });

            $('.deleteItem').on('submit', function (e) {
                e.preventDefault();
                deleteElement(new FormData(this), $(this).attr('action'), $(this).attr('method'));
            });

        });
    </script>
@endsection
