<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        $jadwals = JadwalPeriksa::where('id_dokter', Auth::id())->get();
        return view('dokter.jadwal-periksa.index', compact('jadwals'));
    }

    public function create()
    {
        return view('dokter.jadwal-periksa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $validated['id_dokter'] = Auth::id();

        JadwalPeriksa::create($validated);

        return redirect()->route('jadwal-periksa.index')
            ->with('success', 'Jadwal periksa berhasil ditambahkan');
    }

    public function edit(JadwalPeriksa $jadwalPeriksa)
    {
        return view('dokter.jadwal-periksa.edit', ['jadwal' => $jadwalPeriksa]);
    }

    public function update(Request $request, JadwalPeriksa $jadwalPeriksa)
    {
        $validated = $request->validate([
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $jadwalPeriksa->update($validated);

        return redirect()->route('jadwal-periksa.index')
            ->with('success', 'Jadwal periksa berhasil diubah');
    }

    public function destroy(JadwalPeriksa $jadwalPeriksa)
    {
        $jadwalPeriksa->delete();

        return redirect()->route('jadwal-periksa.index')
            ->with('success', 'Jadwal periksa berhasil dihapus');
    }
}
