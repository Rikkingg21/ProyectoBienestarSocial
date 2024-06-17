<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\PersonalCit;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PersonalController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el año seleccionado o usar el año actual por defecto
        $year = $request->input('year', date('Y'));

        // Obtener los personales
        $personals = Personal::whereHas('personalCits', function($query) use ($year) {
            $query->whereYear('F_INICIO', $year)->orWhereYear('F_FIN', $year);
        })->get();

        // Calcular "Días Totales" para cada personal según el año seleccionado
        $personals->each(function ($personal) use ($year) {
            $personal->DIAS_TOTALES = $personal->personalCits->reduce(function ($carry, $cit) use ($year) {
                $start = Carbon::parse($cit->F_INICIO);
                $end = Carbon::parse($cit->F_FIN);

                // Ajustar fechas para calcular solo días dentro del año seleccionado
                $startOfYear = Carbon::create($year, 1, 1)->startOfDay();
                $endOfYear = Carbon::create($year, 12, 31)->endOfDay();

                // Ajustar las fechas para que estén dentro del año seleccionado
                if ($start->year < $year) {
                    $start = $startOfYear;
                }
                if ($end->year > $year) {
                    $end = $endOfYear;
                }

                // Calcular la diferencia de días en el periodo ajustado
                return $carry + $start->diffInDaysFiltered(function (Carbon $date) use ($year) {
                    return $date->year === $year;
                }, $end) + 1;
            }, 0);
        });

        // Obtener los personal_cits y calcular días del periodo
        $personalCits = PersonalCit::whereYear('F_INICIO', $year)
                                    ->orWhereYear('F_FIN', $year)
                                    ->get()
                                    ->map(function($cit) use ($year) {
                                        $start = Carbon::parse($cit->F_INICIO);
                                        $end = Carbon::parse($cit->F_FIN);

                                        // Ajustar fechas para días del periodo
                                        $startOfYear = Carbon::parse("$year-01-01");
                                        $endOfYear = Carbon::parse("$year-12-31");

                                        if ($start->year < $year) {
                                            $start = $startOfYear;
                                        }
                                        if ($end->year > $year) {
                                            $end = $endOfYear;
                                        }

                                        // Calcula la diferencia de días incluyendo el día final
                                        $cit->DIAS_TOTALES = ($cit->F_INICIO && $cit->F_FIN)
                                            ? $start->diffInDays($end) + 1
                                            : 0;

                                        // Convertir fechas a formato dd-mm-yyyy
                                        $cit->F_INICIO = Carbon::parse($cit->F_INICIO)->format('d-m-Y');
                                        $cit->F_FIN = Carbon::parse($cit->F_FIN)->format('d-m-Y');

                                        return $cit;
                                    });

        // Pasar datos a la vista
        return view('personals.index', compact('personals', 'personalCits', 'year'));
    }
}
