<?php

namespace App\Http\Controllers;

use App\Models\Biodata\PhysicalApp;
use App\Models\Biodata\SelfApp;
use Illuminate\Http\Request;
use App\Models\Profile;


class BiodataController extends Controller
{
    
    public function index()
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        $selfApp = SelfApp::where('user_id', auth()->id())->first();
        $physicalApp = PhysicalApp::where('user_id', auth()->id())->first();       
        return view('user.biodata', compact('profile', 'selfApp', 'physicalApp'));
    }
    public function storeProfile(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'fullname' => 'required|string|max:50',
            'phone_number' => 'required|string|max:15',
            'place_date' => 'required|string|max:30',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:15',
            'job' => 'required|string|max:30',
            'salary' => 'required|numeric',
            'married_status' => 'required|string|max:30',
            'ethnic' => 'required|string|max:30',
        ], [
            'image.required' => 'Silahkan masukkan foto terlebih dahulu',
            'image.mimes' => 'Foto harus berekstensi JPEG/JPG/PNG/GIF',
            'image.max' => 'Foto maksimal berukuran 2MB',
            'fullname.required' => 'Silahkan Masukkan Nama Anda',
            'fullname.max' => 'Nama Maksimal diisi 50 karakter',
            'phone_number.required' => 'Silahkan Masukkan Nomor Telepon Anda',
            'phone_number.max' => 'Nomor Telepon Maksimal diisi 15 karakter',
            'place_date.required' => 'Silahkan Masukkan Tempat dan Tanggal Lahir',
            'place_date.max' => 'Tempat dan Tanggal Lahir Maksimal diisi 30 karakter',
            'birth_date.required' => 'Silahkan Masukkan Tanggal Lahir Anda',
            'birth_date.date' => 'Tanggal Lahir harus berformat tanggal yang valid',
            'gender.required' => 'Silahkan Masukkan Jenis Kelamin Anda',
            'gender.max' => 'Jenis Kelamin Maksimal diisi 15 karakter',
            'job.required' => 'Silahkan Masukkan Pekerjaan Anda',
            'job.max' => 'Pekerjaan Maksimal diisi 30 karakter',
            'salary.required' => 'Silahkan Masukkan Gaji Anda',
            'salary.numeric' => 'Gaji harus berupa angka',
            'married_status.required' => 'Silahkan Masukkan Status Pernikahan Anda',
            'married_status.max' => 'Status Pernikahan Maksimal diisi 30 karakter',
            'ethnic.required' => 'Silahkan Masukkan Etnis Anda',
            'ethnic.max' => 'Etnis Maksimal diisi 30 karakter',
        ]);

        $data = [
            'user_id' => auth()->user()->id,
            'fullname' => $request->input('fullname'),
            'phone_number' => $request->input('phone_number'),
            'place_date' => $request->input('place_date'),
            'birth_date' => $request->input('birth_date'),
            'gender' => $request->input('gender'),
            'job' => $request->input('job'),
            'salary' => $request->input('salary'),
            'married_status' => $request->input('married_status'),
            'ethnic' => $request->input('ethnic'),
        ];

        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $image_extension = $image_file->extension();
            $image_name = date('ymdhis').".".$image_extension;
            $image_file->move(public_path('image'), $image_name);
            $data['image'] = $image_name;
        } else {
            return back()->withErrors(['image' => 'Image upload failed.']);
        }

        $profile = Profile::where('user_id', auth()->id())->first();
        if ($profile) {
            $profile->update($data);
            return redirect()->route('biodata')->with('success', 'Profil berhasil diperbarui!');
        } else {
            Profile::create($data);
            return redirect()->route('biodata')->with('success', 'Profil berhasil disimpan!');
        }
    }
    
    public function editProfile(string $id)
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        return view('user.profil.edit', compact('profile'));
    }

    public function updateProfile(Request $request)
    {

        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'fullname' => 'required|string|max:50',
            'phone_number' => 'required|string|max:15',
            'place_date' => 'required|string|max:30',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:15',
            'job' => 'required|string|max:30',
            'salary' => 'required|numeric',
            'married_status' => 'required|string|max:30',
            'ethnic' => 'required|string|max:30',
        ]);

        $profile = Profile::where('user_id', auth()->id())->first();

        $data = [
            'fullname' => $request->input('fullname'),
            'phone_number' => $request->input('phone_number'),
            'place_date' => $request->input('place_date'),
            'birth_date' => $request->input('birth_date'),
            'gender' => $request->input('gender'),
            'job' => $request->input('job'),
            'salary' => $request->input('salary'),
            'married_status' => $request->input('married_status'),
            'ethnic' => $request->input('ethnic'),
        ];
        
        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $image_extension = $image_file->extension();
            $image_name = date('ymdhis').".".$image_extension;
            $image_file->move(public_path('image'), $image_name);
            $data['image'] = $image_name;
        }
        $profile->update($data);


        return redirect()->route('biodata')->with('success', 'Profil berhasil diperbarui!');
    }


    // Gambaran Diri Controller
    public function indexSelfApp(){
        $selfApp = SelfApp::where('user_id', auth()->id())->first();
        if (!$selfApp) {
            $selfApp = new SelfApp(); // Membuat objek baru jika data tidak ditemukan
        }
        return view('user.biodata', compact('selfApp'));
    }

    public function storeSelfApp(Request $request){
        $request->validate([
            'motto' => 'required|string|max:255',
            'lifegoals' => 'required|string|max:255',
            'hobbies' => 'required|string|max:255',
            'favThings' => 'required|string|max:255',
            'positiveTraits' => 'required|string|max:100',
            'negativeTraits' => 'required|string|max:100',
            'taarufReason' => 'required|string|max:255',
        ], [
            'motto.required' => 'Motto harus diisi.',
            'lifegoals.required' => 'Tujuan hidup harus diisi.',
            'hobbies.required' => 'Hobi harus diisi.',
            'favThings.required' => 'Cita-cita harus diisi.',
            'positiveTraits.required' => 'Ciri positif harus diisi.',
            'negativeTraits.required' => 'Ciri negatif harus diisi.',
            'taarufReason.required' => 'Alasan harus diisi.',
        ]);

        $data = [
            'user_id' => auth()->user()->id,
            'motto' => $request->input('motto'),
            'lifegoals' => $request->input('lifegoals'),
            'hobbies' => $request->input('hobbies'),
            'favThings' => $request->input('favThings'),
            'positiveTraits' => $request->input('positiveTraits'),
            'negativeTraits' => $request->input('negativeTraits'),
            'taarufReason' => $request->input('taarufReason'),
        ];

        $selfApp = SelfApp::where('user_id', auth()->id())->first();
        if ($selfApp) {
            $selfApp->update($data);
            return redirect()->route('biodata')->with('success', 'Gambaran diri berhasil diperbarui!');
        } else {
            SelfApp::create($data);
            return redirect()->route('biodata')->with('success', 'Gambaran diri berhasil disimpan!');
        }
    }

    public function updateSelfApp(Request $request)
    {

        $request->validate([
            'motto' => 'required|string|max:255|min:10',
            'lifegoals' => 'required|string|max:255|min:10',
            'hobbies' => 'required|string|max:255|min:10',
            'favThings' => 'required|string|max:255|min:10',
            'positiveTraits' => 'required|string|max:100|min:5',
            'negativeTraits' => 'required|string|max:100|min:5',
            'taarufReason' => 'required|string|max:255|min:15',
        ]);

        $selfApp = SelfApp::where('user_id', auth()->id())->first();

        $data = [
            'user_id' => auth()->user()->id,
            'motto' => $request->input('motto'),
            'lifegoals' => $request->input('lifegoals'),
            'hobbies' => $request->input('hobbies'),
            'favThings' => $request->input('favThings'),
            'positiveTraits' => $request->input('positiveTraits'),
            'negativeTraits' => $request->input('negativeTraits'),
            'taarufReason' => $request->input('taarufReason'),
        ];
        
        $selfApp->update($data);

        return redirect()->route('biodata')->with('success', 'Gambaran diri berhasil diperbarui!');
    }

    // Gambaran Fisik Controller

    public function indexPhysicalApp(){
        $physicalApp = PhysicalApp::where('user_id', auth()->id())->first();
        if (!$physicalApp) {
            $selfApp = new PhysicalApp(); // Membuat objek baru jika data tidak ditemukan
        }
        return view('user.biodata', compact('physicalApp'));
    }

    public function storePhysicalApp(Request $request){
        $request->validate([
            'skincolor' => 'required|string|max:50',
            'haircolor' => 'required|string|max:30',
            'hairtype' => 'required|string|max:30',
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'illness' => 'nullable|string|max:255',
            'uniqueTraits' => 'nullable|string|max:255',
            'disability' => 'nullable|string|max:255',
        ], [
            'skincolor.required' => 'Warna kulit harus diisi.',
            'haircolor.required' => 'Warna rambut harus diisi.',
            'hairtype.required' => 'Tipe rambut harus diisi.',
            'height.required' => 'Tinggi harus diisi.',
            'weight.required' => 'Berat harus diisi.',
        ]);

        $data = [
            'user_id' => auth()->user()->id,
            'skincolor' => $request->input('skincolor'),
            'haircolor' => $request->input('haircolor'),
            'hairtype' => $request->input('hairtype'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'illness' => $request->input('illness'),
            'uniqueTraits' => $request->input('uniqueTraits'),
            'disability' => $request->input('disability'),
        ];

        $physicalApp = PhysicalApp::where('user_id', auth()->id())->first();
        if ($physicalApp) {
            $physicalApp->update($data);
            return redirect()->route('biodata')->with('success', 'Gambaran fisik berhasil diperbarui!');
        } else {
            PhysicalApp::create($data);
            return redirect()->route('biodata')->with('success', 'Gambaran fisik berhasil disimpan!');
        }
    
    }
    public function updatePhysicalApp(Request $request)
    {

        $request->validate([
            'skincolor' => 'required|string|max:50',
            'haircolor' => 'required|string|max:30',
            'hairtype' => 'required|string|max:30',
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'illness' => 'nullable|string|max:255',
            'uniqueTraits' => 'nullable|string|max:255',
            'disability' => 'nullable|string|max:255',
        ]);

        $physicalApp = PhysicalApp::where('user_id', auth()->id())->first();

        $data = [
            'user_id' => auth()->user()->id,
            'skincolor' => $request->input('skincolor'),
            'haircolor' => $request->input('haircolor'),
            'hairtype' => $request->input('hairtype'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'illness' => $request->input('illness'),
            'uniqueTraits' => $request->input('uniqueTraits'),
            'disability' => $request->input('disability'),
        ];
        
        $physicalApp->update($data);

        return redirect()->route('biodata')->with('success', 'Gambaran fisik berhasil diperbarui!');
    }
    
}
