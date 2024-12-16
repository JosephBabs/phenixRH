<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Employee::insert([
        [
            'full_name' => 'Joseph Babatounde',
            'employee_id' => 'ECG0021',
            'naissances' => '1990-01-01',
            'poste' => 'Developer',
            'is_active' => true,
            'type_de_contrat' => 'CDI',
            'salaire_brut' => 3000.00,
            'taxe' => 15.00,
            'date_de_prise_de_service' => '2023-01-01',
            'date_de_fin_de_contrat' => '2024-01-02',
            'nombre_heure_par_semaine' => 40,
            'bank_account' => 'BE72001234567890',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'full_name' => 'Amina N’doye',
            'employee_id' => 'ECG0022',
            'naissances' => '1988-05-12',
            'poste' => 'Product Manager',
            'is_active' => true,
            'type_de_contrat' => 'CDI',
            'salaire_brut' => 4500.00,
            'taxe' => 18.00,
            'date_de_prise_de_service' => '2022-11-01',
            'date_de_fin_de_contrat' => '2025-11-01',
            'nombre_heure_par_semaine' => 35,
            'bank_account' => 'FR761234567890123456789',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'full_name' => 'Emmanuel Kouassi',
            'employee_id' => 'ECG0023',
            'naissances' => '1992-07-15',
            'poste' => 'Designer',
            'is_active' => true,
            'type_de_contrat' => 'CDD',
            'salaire_brut' => 2700.00,
            'taxe' => 12.00,
            'date_de_prise_de_service' => '2023-04-10',
            'date_de_fin_de_contrat' => '2024-04-10',
            'nombre_heure_par_semaine' => 40,
            'bank_account' => 'GB29NWBK60161331926819',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'full_name' => 'Fatoumata Sow',
            'employee_id' => 'ECG0024',
            'naissances' => '1985-03-20',
            'poste' => 'HR Manager',
            'is_active' => true,
            'type_de_contrat' => 'CDI',
            'salaire_brut' => 5000.00,
            'taxe' => 20.00,
            'date_de_prise_de_service' => '2021-05-01',
            'date_de_fin_de_contrat' => '2024-05-01',
            'nombre_heure_par_semaine' => 40,
            'bank_account' => 'DE89370400440532013000',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'full_name' => 'Moussa Traoré',
            'employee_id' => 'ECG0025',
            'naissances' => '1991-09-01',
            'poste' => 'Marketing Specialist',
            'is_active' => true,
            'type_de_contrat' => 'CDD',
            'salaire_brut' => 3200.00,
            'taxe' => 16.00,
            'date_de_prise_de_service' => '2022-10-15',
            'date_de_fin_de_contrat' => '2024-10-15',
            'nombre_heure_par_semaine' => 40,
            'bank_account' => 'CH9300762011623852957',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'full_name' => 'Sarah Diop',
            'employee_id' => 'ECG0026',
            'naissances' => '1993-11-10',
            'poste' => 'Data Analyst',
            'is_active' => true,
            'type_de_contrat' => 'CDI',
            'salaire_brut' => 3500.00,
            'taxe' => 14.00,
            'date_de_prise_de_service' => '2023-02-01',
            'date_de_fin_de_contrat' => '2026-02-01',
            'nombre_heure_par_semaine' => 38,
            'bank_account' => 'BE68539007547034',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'full_name' => 'Paul Koffi',
            'employee_id' => 'ECG0027',
            'naissances' => '1987-12-25',
            'poste' => 'Operations Manager',
            'is_active' => true,
            'type_de_contrat' => 'CDI',
            'salaire_brut' => 6000.00,
            'taxe' => 25.00,
            'date_de_prise_de_service' => '2019-06-01',
            'date_de_fin_de_contrat' => '2024-06-01',
            'nombre_heure_par_semaine' => 40,
            'bank_account' => 'FR1420041010050500013M02606',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'full_name' => 'Adama Sylla',
            'employee_id' => 'ECG0028',
            'naissances' => '1995-02-22',
            'poste' => 'Support Engineer',
            'is_active' => true,
            'type_de_contrat' => 'CDD',
            'salaire_brut' => 2800.00,
            'taxe' => 13.00,
            'date_de_prise_de_service' => '2023-08-10',
            'date_de_fin_de_contrat' => '2024-08-10',
            'nombre_heure_par_semaine' => 40,
            'bank_account' => 'DE75512108001245126199',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'full_name' => 'Djeneba Koné',
            'employee_id' => 'ECG0029',
            'naissances' => '1994-06-30',
            'poste' => 'UI/UX Designer',
            'is_active' => true,
            'type_de_contrat' => 'CDI',
            'salaire_brut' => 3300.00,
            'taxe' => 15.00,
            'date_de_prise_de_service' => '2021-09-01',
            'date_de_fin_de_contrat' => '2024-09-01',
            'nombre_heure_par_semaine' => 37,
            'bank_account' => 'IT60X0542811101000000123456',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'full_name' => 'Thierno Diallo',
            'employee_id' => 'ECG0030',
            'naissances' => '1998-04-12',
            'poste' => 'Junior Developer',
            'is_active' => true,
            'type_de_contrat' => 'CDD',
            'salaire_brut' => 2500.00,
            'taxe' => 12.00,
            'date_de_prise_de_service' => '2023-07-01',
            'date_de_fin_de_contrat' => '2024-07-01',
            'nombre_heure_par_semaine' => 40,
            'bank_account' => 'NL91ABNA0417164300',
            'created_at' => now(),
            'updated_at' => now()
        ]
    ]);

}

}
