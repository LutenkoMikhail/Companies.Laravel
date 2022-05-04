<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/companies', [\App\Http\Controllers\Api\V1\CompanyController::class, 'companies'])->name('api.v1.companies');
Route::get('/companies/{id}', [\App\Http\Controllers\Api\V1\CompanyController::class, 'company'])->name('api.v1.company');
Route::get('/companies/edrpou/{edrpou}', [\App\Http\Controllers\Api\V1\CompanyController::class, 'companySearchEdrpou'])->name('api.v1.company.edrpou');
Route::get('/companies/name/{name}', [\App\Http\Controllers\Api\V1\CompanyController::class, 'companySearchName'])->name('api.v1.company.name');

Route::fallback(function () {
    return response()->json(['Not Found'], 404);
});
