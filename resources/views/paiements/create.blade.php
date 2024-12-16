@extends('layout.app')

@section('title') Payer un employé @endsection

@section('content')
<div class="panel-header" data-background-color="dark2">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Créer un Paiement de Salaire</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="card container">
            <div class="card-header">
                <h4 class="card-title">Formulaire de Paiement</h4>
            </div>
            <div class="card-body">
                <form method="POST" id="salary-form" action="{{ route('payments.store') }}">
                    @csrf

                    <!-- Employee selection -->
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Employé</label>
                        <select name="employee_id" id="employee_id" class="form-select form-control" required>
                            <option value="">Sélectionner un Employé</option>
                            @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Start Date -->
                    <div class="mb-3">
                        <label for="temps_de_travail_a_payer_debut" class="form-label">Début de la période de
                            travail</label>
                        <input type="date" class="form-control" id="temps_de_travail_a_payer_debut"
                            name="temps_de_travail_a_payer_debut" required>
                    </div>

                    <!-- End Date -->
                    <div class="mb-3">
                        <label for="temps_de_travail_a_payer_fin" class="form-label">Fin de la période de
                            travail</label>
                        <input type="date" class="form-control" id="temps_de_travail_a_payer_fin"
                            name="temps_de_travail_a_payer_fin" required>
                    </div>

                    <!-- Hours Worked -->
                    <div class="mb-3">
                        <label for="nombre_heure_travaillée" class="form-label">Nombre d'heures travaillées</label>
                        <input type="number" class="form-control" id="nombre_heure_travaillée"
                            name="nombre_heure_travaillée" required>
                    </div>

                    <!-- Overtime Hours (Optional) -->
                    <div class="mb-3">
                        <label for="heures_supplementaire" class="form-label">Heures supplémentaires
                            (facultatif)</label>
                        <input type="number" class="form-control" id="heures_supplementaire"
                            name="heures_supplementaire">
                    </div>

                    <button type="submit" class="btn btn-primary" id="salarypay-submit-button">Créer le
                        Paiement</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Form submission handling
        $('#salarypay-submit-button').click(function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the form and action URL
        var form = $('#salary-form');
        var url = form.attr('action');
        var isValid = true;

        // Clear previous error messages
        $('.text-danger').remove();

        // Validate required fields
        var requiredFields = [
            '#employee_id',
            '#temps_de_travail_a_payer_debut',
            '#temps_de_travail_a_payer_fin',
            '#nombre_heure_travaillée'
        ];

        // Check if required fields are empty
        requiredFields.forEach(function(field) {
            if ($(field).val() === '') {
                $(field).after('<small class="text-danger">Ce champ est requis.</small>');
                isValid = false;
            }
        });

        // Stop if validation fails
        if (!isValid) return;

        // Submit the form using AJAX
        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                // Handle success response
                $('#message').remove(); // Clear previous messages

                if (response.success) {
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Succès',
                        message: response.success,
                    }, {
                        type: 'info',
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                        time: 1000,
                    });

                    form[0].reset(); // Reset form
                    // Optionally reload employee list or other UI changes
                } else if (response.error) {
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Erreur',
                        message: response.error,
                    }, {
                        type: 'danger',
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                        time: 1000,
                    });
                }
            },
            error: function(xhr) {
                // Handle error response
                $.notify({
                    icon: 'flaticon-alarm-1',
                    title: 'Erreur',
                    message: "Une erreur est survenue. Veuillez réessayer.",
                }, {
                    type: 'danger',
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    time: 1000,
                });
            }
        });
    });
    });
</script>
@endsection
