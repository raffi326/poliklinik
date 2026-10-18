<x-layouts.app title="Tambah Jadwal Periksa">

    {{-- Header --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('jadwal-periksa.index') }}" class="flex items-center justify-center w-9 h-9 rounded-lg 
                  bg-slate-100 hover:bg-slate-200 
                  text-slate-600 transition">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>

        <h2 class="text-2xl font-bold text-slate-800">
            Tambah Jadwal Periksa
        </h2>
    </div>

    {{-- Card Form --}}
    <div class="card bg-base-100 shadow-md rounded-2xl border border-slate-200">
        <div class="card-body p-8">

            <form action="{{ route('jadwal-periksa.store') }}" method="POST">
                @csrf

                {{-- Hari --}}
                <div class="form-control mb-6">
                    <label class="label">
                        <span class="label-text font-semibold text-slate-700 text-sm">
                            Hari <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <select name="hari" class="select select-bordered border-2 rounded-lg p-2 w-full
                                   focus:ring-2 focus:ring-primary
                                   @error('hari') select-error @enderror" required>
                        <option value="">Pilih Hari</option>
                        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                        <option value="{{ $hari }}" {{ old('hari')==$hari ? 'selected' : '' }}>
                            {{ $hari }}
                        </option>
                        @endforeach
                    </select>
                    @error('hari')
                    <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Grid Jam --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                    {{-- Jam Mulai --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold text-slate-700 text-sm">
                                Jam Mulai <span class="text-red-500">*</span>
                            </span>
                        </label>
                        <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" class="input input-bordered border-2 rounded-lg p-2 w-full 
                                      focus:ring-2 focus:ring-primary
                                      @error('jam_mulai') input-error @enderror" required>
                        @error('jam_mulai')
                        <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Jam Selesai --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold text-slate-700 text-sm">
                                Jam Selesai <span class="text-red-500">*</span>
                            </span>
                        </label>
                        <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" class="input input-bordered border-2 rounded-lg p-2 w-full
                                      focus:ring-2 focus:ring-primary
                                      @error('jam_selesai') input-error @enderror" required>
                        @error('jam_selesai')
                        <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                {{-- Buttons --}}
                <div class="flex items-center gap-3">
                    <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5
                               bg-primary hover:bg-primary/90
                               text-white border-2 rounded-lg p-2 font-semibold text-sm transition">
                        <i class="fas fa-save text-sm"></i>
                        Simpan
                    </button>

                    <a href="{{ route('jadwal-periksa.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5
                              bg-slate-100 hover:bg-slate-200
                              text-slate-600 rounded-xl font-semibold text-sm transition">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>

</x-layouts.app>
