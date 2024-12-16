@extends('layout.app')
@section('title') List de paiements @endsection

@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Historique des Paiement effectuées</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">

    <div class="row mt--2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Paiement</h4>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Numéro de Référence</th>
                            <th>Employé</th>
                            <th>Date de prise de poste</th>
                            <th>Date fin de contrat</th>
                            <th>Nombre heure travaillé</th>
                            <th>Salaire Net</th>
                            <th>Date de Paiement</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paiements as $paiement)
                        <tr>
                            <td>{{ $paiement->id }}</td>
                            <td>{{ $paiement->employee->full_name }}</td>
                            <td>{{ $paiement->temps_de_travail_a_payer_debut }}</td>
                            <td>{{ $paiement->temps_de_travail_a_payer_fin }}</td>
                            <td>{{ $paiement->nombre_heure_travaillée }}</td>
                            <td>{{ $paiement->salaire_brut }}</td>
                            <td>{{ $paiement->montant_a_payer }}</td>
                            <td>
                                {{-- <a href="{{ route('paiements.print', $paiement->id) }}"
                                    class="btn btn-info">Imprimer</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
