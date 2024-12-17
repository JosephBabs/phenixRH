
@extends('layout.app')

@section('title') Ajouter Employés @endsection
@section('content')

<div class="panel-header " data-background-color="dark2">
    <div class="page-inner ">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Formulaire d'ajout d'un employé</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <!-- Formulaire d'ajout d'employé -->
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ajouter un nouvel employé</h4>
                </div>
                <div class="card-body">
                    <form id="employee-form" action="{{ route('employees.store') }}" validate method="POST">
                        @csrf
                        <div class="row">
                            <!-- Employee Information -->
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="full_name">Nom complet</label>
                                    <input required type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name') }}">
                                    @error('full_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="employee_id">ID Employé</label>
                                    <input required type="text" name="employee_id" id="employee_id" class="form-control" value="{{ old('employee_id') }}">
                                    @error('employee_id')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gross_salary">Salaire brut</label>
                                    <input required type="number" name="salaire_brut" id="salaire_brut" class="form-control" value="{{ old('salaire_brut') }}">
                                    @error('gross_salary')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="naissances">Date de naissance</label>
                                    <input required type="date" name="naissances" id="naissances" class="form-control" value="{{ old('naissances') }}">
                                    @error('naissances')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Employment Details -->
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="position">Poste</label>
                                    <input required type="text" name="poste" id="poste" class="form-control" value="{{ old('position') }}">
                                    @error('position')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="type_de_contrat">Type de contrat</label>
                                    <input required type="text" name="type_de_contrat" id="type_de_contrat" class="form-control" value="{{ old('type_de_contrat') }}">
                                    @error('type_de_contrat')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="taxe">Taxe (%)</label>
                                    <input required type="number" step="0.01" name="taxe" id="taxe" class="form-control" value="{{ old('taxe') }}">
                                    @error('taxe')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="is_active">Statut</label>
                                    <select name="is_active" id="is_active" class="form-select form-control" required>
                                        <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Actif</option>
                                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactif</option>
                                    </select>
                                    @error('is_active')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Additional Details -->
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="hire_date">Date d'embauche</label>
                                    <input required type="date" name="date_de_prise_de_service" id="date_de_prise_de_service" class="form-control" value="{{ old('hire_date') }}">
                                    @error('date_de_prise_de_service')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="date_de_fin_de_contrat">Date de fin de contrat</label>
                                    <input type="date" name="date_de_fin_de_contrat" id="date_de_fin_de_contrat" class="form-control" value="{{ old('date_de_fin_de_contrat') }}">
                                    @error('date_de_fin_de_contrat')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nombre_heure_par_semaine">Nombre d'heures par semaine</label>
                                    <input required type="number" name="nombre_heure_par_semaine" id="nombre_heure_par_semaine" class="form-control" value="{{ old('nombre_heure_par_semaine') }}">
                                    @error('nombre_heure_par_semaine')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bank_account">Compte bancaire</label>
                                    <input required type="text" name="bank_account" id="bank_account" class="form-control" value="{{ old('bank_account') }}">
                                    @error('bank_account')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <button type="submit" id="employee-submit-button" class="btn btn-primary mt-3">Ajouter</button>
                            </div>
                        </div>
                    </form>
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
                                <th>Actions</th>
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
                                    <td>
                                        <!-- Bootstrap Dropdown -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu">
                                                <!-- Edit Option -->
                                                <a class="dropdown-item edit-btn" href="#" data-id="{{ $employee->id }}" title="Éditer">
                                                    <i class="fas fa-edit"></i> Éditer
                                                </a>
                                                <!-- Delete Option -->
                                                <a class="dropdown-item delete-btn" href="#" data-id="{{ $employee->id }}" title="Supprimer">
                                                    <i class="fas fa-trash-alt"></i> Supprimer
                                                </a>
                                                <!-- Pay Slip Option -->
                                                <a class="dropdown-item" href="#" title="Payer">
                                                    <i class="fas fa-money-bill-wave"></i> Payer
                                                </a>
                                            </div>
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
</div>

<script>
    $(document).ready(function() {


     $('[data-toggle="tooltip"]').tooltip();

        // Click event for Edit button


        $('#employee-submit-button').click(function(e) {
            e.preventDefault(); // Prevent default button action

            var form = $('#employee-form');
            var url = form.attr('action');
            var isValid = true;

            // Clear previous error messages
            $('.text-danger').remove();

            // Validate required fields
            var requiredFields = [
                '#full_name',
                '#employee_id',
                '#naissances', // Date of birth
                '#poste', // Position
                '#is_active', // Employment status (active/inactive)
                '#type_de_contrat', // Type of contract (e.g., permanent, temporary)
                '#salaire_brut', // Gross salary
                '#taxe', // Tax rate
                '#date_de_prise_de_service', // Hire date
                '#date_de_fin_de_contrat', // End date of the contract (nullable)
                '#nombre_heure_par_semaine', // Number of hours per week
                '#bank_account',
            ];

            requiredFields.forEach(function(field) {
                if ($(field).val() === '') {
                    $(field).after('<small class="text-danger">Ce champ est requis.</small>');
                    isValid = false; // Mark as invalid if any field is empty
                }
            });

            if (!isValid) {
                return; // Stop if validation fails
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    // Clear previous messages
                    $('#message').remove();


                    if (response.success) {
                        $.notify({
                            icon: 'flaticon-alarm-1',
                            title: 'Succès',
                            message: response.success,
                        },{
                            type: 'info',
                            placement: {
                                from: "bottom",
                                align: "right"
                            },
                            time: 1000,
                        });
                        form[0].reset(); // Reset form
                        loadEmployeeList(); // Reload employee list
                    } else if (response.error) {
                        $.notify({
                            icon: 'flaticon-alarm-1',
                            title: 'Erreur',
                            message: response.error,
                        },{
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
                    console.log(xhr)
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Erreur',
                        message: "Une erreur est survenue. "+ xhr +" Veuillez réessayer.",
                    },{
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

        function loadEmployeeList() {
            // Assuming there's a route to get the updated employee list
            $.ajax({
                url: "{{ route('employees.index') }}",
                type: 'GET',
                success: function(response) {
                    $('#dashboard-content').html(response);
                },
                error: function() {
                    alert('Erreur lors du chargement de la liste des employés.');
                }
            });
        }

        // Edit button click event
        $('.edit-btn').click(function() {
            var employeeId = $(this).data('id');
            $.ajax({
                url: "/employees/" + employeeId + "/edit",
                method: "GET",
                success: function(response) {

                    console.log(response.data)
                    // Populate fields with employee data using variable names from the Blade template
                    $('#employee-form #full_name').val(response.data.full_name); // full_name
                    $('#employee-form #employee_id').val(response.data.employee_id); // employee_id
                    $('#employee-form #poste').val(response.data.poste); // position (poste)
                    $('#employee-form #salaire_brut').val(response.data.salaire_brut); // gross_salary (salaire_brut)
                    $('#employee-form #date_de_prise_de_service').val(response.data.date_de_prise_de_service); // hire_date (date_de_prise_de_service)
                    $('#employee-form #bank_account').val(response.data.bank_account); // bank_account

                    // Populate additional fields
                    $('#employee-form #naissances').val(response.data.naissances); // Make sure you have this field in your form
                    $('#employee-form #type_de_contrat').val(response.data.type_de_contrat); // Ensure this field exists
                    $('#employee-form #taxe').val(response.data.taxe); // Ensure this field exists
                    $('#employee-form #date_de_fin_de_contrat').val(response.data.date_de_fin_de_contrat); // Make sure this field exists
                    $('#employee-form #nombre_heure_par_semaine').val(response.data.nombre_heure_par_semaine); // Ensure this field exists

                    // Handle the is_active field (radio or select)
                    $('#employee-form #is_active').prop('checked', response.data.is_active === 1); // Assuming is_active is a boolean (1 or 0)

                    // Update the form action and method for PUT request
                    $('#employee-form').attr('action', '/employees/' + employeeId + '/update');
                    if (!$('#employee-form input[name="_method"]').length) {
                        $('#employee-form').append('<input type="hidden" name="_method" value="PUT">');
                    }
                    $('#employee-submit-button').text('Mettre à jour');
                    $('html, body').animate({
                        scrollTop: $("#employee-form").offset().top
                    }, 1000);
                },
                error: function() {
                    alert('Erreur lors du chargement des informations de l\'employé.');
                }
            });
        });


        // Delete button click event
        $('.delete-btn').click(function() {
            if (confirm('Êtes-vous sûr de vouloir supprimer cet employé?')) {
                var employeeId = $(this).data('id');
                $.ajax({
                    url: "/employees/" + employeeId + "/delete",
                    method: "DELETE",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert('Employé supprimé avec succès.');
                        loadEmployeeList();
                    },
                    error: function() {
                        alert('Erreur lors de la suppression de l\'employé.');
                    }
                });
            }
        });
    });



</script>
@endsection
