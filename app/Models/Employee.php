<?php

// app/Models/Employee.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'employee_id',
        'naissances', // Date of birth
        'poste', // Position
        'is_active', // Employment status (active/inactive)
        'type_de_contrat', // Type of contract (e.g., permanent, temporary)
        'salaire_brut', // Gross salary
        'taxe', // Tax rate
        'date_de_prise_de_service', // Hire date
        'date_de_fin_de_contrat', // End date of the contract (nullable)
        'nombre_heure_par_semaine', // Number of hours per week
        'bank_account',




        // $table->string('full_name');
        // $table->date('naissances');
        // $table->string('poste');
        // $table->boolean('is_active');
        // $table->string('type_de_contrat');
        // $table->decimal('salaire_brut', 10, 2);
        // $table->decimal('taxe', 5, 2);
        // $table->date('date_de_prise_de_service');
        // $table->date('date_de_fin_de_contrat')->nullable();
        // $table->integer('nombre_heure_par_semaine');
    ];


    public function paySlips()
    {
        return $this->hasMany(PaySlip::class);
    }
}
