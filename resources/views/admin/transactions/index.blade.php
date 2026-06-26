@extends('admin.layouts.app')
@section('title', 'Transaksi')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-10 w-full flex-grow animate-slide-up">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white mb-2 tracking-tight">Riwayat Transaksi</h1>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Catatan otomatis setiap perubahan tier pengguna di platform ini.</p>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-800/80 backdrop-blur-md rounded-3xl p-6 border border-slate-100 dark:border-slate-700 shadow-sm">
            <div class="flex items-center gap-4 mb-3">
                <div class="p-3 bg-green-50 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-2xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide">Total Pendapatan</p>
                    <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800/80 backdrop-blur-md rounded-3xl p-6 border border-slate-100 dark:border-slate-700 shadow-sm">
            <div class="flex items-center gap-4 mb-3">
                <div class="p-3 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-2xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide">Total Upgrade</p>
                    <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">{{ number_format($totalUpgrades, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800/80 backdrop-blur-md rounded-3xl p-6 border border-slate-100 dark:border-slate-700 shadow-sm">
            <div class="flex items-center gap-4 mb-3">
                <div class="p-3 bg-orange-50 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400 rounded-2xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide">Total Downgrade</p>
                    <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">{{ number_format($totalDowngrades, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Table Card --}}
    <div class="bg-white dark:bg-slate-800/80 backdrop-blur-md rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">

        {{-- Filters --}}
        <form action="{{ route('admin.transactions') }}" method="GET"
              class="p-6 border-b border-slate-100 dark:border-slate-700/50 flex flex-col sm:flex-row gap-4">
            <div class="relative flex-1">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari nama atau email user..."
                       class="w-full pl-11 pr-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-blue-500 text-sm transition-all text-slate-800 dark:text-slate-200">
                <svg class="absolute left-4 top-3.5 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <select name="tier" onchange="this.form.submit()"
                    class="px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-blue-500 text-sm text-slate-600 dark:text-slate-300">
                <option value="">Semua Tier</option>
                <option value="pro"   {{ request('tier') == 'pro'   ? 'selected' : '' }}>Pro</option>
                <option value="elite" {{ request('tier') == 'elite' ? 'selected' : '' }}>Elite</option>
                <option value="lite"  {{ request('tier') == 'lite'  ? 'selected' : '' }}>Lite</option>
            </select>

            <select name="type" onchange="this.form.submit()"
                    class="px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 focus:outline-none focus:border-blue-500 text-sm text-slate-600 dark:text-slate-300">
                <option value="">Semua Tipe</option>
                <option value="upgrade"   {{ request('type') == 'upgrade'   ? 'selected' : '' }}>Upgrade</option>
                <option value="downgrade" {{ request('type') == 'downgrade' ? 'selected' : '' }}>Downgrade</option>
                <option value="manual"    {{ request('type') == 'manual'    ? 'selected' : '' }}>Manual</option>
            </select>

            @if(request()->hasAny(['search', 'tier', 'type']))
                <a href="{{ route('admin.transactions') }}"
                   class="flex items-center gap-2 px-4 py-3 rounded-2xl text-sm font-semibold text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors whitespace-nowrap">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    Reset
                </a>
            @endif
        </form>

        {{-- Table --}}
        <div class="overflow-x-auto p-2">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs font-bold text-slate-400 dark:text-slate-500 border-b border-slate-100 dark:border-slate-700 uppercase tracking-wider">
                        <th class="pb-4 pt-2 px-6">ID Transaksi</th>
                        <th class="pb-4 pt-2 px-4">Pengguna</th>
                        <th class="pb-4 pt-2 px-4">Perubahan Tier</th>
                        <th class="pb-4 pt-2 px-4">Tipe</th>
                        <th class="pb-4 pt-2 px-4">Nominal</th>
                        <th class="pb-4 pt-2 px-4">Status</th>
                        <th class="pb-4 pt-2 px-4">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $trx)
                    <tr class="border-b border-slate-50 dark:border-slate-700/50 hover:bg-slate-50 dark:hover:bg-slate-700/20 transition-colors">
                        {{-- ID --}}
                        <td class="py-4 px-6">
                            <span class="font-mono font-bold text-slate-800 dark:text-slate-200 text-sm">
                                #TRX-{{ str_pad($trx->id, 5, '0', STR_PAD_LEFT) }}
                            </span>
                        </td>

                        {{-- User Info --}}
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400 flex items-center justify-center font-bold text-xs shrink-0">
                                    {{ strtoupper(substr($trx->user->name ?? '?', 0, 2)) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-900 dark:text-white text-sm">{{ $trx->user->name ?? 'User Terhapus' }}</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">{{ $trx->user->email ?? '-' }}</p>
                                </div>
                            </div>
                        </td>

                        {{-- Tier Change --}}
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-2 text-sm">
                                <span class="px-2.5 py-1 rounded-lg text-xs font-bold uppercase
                                    {{ $trx->old_tier == 'lite' ? 'bg-slate-100 text-slate-500 dark:bg-slate-700 dark:text-slate-400'
                                    : ($trx->old_tier == 'pro'  ? 'bg-blue-100 text-blue-600 dark:bg-blue-900/40 dark:text-blue-400'
                                    : 'bg-amber-100 text-amber-600 dark:bg-amber-900/40 dark:text-amber-400') }}">
                                    {{ $trx->old_tier ?? 'baru' }}
                                </span>
                                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                <span class="px-2.5 py-1 rounded-lg text-xs font-bold uppercase
                                    {{ $trx->new_tier == 'lite'  ? 'bg-slate-100 text-slate-500 dark:bg-slate-700 dark:text-slate-400'
                                    : ($trx->new_tier == 'pro'   ? 'bg-blue-100 text-blue-600 dark:bg-blue-900/40 dark:text-blue-400'
                                    : 'bg-amber-100 text-amber-600 dark:bg-amber-900/40 dark:text-amber-400') }}">
                                    {{ $trx->new_tier }}
                                </span>
                            </div>
                        </td>

                        {{-- Type --}}
                        <td class="py-4 px-4">
                            @if($trx->type === 'upgrade')
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-xs font-bold rounded-lg">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                                    Upgrade
                                </span>
                            @elseif($trx->type === 'downgrade')
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400 text-xs font-bold rounded-lg">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                                    Downgrade
                                </span>
                            @else
                                <span class="px-2.5 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-400 text-xs font-bold rounded-lg">
                                    Manual
                                </span>
                            @endif
                        </td>

                        {{-- Amount --}}
                        <td class="py-4 px-4">
                            <span class="font-semibold text-slate-800 dark:text-slate-200 text-sm">
                                @if($trx->amount > 0)
                                    Rp {{ number_format($trx->amount, 0, ',', '.') }}
                                @else
                                    <span class="text-slate-400">—</span>
                                @endif
                            </span>
                        </td>

                        {{-- Status --}}
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-1 text-xs font-bold rounded-lg
                                {{ $trx->status === 'success' ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400'
                                : ($trx->status === 'pending'  ? 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400'
                                : 'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400') }}">
                                {{ ucfirst($trx->status) }}
                            </span>
                        </td>

                        {{-- Time --}}
                        <td class="py-4 px-4 text-sm text-slate-500 dark:text-slate-400 whitespace-nowrap">
                            {{ $trx->created_at->diffForHumans() }}
                            <p class="text-xs text-slate-400">{{ $trx->created_at->format('d M Y, H:i') }}</p>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-16 text-center">
                            <div class="flex flex-col items-center gap-3 text-slate-400 dark:text-slate-500">
                                <svg class="w-12 h-12 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                <p class="font-medium">Belum ada transaksi yang tercatat.</p>
                                <p class="text-sm">Transaksi akan muncul otomatis saat admin mengubah tier pengguna.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="p-6 border-t border-slate-100 dark:border-slate-700/50 flex flex-col sm:flex-row justify-between items-center gap-4 text-sm text-slate-500 dark:text-slate-400">
            @if($transactions->total() > 0)
                <span>Menampilkan {{ $transactions->firstItem() }}–{{ $transactions->lastItem() }} dari {{ $transactions->total() }} transaksi</span>
            @else
                <span>Tidak ada data</span>
            @endif

            @if($transactions->hasPages())
            <div class="flex gap-2">
                @if($transactions->onFirstPage())
                    <button disabled class="px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700 opacity-50 cursor-not-allowed">Kembali</button>
                @else
                    <a href="{{ $transactions->previousPageUrl() }}" class="px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700">Kembali</a>
                @endif

                @if($transactions->hasMorePages())
                    <a href="{{ $transactions->nextPageUrl() }}" class="px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700">Lanjut</a>
                @else
                    <button disabled class="px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700 opacity-50 cursor-not-allowed">Lanjut</button>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
