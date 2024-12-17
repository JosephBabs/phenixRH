<div class="container">
    <h2>Paiements de Salaire</h2>

    <table class="table" id="paimentTable">
        <thead>
            <tr>
                <th>Numéro de Référence</th>
                <th>Employé</th>
                <th>Salaire Brut</th>
                <th>Salaire Net</th>
                <th>Date de Paiement</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->reference_number }}</td>
                    <td>{{ $payment->employee->name }}</td>
                    <td>${{ number_format($payment->gross_salary, 2) }}</td>
                    <td>${{ number_format($payment->net_salary, 2) }}</td>
                    <td>{{ $payment->payment_date->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info">Voir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $("#paimentTable").DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    lengthChange: true,
                    lengthMenu: [3, 5, 10, 25, 50, 100, 200],
                    responsive: true,
                    pageLength: 5,
                    buttons: true,
                    info: true,
                    language: {
                        search: "Rechercher:",
                        lengthMenu: "Afficher _MENU_ paiements par page",
                        info: "Affichage de _START_ à _END_ sur _TOTAL_ paiement(s)",
                        infoEmpty: "Aucun enregistrement disponible",
                        infoFiltered: "(filtré à partir de _MAX_ paiement(s) au total)",
                        paginate: {
                            first: "Premier",
                            last: "Dernier",
                            next: "Suivant",
                            previous: "Précédent"
                        },
                        emptyTable: "Aucune donnée disponible dans le tableau",
                        searchPlaceholder: 'Rechercher dans le tableau...', // Custom placeholder text
                        search: 'Rechercher:'
                    }
                });
    });
</script>
@endpush
