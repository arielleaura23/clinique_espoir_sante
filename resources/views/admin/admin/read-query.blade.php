@extends('admin.layouts.app')

@section('title', 'Admin | Manage Read Queries')

@section('content')
    <div class="main-content">
        <div class="wrap-content container" id="container">

            <!-- Titre de la page -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Admin | Manage Read Queries</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><span>Admin</span></li>
                        <li class="active"><span>Read Queries</span></li>
                    </ol>
                </div>
            </section>

            <!-- Contenu principal -->
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">

                        <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Read Queries</span></h5>

                        <!-- Messages de session -->
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <!-- Tableau des requêtes -->
                        <table class="table table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Name</th>
                                    <th class="hidden-xs">Email</th>
                                    <th>Contact No.</th>
                                    <th>Message</th>
                                    <th>Query Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($queries as $index => $query)
                                    <tr>
                                        <td class="center">{{ $index + 1 }}</td>
                                        <td class="hidden-xs">{{ $query->fullname }}</td>
                                        <td>{{ $query->email }}</td>
                                        <td>{{ $query->contactno }}</td>
                                        <td>{{ $query->message }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($query->PostingDate)->format('d/m/Y H:i') }}
                                        </td>
                                        <td>

                                            {{-- <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                <a href="{{ route('admin.queries.details', $query->id) }}"
                                                    class="btn btn-transparent btn-lg" title="View Details">
                                                    <i class="fa fa-file"></i>
                                                </a>
                                            </div> --}}


                                            <div class="">
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-primary btn-o btn-sm dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right dropdown-light" role="menu">
                                                        <li>
                                                            <a href="{{ route('admin.queries.details', $query->id) }}">View
                                                                Details</a>
                                                        </li>
                                                        <li><a href="#" data-toggle="modal"
                                                                data-target="#editRemarkModal{{ $query->id }}">Edit</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Modal de modification de la remarque -->
                                            <div class="modal fade" id="editRemarkModal{{ $query->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="editRemarkLabel{{ $query->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form method="POST"
                                                        action="{{ route('admin.queries.editRemark', $query->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-content" style="background-color: white;">
                                                            <div class="modal-header text-white" style="background-color: #1d7eff;">
                                                                <h3 class="modal-title" style="color: white"
                                                                    id="editRemarkLabel{{ $query->id }}">Modifier la
                                                                    remarque</h3>
                                                                {{-- <button type="button" class="close text-white"
                                                                    data-dismiss="modal" aria-label="Fermer">
                                                                    <span style="color: white" aria-hidden="true">&times;</span>
                                                                </button> --}}
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="AdminRemark">Remarque de
                                                                    l’administrateur</label>
                                                                <textarea name="AdminRemark" class="form-control" rows="5" required>{{ $query->AdminRemark }}</textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn" style="background-color: #1d7eff;color: white;">Enregistrer</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Annuler</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Aucune requête lue trouvée.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
