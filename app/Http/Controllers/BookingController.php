<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $kamars = Kamar::where('status', 'Tersedia')->orderBy('nama')->get();

        return view('public.booking', ['kamars' => $kamars, 'selectedKamar' => $request->integer('kamar_id')]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kamar_id' => 'required|exists:kamars,id',
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'tanggal_masuk' => 'required|date|after_or_equal:today',
            'durasi_bulan' => 'required|integer|min:1|max:24',
            'catatan' => 'nullable|string|max:1000',
        ]);

        $kamar = Kamar::whereKey($data['kamar_id'])->where('status', 'Tersedia')->first();
        if (!$kamar) {
            return back()->withErrors(['kamar_id' => 'Kamar sudah tidak tersedia.'])->withInput();
        }

        $booking = DB::transaction(fn () => Booking::create($data));

        return redirect()->route('booking.status', ['kode' => $booking->kode, 'no_hp' => $booking->no_hp])->with('success', 'Booking berhasil dikirim. Simpan kode booking Anda.');
    }

    public function statusForm(Request $request)
    {
        $booking = null;
        if ($request->filled(['kode', 'no_hp'])) {
            $booking = Booking::with('kamar')->where('kode', $request->kode)->where('no_hp', $request->no_hp)->first();
        }

        return view('public.booking-status', compact('booking'));
    }

    public function status(Request $request)
    {
        $data = $request->validate(['kode' => 'required|string', 'no_hp' => 'required|string|max:20']);
        $booking = Booking::with('kamar')->where('kode', $data['kode'])->where('no_hp', $data['no_hp'])->first();

        return view('public.booking-status', compact('booking'))->withErrors($booking ? [] : ['kode' => 'Kode booking atau nomor HP tidak ditemukan.']);
    }

    public function index(Request $request)
    {
        $bookings = Booking::with('kamar')
            ->when($request->filled('kode'), fn ($query) => $query->where('kode', 'like', '%' . $request->kode . '%'))
            ->when($request->filled('no_hp'), fn ($query) => $query->where('no_hp', 'like', '%' . $request->no_hp . '%'))
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->status))
            ->latest()
            ->get();

        return view('admin.booking.index', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $data = $request->validate(['status' => 'required|in:Menunggu,Dikonfirmasi,Ditolak,Selesai', 'alasan_penolakan' => 'nullable|string|max:1000']);
        $booking->update($data);
        $booking = $booking->fresh('kamar');
        $whatsappSent = $this->sendWhatsApp($booking);
        $dummyWhatsApp = config('services.whatsapp.dummy');

        return back()
            ->with('success', $dummyWhatsApp ? 'Status booking diperbarui. Simulasi WhatsApp berhasil dicatat di log.' : ($whatsappSent ? 'Status booking diperbarui dan WhatsApp terkirim.' : 'Status booking diperbarui. WhatsApp belum dikirim karena API belum dikonfigurasi atau gagal.'))
            ->with('wa_url', $this->whatsappUrl($booking));
    }

    private function sendWhatsApp(Booking $booking): bool
    {
        if (config('services.whatsapp.dummy')) {
            Log::info('WhatsApp booking notification simulated', [
                'booking_id' => $booking->id,
                'to' => $booking->no_hp,
                'message' => $this->whatsappMessage($booking),
            ]);

            return true;
        }

        $token = config('services.whatsapp.token');
        $phoneNumberId = config('services.whatsapp.phone_number_id');

        if (!$token || !$phoneNumberId) {
            return false;
        }

        $phone = preg_replace('/\D+/', '', $booking->no_hp);
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }

        $response = Http::withToken($token)
            ->timeout(15)
            ->post("https://graph.facebook.com/v22.0/{$phoneNumberId}/messages", [
                'messaging_product' => 'whatsapp',
                'to' => $phone,
                'type' => 'template',
                'template' => [
                    'name' => config('services.whatsapp.template_name'),
                    'language' => ['code' => config('services.whatsapp.language')],
                    'components' => [[
                        'type' => 'body',
                        'parameters' => [
                            ['type' => 'text', 'text' => $booking->nama_lengkap],
                            ['type' => 'text', 'text' => $booking->kode],
                            ['type' => 'text', 'text' => $booking->kamar->nama],
                            ['type' => 'text', 'text' => $booking->status],
                        ],
                    ]],
                ],
            ]);

        if ($response->successful()) {
            return true;
        }

        Log::error('WhatsApp booking notification failed', ['booking_id' => $booking->id, 'status' => $response->status()]);

        return false;
    }

    private function whatsappUrl(Booking $booking): string
    {
        return 'https://wa.me/' . preg_replace('/\D+/', '', $booking->no_hp) . '?text=' . urlencode($this->whatsappMessage($booking));
    }

    private function whatsappMessage(Booking $booking): string
    {
        $message = "Halo {$booking->nama_lengkap}, status booking {$booking->kode} untuk {$booking->kamar->nama} adalah {$booking->status}.";
        if ($booking->status === 'Ditolak' && $booking->alasan_penolakan) {
            $message .= " Alasan: {$booking->alasan_penolakan}.";
        }

        return $message;
    }
}
