<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bmet;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BmetController extends Controller
{
    public function index()
    {
        $bmets = Bmet::paginate(10);

        return view('admin.bmet.index', compact('bmets'));
    }

    public function create()
    {
        return view('admin.bmet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'passport_no' => 'required',
            'clearance_id' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string|max:10',
            'blood_group' => 'nullable|string|max:5',
            'date_of_birth' => 'nullable|date',
            'nid' => 'nullable|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        try {
            // ================= PHOTO UPLOAD =================
            $photoName = null;
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time().'_photo.'.$photo->getClientOriginalExtension();
                $photo->storeAs('bmet', $photoName, 'public');
            }

            // ================= AUTOMATIC QR CODE GENERATION =================
            // ডোমেইন ইউআরএল + /ec-card/verify/{clearance_id}
            $qrUrl = url('/ec-card/verify/'.$request->clearance_id);
            $qrCodeName = time().'_qr_'.$request->clearance_id.'.svg';

            $qrCodeSvg = QrCode::size(300)
                ->format('svg')
                ->errorCorrection('H')
                ->generate($qrUrl);

            // public ডিস্কের bmet ফোল্ডারে SVG ফাইল সেভ করা
            Storage::disk('public')->put('bmet/'.$qrCodeName, $qrCodeSvg);

            Bmet::create([
                'name' => $request->name,
                'passport_no' => $request->passport_no,
                'ec_no' => $request->ec_no,
                'clearance_id' => $request->clearance_id,
                'ec_date' => $request->ec_date,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'date_of_birth' => $request->date_of_birth,
                'blood_group' => $request->blood_group,
                'passport_issue_date' => $request->passport_issue_date,
                'passport_expiry_date' => $request->passport_expiry_date,
                'visa_no' => $request->visa_no,
                'visa_issue_date' => $request->visa_issue_date,
                'visa_expiry_date' => $request->visa_expiry_date,
                'referral_name' => $request->referral_name,
                'employer' => $request->employer,
                'country' => $request->country,
                'office_name' => $request->office_name,
                'rl_no' => $request->rl_no,
                'phone' => $request->phone,
                'bmet_no' => $request->bmet_no,
                'gender' => $request->gender,
                'nid' => $request->nid,
                'village' => $request->village,
                'post_office' => $request->post_office,
                'police_station' => $request->police_station,
                'upazila' => $request->upazila,
                'district' => $request->district,
                'division' => $request->division,
                'photo' => $photoName,
                'qr_code' => $qrCodeName,
            ]);

            return redirect()->route('bmet.index')->with('success', 'BMET Data Added and QR Code Generated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function edit($id)
    {
        $bmet = Bmet::findOrFail($id);

        return view('admin.bmet.update', compact('bmet'));
    }

    public function update(Request $request, $id)
    {
        $bmet = Bmet::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'passport_no' => 'required',
            'clearance_id' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string|max:10',
            'blood_group' => 'nullable|string|max:5',
            'date_of_birth' => 'nullable|date',
            'nid' => 'nullable|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        try {
            // ================= PHOTO UPDATE & OLD DELETE =================
            if ($request->hasFile('photo')) {
                if ($bmet->photo && Storage::disk('public')->exists('bmet/'.$bmet->photo)) {
                    Storage::disk('public')->delete('bmet/'.$bmet->photo);
                }

                $photo = $request->file('photo');
                $photoName = time().'_photo.'.$photo->getClientOriginalExtension();
                $photo->storeAs('bmet', $photoName, 'public');
            } else {
                $photoName = $bmet->photo;
            }

            // ================= AUTOMATIC QR CODE UPDATE & OLD DELETE =================
            // আগের জেনারেট করা QR Code ফাইলটি স্টোরেজ থেকে ডিলিট করা
            if ($bmet->qr_code && Storage::disk('public')->exists('bmet/'.$bmet->qr_code)) {
                Storage::disk('public')->delete('bmet/'.$bmet->qr_code);
            }

            // নতুন করে নতুন ইউআরএল বা ক্লিয়ারেন্স আইডি দিয়ে তৈরি করা
            $qrUrl = url('/ec-card/verify/'.$request->clearance_id);
            $qrCodeName = time().'_qr_'.$request->clearance_id.'.svg';

            $qrCodeSvg = QrCode::size(300)
                ->format('svg')
                ->errorCorrection('H')
                ->generate($qrUrl);

            // নতুন ফাইলটি স্টোরেজে রাইট করা
            Storage::disk('public')->put('bmet/'.$qrCodeName, $qrCodeSvg);

            $bmet->update([
                'name' => $request->name,
                'passport_no' => $request->passport_no,
                'ec_no' => $request->ec_no,
                'clearance_id' => $request->clearance_id,
                'ec_date' => $request->ec_date,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'date_of_birth' => $request->date_of_birth,
                'blood_group' => $request->blood_group,
                'passport_issue_date' => $request->passport_issue_date,
                'passport_expiry_date' => $request->passport_expiry_date,
                'visa_no' => $request->visa_no,
                'visa_issue_date' => $request->visa_issue_date,
                'visa_expiry_date' => $request->visa_expiry_date,
                'referral_name' => $request->referral_name,
                'employer' => $request->employer,
                'country' => $request->country,
                'office_name' => $request->office_name,
                'rl_no' => $request->rl_no,
                'phone' => $request->phone,
                'bmet_no' => $request->bmet_no,
                'gender' => $request->gender,
                'nid' => $request->nid,
                'village' => $request->village,
                'post_office' => $request->post_office,
                'police_station' => $request->police_station,
                'upazila' => $request->upazila,
                'district' => $request->district,
                'division' => $request->division,
                'photo' => $photoName,
                'qr_code' => $qrCodeName, // নতুন ফাইল নেম ডাটাবেজে আপডেট
            ]);

            return redirect()->route('bmet.index')->with('success', 'BMET Data and QR Code Updated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $bmet = Bmet::findOrFail($id);

            // স্টোরেজ থেকে ফাইল ডিলিট
            if ($bmet->photo && Storage::disk('public')->exists('bmet/'.$bmet->photo)) {
                Storage::disk('public')->delete('bmet/'.$bmet->photo);
            }

            if ($bmet->qr_code && Storage::disk('public')->exists('bmet/'.$bmet->qr_code)) {
                Storage::disk('public')->delete('bmet/'.$bmet->qr_code);
            }

            $bmet->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'BMET Data Deleted Successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something Went Wrong',
            ], 500);
        }
    }

    public function show($clearance_id)
    {
        $bmet = Bmet::where('clearance_id', $clearance_id)->firstOrFail();

        return view('admin.bmet.show', compact('bmet'));
    }


    public function card($clearance_id)
    {
        $bmet = Bmet::where('clearance_id', $clearance_id)->firstOrFail();

        $photoBase64 = null;
        $photoPath = public_path('storage/bmet/'.$bmet->photo);
        if ($bmet->photo && file_exists($photoPath)) {
            $photoType = pathinfo($photoPath, PATHINFO_EXTENSION);
            $photoData = file_get_contents($photoPath);
            $photoBase64 = 'data:image/'.$photoType.';base64,'.base64_encode($photoData);
        }

        $qrBase64 = null;
        $qrPath = public_path('storage/bmet/'.$bmet->qr_code);
        if ($bmet->qr_code && file_exists($qrPath)) {
            $qrData = file_get_contents($qrPath);
            // SVG এর জন্য image/svg+xml ব্যবহার করা হয়েছে
            $qrBase64 = 'data:image/svg+xml;base64,'.base64_encode($qrData);
        }

        $pdf = Pdf::loadView('admin.bmet.card', compact('bmet', 'photoBase64', 'qrBase64'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('BMET_EC_Card_For'.' '.$bmet->name.' '.$bmet->clearance_id.'.pdf');
    }


    public function downloadCard($clearance_id)
    {
        $bmet = Bmet::where('clearance_id', $clearance_id)->firstOrFail();

        $photoBase64 = null;
        $photoPath = public_path('storage/bmet/'.$bmet->photo);
        if ($bmet->photo && file_exists($photoPath)) {
            $photoType = pathinfo($photoPath, PATHINFO_EXTENSION);
            $photoData = file_get_contents($photoPath);
            $photoBase64 = 'data:image/'.$photoType.';base64,'.base64_encode($photoData);
        }

        $qrBase64 = null;
        $qrPath = public_path('storage/bmet/'.$bmet->qr_code);
        if ($bmet->qr_code && file_exists($qrPath)) {
            $qrData = file_get_contents($qrPath);
            // SVG এর জন্য image/svg+xml ব্যবহার করা হয়েছে
            $qrBase64 = 'data:image/svg+xml;base64,'.base64_encode($qrData);
        }

        $pdf = Pdf::loadView('admin.bmet.card', compact('bmet', 'photoBase64', 'qrBase64'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('BMET_EC_Card_For'.' '.$bmet->name.' '.$bmet->clearance_id.'.pdf');
    }




}
