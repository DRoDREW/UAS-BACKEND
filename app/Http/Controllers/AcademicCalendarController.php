<?php

namespace App\Http\Controllers;

use App\Models\AcademicCalendar;
use Illuminate\Http\Request;

class AcademicCalendarController extends Controller
{
    // Menampilkan semua kalender akademik
    public function index()
    {
        return response()->json(AcademicCalendar::all());
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        $calendar = AcademicCalendar::create($validated);

        return response()->json($calendar, 201);
    }

    // Menampilkan detail kalender akademik tertentu
    public function show($id)
    {
        $calendar = AcademicCalendar::findOrFail($id);
        return response()->json($calendar);
    }

    // Mengupdate data kalender
    public function update(Request $request, $id)
    {
        $calendar = AcademicCalendar::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        $calendar->update($validated);

        return response()->json($calendar);
    }

    // Menghapus data kalender
    public function destroy($id)
    {
        $calendar = AcademicCalendar::findOrFail($id);
        $calendar->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}

