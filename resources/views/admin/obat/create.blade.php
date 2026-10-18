<x-layouts.app title="Tambah Obat">

    {{-- Header --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('obat.index') }}" class="flex items-center justify-center w-9 h-9 rounded-lg 
                  bg-slate-100 hover:bg-slate-200 
                  text-slate-600 transition">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>

        <h2 class="text-2xl font-bold text-slate-800">
            Tambah Obat
        </h2>
    </div>

    {{-- Card Form --}}
    <div class="card bg-base-100 shadow-md rounded-2xl border border-slate-200">
        <div class="card-body p-8">

            <form action="{{ route('obat.store') }}" method="POST">
                @csrf

                {{-- Nama Obat --}}
                <div class="form-control mb-6">
                    <label class="label">
                        <span class="label-text font-semibold text-slate-700 text-sm">
                            Nama Obat <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <input type="text" name="nama_obat" value="{{ old('nama_obat') }}" placeholder="Masukkan nama obat..."
                        class="input input-bordered border-2 rounded-lg p-2 w-full 
                                      focus:outline-none focus:ring-2 focus:ring-primary
                                      @error('nama_obat') input-error @enderror" required>
                    @error('nama_obat')
                    <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Kemasan --}}
                <div class="form-control mb-6">
                    <label class="label">
                        <span class="label-text font-semibold text-slate-700 text-sm">
                            Kemasan <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <input type="text" name="kemasan" value="{{ old('kemasan') }}" placeholder="Contoh: Strip / Botol / Box"
                        class="input input-bordered border-2 rounded-lg p-2 w-full 
                                      focus:ring-2 focus:ring-primary
                                      @error('kemasan') input-error @enderror" required>
                    @error('kemasan')
                    <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="form-control mb-8">
                    <label class="label">
                        <span class="label-text font-semibold text-slate-700 text-sm">
                            Harga <span class="text-red-500">*</span>
                        </span>
                    </label>
                    <input type="number" name="harga" value="{{ old('harga') }}" placeholder="Masukkan harga..."
                        min="0" class="input input-bordered border-2 rounded-lg p-2 w-full
                                      focus:ring-2 focus:ring-primary
                                      @error('harga') input-error @enderror" required>
                    @error('harga')
                    <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="flex items-center gap-3">
                    <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5
                               bg-primary hover:bg-primary/90
                               text-white border-2 rounded-lg p-2 font-semibold text-sm transition">
                        <i class="fas fa-save text-sm"></i>
                        Simpan
                    </button>

                    <a href="{{ route('obat.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5
                              bg-slate-100 hover:bg-slate-200
                              text-slate-600 rounded-xl font-semibold text-sm transition">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>

</x-layouts.app>
