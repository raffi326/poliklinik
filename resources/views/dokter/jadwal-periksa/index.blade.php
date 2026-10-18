<x-layouts.app title="Jadwal Periksa">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-slate-800">
            Jadwal Periksa
        </h2>

        <a href="{{ route('jadwal-periksa.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary hover:bg-primary/90 
                  text-white rounded-xl text-sm font-semibold transition">
            <i class="fas fa-plus text-sm"></i>
            Tambah Jadwal
        </a>
    </div>

    {{-- Card Table --}}
    <div class="card bg-base-100 shadow-md rounded-2 border">
        <div class="card-body p-0">

            <div class="overflow-x-auto">
                <table class="table w-full">

                    {{-- Table Head --}}
                    <thead class="bg-slate-100 text-slate-600 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Hari</th>
                            <th class="px-6 py-4">Jam Mulai</th>
                            <th class="px-6 py-4">Jam Selesai</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="text-sm text-slate-700">

                        @php
                        $now = \Carbon\Carbon::now();
                        $hariIni = $now->locale('id')->isoFormat('dddd');
                        $jamSekarang = $now->format('H:i:s');
                        @endphp

                        @forelse($jadwals as $jadwal)
                        @php
                        $aktif = $jadwal->hari === $hariIni
                        && $jamSekarang >= $jadwal->jam_mulai
                        && $jamSekarang <= $jadwal->jam_selesai;
                            @endphp
                            <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                                <td class="px-6 py-4 font-semibold text-slate-800">
                                    {{ $jadwal->hari }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                </td>

                                <td class="px-6 py-4">
                                    @if($aktif)
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                        Aktif
                                    </span>
                                    @else
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-500">
                                        Non Aktif
                                    </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="inline-flex items-center gap-2">

                                        {{-- Edit --}}
                                        <a href="{{ route('jadwal-periksa.edit', $jadwal->id) }}" class="inline-flex items-center gap-1 px-3 py-2 
                                        bg-amber-500 hover:bg-amber-600 
                                        text-white rounded-lg text-xs font-semibold transition">
                                            <i class="fas fa-pen-to-square text-xs"></i>
                                            Edit
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('jadwal-periksa.destroy', $jadwal->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus jadwal ini?')" class="inline-flex items-center gap-1 px-3 py-2 
                                             bg-red-500 hover:bg-red-600 
                                             text-white rounded-lg text-xs font-semibold transition">
                                                <i class="fas fa-trash text-xs"></i>
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-16 text-slate-400">
                                    <i class="fas fa-inbox text-3xl mb-3 block"></i>
                                    Belum ada jadwal periksa
                                </td>
                            </tr>
                            @endforelse

                    </tbody>

                </table>
            </div>

        </div>
    </div>

</x-layouts.app>
