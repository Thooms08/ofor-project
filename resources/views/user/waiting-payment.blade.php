<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesaikan Pembayaran | OFOR.SITE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/jpeg" href="{{ asset('logo-ofor.jpg') }}">
<link rel="apple-touch-icon" href="{{ asset('logo-ofor.jpg') }}">
    <style>
        .bg-purple-primary { background-color: #7e22ce; }
        .text-purple-primary { color: #7e22ce; }
    </style>
</head>
<body class="bg-[#f3e8ff] min-h-screen flex items-center justify-center p-4 font-sans">
    
    <div class="max-w-md w-full bg-white rounded-[2rem] shadow-2xl p-8 text-center border border-purple-100">
        
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Selesaikan Pembayaran</h2>
            <p class="text-slate-500 text-sm mt-1">Pembayaran Akses OFFOR.SITE</p>
        </div>

        <div class="bg-slate-50 p-6 rounded-3xl border-2 border-dashed border-purple-200 mb-6 w-full">
            @if(isset($payment['qr_image']))
                <img src="{{ $payment['qr_image'] }}" alt="QRIS" class="w-64 h-64 mx-auto rounded-xl shadow-sm mb-2">
                <p class="text-xs text-slate-400 font-medium">Scan QR Code menggunakan M-Banking / e-Wallet (OVO, Gopay, Dana, dll)</p>
            @endif
        </div>

        <div class="space-y-3 mb-6">
            <div class="flex items-center justify-center gap-2 text-purple-primary font-bold">
                <div class="w-2 h-2 bg-purple-600 rounded-full animate-ping"></div>
                <span class="text-sm tracking-widest uppercase">Menunggu Pembayaran...</span>
            </div>
            
            <div class="bg-[#f3e8ff] py-3 px-4 rounded-xl flex justify-between items-center border border-purple-100">
                <span class="text-sm text-purple-800 font-medium">Total Tagihan:</span>
                <span class="font-black text-xl text-purple-primary">Rp 15.000</span>
            </div>
        </div>

        <div class="py-4 border-t border-slate-100">
            <p class="text-xs text-slate-400 mb-1">Nomor Invoice:</p>
            <p class="font-mono text-sm font-bold text-slate-700">{{ $invoice }}</p>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Cek status setiap 3 detik
        let paymentCheck = setInterval(function() {
            fetch(`/api/check-payment-status/{{ $invoice }}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        clearInterval(paymentCheck); // Hentikan pengecekan
                        
                        Swal.fire({
                            title: 'Pembayaran Berhasil!',
                            text: 'Terima kasih, akses premium kamu sudah aktif.',
                            icon: 'success',
                            confirmButtonColor: '#7e22ce',
                            allowOutsideClick: false
                        }).then(() => {
                            // Lempar balik ke dashboard
                           window.location.href = "{{ route('user.dashboard') }}";
                        });
                    }
                })
                .catch(err => console.error("Polling error:", err));
        }, 3000); 
    </script>
</body>
</html>