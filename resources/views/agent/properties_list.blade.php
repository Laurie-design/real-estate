@extends('layouts.agent.base')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Liste des biens</h3>
            <h6 class="op-7 mb-2">Liste des biens enregistrés</h6>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            {{-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> --}}
            <a href="{{ route('property.create') }}" class="btn btn-primary btn-round">Ajouter un bien</a>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">Multi Filter Select</h4>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th>prix</th>
                                    <th>Visibilité</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th>prix</th>
                                    <th>Visibilité</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($properties as $property)
                                    <tr>
                                        <td><img src="{{ asset('storage/' . $property->image_path) }}" alt="{{ $property->title }}" class="property-image"></td>
                                        <td>{{ $property->title }}</td>
                                        <td>{{ $property->price }}</td>
                                        <td>{{ $property->is_public ? "Publique" : "Privée" }}</td>
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a href="{{ route('agent.property.show', ['id'=>$property->id]) }}" type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary dtable-ico-btn" data-original-title="Edit Task">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('property.edit', ['id'=>$property->id]) }}" type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-warn dtable-ico-btn" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('property.destroy', ['id'=>$property->id]) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger dtable-ico-btn" data-original-title="Edit Task">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});

            $("#multi-filter-select").DataTable({
                pageLength: 5,
                initComplete: function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var column = this;
                            var select = $(
                                    '<select class="form-select"><option value=""></option></select>'
                                )
                                .appendTo($(column.footer()).empty())
                                .on("change", function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column
                                        .search(val ? "^" + val + "$" : "", true, false)
                                        .draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append(
                                        '<option value="' + d + '">' + d + "</option>"
                                    );
                                });
                        });
                },
            });

            // Add Row
            $("#add-row").DataTable({
                pageLength: 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $("#addRowButton").click(function() {
                $("#add-row")
                    .dataTable()
                    .fnAddData([
                        $("#addName").val(),
                        $("#addPosition").val(),
                        $("#addOffice").val(),
                        action,
                    ]);
                $("#addRowModal").modal("hide");
            });
        });
    </script>
@endsection
