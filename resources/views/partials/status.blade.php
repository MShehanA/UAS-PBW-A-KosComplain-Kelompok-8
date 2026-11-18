@php($cls = ['Menunggu'=>'status-wait','Diproses'=>'status-process','Selesai'=>'status-done','Ditolak'=>'status-reject'][$status] ?? 'status-wait')
<span class="status-badge {{ $cls }}">{{ $status }}</span>
