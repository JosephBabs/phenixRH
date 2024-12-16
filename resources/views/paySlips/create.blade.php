
<div class="container">
    <h2>Créer un Paiement de Salaire</h2>

    <form method="POST" action="{{ route('payments.store') }}">
        @csrf

        <div class="mb-3">
            <label for="employee_id" class="form-label">Employé</label>
            <select name="employee_id" id="employee_id" class="form-select" required>
                <option value="">Sélectionner un Employé</option>
                @foreach($employees as $employee )
                    <option value="{{ $employee ->id }}">{{ $employee ->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="gross_salary" class="form-label">Salaire Brut</label>
            <input type="number" class="form-control" id="gross_salary" name="gross_salary" required>
        </div>

        <div class="mb-3">
            <label for="payment_date" class="form-label">Date de Paiement</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer le Paiement</button>
    </form>
</div>
