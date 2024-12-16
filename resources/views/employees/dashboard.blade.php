@extends('layout.app')

@section('title') Admin Dashboard @endsection
@section('content')

<div class="panel-header" data-background-color="dark2">
    <div class="page-inner py-5" >
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Tableau de bord</h2>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a href="{{ route('payments.index')  }}" class="sidebar-link btn btn-white btn-border btn-round mr-2">Gérer les paiements</a>
                <a href="{{ route('employees.index')  }}" class="sidebar-link btn btn-secondary btn-round">Ajouter un employé</a>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5" >

<div class="row mt--2">
    <div class="col-md-6">
        <div class="card full-height">
            <div class="card-body">
                <div class="card-title">Statistiques globales</div>
                <div class="card-category">Informations quotidiennes sur les statistiques du système</div>
                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div>
                            <h3 class="fw-bold">{{ $totalEmployees ?? 0 }}</h3>
                        </div>
                        <h6 class="fw-bold mt-3 mb-0">Total des employés</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div>
                            <h3 class="fw-bold">{{ $totalPayed ?? 0 }}</h3>
                        </div>
                        <h6 class="fw-bold mt-3 mb-0">Total payé</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau des employés -->
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Table des employés</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Poste</th>
                                <th>Type de contrat</th>
                                <th>Date de prise de service</th>
                                <th>Date de Fin de contrat</th>
                                <th>Heures par semaine</th>
                                <th>Numero de Compte</th>
                                <th>Salaire brut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->full_name }}</td>
                                    <td>{{ $employee->poste }}</td>
                                    <td>{{ $employee->type_de_contrat }}</td>
                                    <td>{{ $employee->date_de_prise_de_service }}</td>
                                    <td>{{ $employee->date_de_fin_de_contrat }}</td>
                                    <td>{{ $employee->nombre_heure_par_semaine }}</td>
                                    <td>{{ $employee->bank_account }}</td>
                                    <td>{{ $employee->salaire_brut }}</td>
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
