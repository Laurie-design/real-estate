@extends('layouts.agent.base')

@section('content')

@if(session('success'))
    <div id="success-alert" class="alert alert-success d-flex align-items-center" role="alert" style="border: 1px solid #28a745; border-radius: 5px; background-color: #e9f7ef; padding: 10px; width: 50%; height: 50px; margin: 0 auto;">
        <i class="fas fa-check-circle" style="font-size: 30px; margin-right: 15px; color: #28a745;"></i>
        <div style="line-height: 30px;">
            {{ session('success') }}
        </div>
    </div>
@endif 
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Liste des Requetes</h3>
            <h6 class="op-7 mb-2">Liste des requetes</h6>
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
                                    <th>Type de bien</th>
                                    <th>Prix maximal</th>
                                    <th>Surface min.</th>
                                    <th>Surface max.</th>
                                    <th>Description</th>
                                    <th>Tel. client</th>
                                    <th>Quartier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Type de bien</th>
                                    <th>Prix maximal</th>
                                    <th>Surface min.</th>
                                    <th>Surface max.</th>
                                    <th>Description</th>
                                    <th>Tel. client</th>
                                    <th>Quartier</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($requetes as $req)
                                    <tr>
                                        <td>{{ $req->type }}</td>
                                        <td>{{ $req->price_max }}</td>
                                        <td>{{ $req->surface_min }}</td>
                                        <td>{{ $req->surface_max }}</td>
                                        <td>{{ $req->description }}</td>
                                        <td>{{ $req->tel_client }}</td>
                                        <td>{{ $req->district }}</td>
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <form action="{{ route('agent.requetes.destroy', ['id'=>$req->id]) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" data-bs-toggle="tooltip" title="Supprimer" class="btn btn-link btn-danger dtable-ico-btn">
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
            setTimeout(function() {
                $('#success-alert').fadeOut('slow');
            }, 5000); 
        });
    </script>
@endsection
