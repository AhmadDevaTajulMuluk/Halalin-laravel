<?php

namespace App\Http\Controllers;

use App\Models\Biodata\Educations;
use App\Models\Biodata\FamilyApp;
use App\Models\Biodata\PhysicalApp;
use App\Models\Biodata\Religion;
use App\Models\Biodata\SelfApp;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

class BiodataController extends Controller
{
    
    public function index()
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        $selfApp = SelfApp::where('user_id', auth()->id())->first();
        $physicalApp = PhysicalApp::where('user_id', auth()->id())->first();
        $familyApp = FamilyApp::where('user_id', auth()->id())->first(); 
        $education = Educations::where('user_id', auth()->id())->first(); 
        $religion = Religion::where('user_id', auth()->id())->first();     
        return view('user.biodata', compact('profile', 'selfApp', 'physicalApp', 'familyApp', 'education', 'religion'));
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
            DB::statement('CALL update_is_complete(?)', [auth()->user()->id]);
            return redirect()->route('biodata')->with('success', 'Profil berhasil diperbarui!');
        } else {
            Profile::create($data);
            DB::statement('CALL update_is_complete(?)', [auth()->user()->id]);
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
            DB::statement('CALL update_is_complete(?)', [auth()->user()->id]);
            return redirect()->route('biodata')->with('success', 'Gambaran diri berhasil diperbarui!');
        } else {
            SelfApp::create($data);
            DB::statement('CALL update_is_complete(?)', [auth()->user()->id]);
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
            $physicalApp = new PhysicalApp(); // Membuat objek baru jika data tidak ditemukan
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
            DB::statement('CALL update_is_complete(?)', [auth()->user()->id]);
            return redirect()->route('biodata')->with('success', 'Gambaran fisik berhasil diperbarui!');
        } else {
            PhysicalApp::create($data);
            DB::statement('CALL update_is_complete(?)', [auth()->user()->id]);
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

    public function indexFamilyApp(){
        $familyApp = FamilyApp::where('user_id', auth()->id())->first();
        if (!$familyApp) {
            $familyApp = new FamilyApp(); // Membuat objek baru jika data tidak ditemukan
        }
        return view('user.biodata', compact('familyApp'));
    }

    public function storeFamilyApp(Request $request){
        $request->validate([
            'fathers_name' => 'required|string|max:50',
            'fathers_job' => 'required|string|max:30',
            'mothers_name' => 'required|string|max:50',
            'mothers_job' => 'required|string|max:30',
            'old_siblings' => 'required|numeric|min:0',
            'young_siblings' => 'required|numeric|min:0',
            'backbone_family' => 'required|string|max:255',
        ], [
            'fathers_name.required' => 'Nama ayah harus diisi.',
            'fathers_job.required' => 'Pekerjaan ayah harus diisi.',
            'mothers_name.required' => 'Nama ibu harus diisi.',
            'mothers_job.required' => 'Pekerjaan ibu harus diisi.',
            'old_siblings.required' => 'Jumlah kakak harus diisi.',
            'young_siblings.required' => 'Jumlah adik harus diisi.',
        ]);

        $data = [
            'user_id' => auth()->user()->id,
            'fathers_name' => $request->input('fathers_name'),
            'fathers_job' => $request->input('fathers_job'),
            'mothers_name' => $request->input('mothers_name'),
            'mothers_job' => $request->input('mothers_job'),
            'old_siblings' => $request->input('old_siblings'),
            'young_siblings' => $request->input('young_siblings'),
            'backbone_family' => $request->input('backbone_family'),
        ];

        $familyApp = FamilyApp::where('user_id', auth()->id())->first();
        if ($familyApp) {
            $familyApp->update($data);
            DB::statement('CALL update_is_complete(?)', [auth()->user()->id]);
            return redirect()->route('biodata')->with('success', 'Gambaran keluarga berhasil diperbarui!');
        } else {
            FamilyApp::create($data);
            DB::statement('CALL update_is_complete(?)', [auth()->user()->id]);
            return redirect()->route('biodata')->with('success', 'Gambaran keluarga berhasil disimpan!');
        }
    }

    public function updateFamilyApp(Request $request)
    {
        $request->validate([
            'fathers_name' => 'required|string|max:50',
            'fathers_job' => 'required|string|max:30',
            'mothers_name' => 'required|string|max:50',
            'mothers_job' => 'required|string|max:30',
            'old_siblings' => 'required|numeric|min:0',
            'young_siblings' => 'required|numeric|min:0',
            'backbone_family' => 'required|string|max:255',
        ]);

        $familyApp = FamilyApp::where('user_id', auth()->id())->first();

        $data = [
            'user_id' => auth()->user()->id,
            'fathers_name' => $request->input('fathers_name'),
            'fathers_job' => $request->input('fathers_job'),
            'mothers_name' => $request->input('mothers_name'),
            'mothers_job' => $request->input('mothers_job'),
            'old_siblings' => $request->input('old_siblings'),
            'young_siblings' => $request->input('young_siblings'),
            'backbone_family' => $request->input('backbone_family'),
        ];
        
        $familyApp->update($data);

        return redirect()->route('biodata')->with('success', 'Gambaran fisik berhasil diperbarui!');
    }
    
    
    
    public function indexEducation(){
        $education = Educations::where('user_id', auth()->id())->first();
        if (!$education) {
            $education = new Educations(); // Membuat objek baru jika data tidak ditemukan
        }
        return view('user.biodata', compact('education'));
    }

    public function storeEducation(Request $request){
        $request->validate([
            'last_education' => 'required|string|max:50',
            'elementarySchool' => 'required|string|max:50',
            'juniorHighSchool' => 'nullable|string|max:50',
            'seniorHighSchool' => 'nullable|string|max:50',
            'collegeS1' => 'nullable|string|max:50',
            'majorS1' => 'nullable|string|max:50',
            'collegeS2' => 'nullable|string|max:50',
            'majorS2' => 'nullable|string|max:50',
            'collegeS3' => 'nullable|string|max:50',
            'majorS3' => 'nullable|string|max:50',
        ], [
            'elementarySchool.required' => 'Nama SD dasar harus diisi.',
        ]);

        $data = [
            'user_id' => auth()->user()->id,
            'last_education' => $request->input('last_education'),
            'elementarySchool' => $request->input('elementarySchool'),
            'juniorHighSchool' => $request->input('juniorHighSchool'),
            'seniorHighSchool' => $request->input('seniorHighSchool'),
            'collegeS1' => $request->input('collegeS1'),
            'majorS1' => $request->input('majorS1'),
            'collegeS2' => $request->input('collegeS2'),
            'majorS2' => $request->input('majorS2'),
            'collegeS3' => $request->input('collegeS3'),
            'majorS3' => $request->input('majorS3'),
        ];

        $education = Educations::where('user_id', auth()->id())->first();
        if ($education) {
            $education->update($data);
            DB::statement('CALL update_is_complete(?)', [auth()->user()->id]);
            return redirect()->route('biodata')->with('success', 'Data pendidikan berhasil diperbarui!');
        } else {
            Educations::create($data);
            DB::statement('CALL update_is_complete(?)', [auth()->user()->id]);
            return redirect()->route('biodata')->with('success', 'Data pendidikan keluarga berhasil disimpan!');
        }
    }

    public function updateEducation(Request $request)
    {
        $request->validate([
            'last_education' => 'required|string|max:50',
            'elementarySchool' => 'required|string|max:50',
            'juniorHighSchool' => 'nullable|string|max:50',
            'seniorHighSchool' => 'nullable|string|max:50',
            'collegeS1' => 'nullable|string|max:50',
            'majorS1' => 'nullable|string|max:50',
            'collegeS2' => 'nullable|string|max:50',
            'majorS2' => 'nullable|string|max:50',
            'collegeS3' => 'nullable|string|max:50',
            'majorS3' => 'nullable|string|max:50',
        ]);

        $education = Educations::where('user_id', auth()->id())->first();

        $data = [
            'user_id' => auth()->user()->id,
            'last_education' => $request->input('last_education'),
            'elementarySchool' => $request->input('elementarySchool'),
            'juniorHighSchool' => $request->input('juniorHighSchool'),
            'seniorHighSchool' => $request->input('seniorHighSchool'),
            'collegeS1' => $request->input('collegeS1'),
            'majorS1' => $request->input('majorS1'),
            'collegeS2' => $request->input('collegeS2'),
            'majorS2' => $request->input('majorS2'),
            'collegeS3' => $request->input('collegeS3'),
            'majorS3' => $request->input('majorS3'),
        ];
        
        $education->update($data);

        return redirect()->route('biodata')->with('success', 'Data pendidikan berhasil diperbarui!');
    }


    public function indexReligion(){
        $religion = Religion::where('user_id', auth()->id())->first();
        if (!$religion) {
            $religion = new Religion(); // Membuat objek baru jika data tidak ditemukan
        }
        return view('user.biodata', compact('religion'));
    }
    
    public function storeReligion(Request $request){
        $request->validate([
            'quranMemory' => 'required|string|max:50',
            'level' => 'required|string|max:50',
            'answer1' => 'required|string',
            'answer2' => 'required|string',
            'answer3' => 'required|string',
            'answer4' => 'required|string',
            'answer5' => 'required|string',
            'answer6' => 'required|string',
        ], [
            'quranMemory.required' => 'Hafalan quran harus diisi.',
            'level.required' => 'Bacaan quran harus diisi.',
            'answer1.required' => 'Jawaban pertanyaan 1 harus diisi.',
            'answer2.required' => 'Jawaban pertanyaan 2 harus diisi.',
            'answer3.required' => 'Jawaban pertanyaan 3 harus diisi.',
            'answer4.required' => 'Jawaban pertanyaan 4 harus diisi.',
            'answer5.required' => 'Jawaban pertanyaan 5 harus diisi.',
            'answer6.required' => 'Jawaban pertanyaan 6 harus diisi.',
        ]);
    
        $data = [
            'user_id' => auth()->user()->id,
            'quranMemory' => $request->input('quranMemory'),
            'level' => $request->input('level'),
            'answer1' => $request->input('answer1'),
            'answer2' => $request->input('answer2'),
            'answer3' => $request->input('answer3'),
            'answer4' => $request->input('answer4'),
            'answer5' => $request->input('answer5'),
            'answer6' => $request->input('answer6'),
        ];
    
        $religion = Religion::where('user_id', auth()->id())->first();
        if ($religion) {
            $religion->update($data);
            DB::statement('CALL update_is_complete(?)', [auth()->user()->id]);
            return redirect()->route('biodata')->with('success', 'Data ibadah berhasil diperbarui!');
        } else {
            Religion::create($data);
            DB::statement('CALL update_is_complete(?)', [auth()->user()->id]);
            return redirect()->route('biodata')->with('success', 'Data ibadah berhasil disimpan!');
        }
    }
    
    public function updateReligion(Request $request)
    {
        $request->validate([
            'quranMemory' => 'required|string|max:50',
            'level' => 'required|string|max:50',
            'answer1' => 'required|string',
            'answer2' => 'required|string',
            'answer3' => 'required|string',
            'answer4' => 'required|string',
            'answer5' => 'required|string',
            'answer6' => 'required|string',
        ]);
    
        $religion = Religion::where('user_id', auth()->id())->first();
    
        $data = [
            'user_id' => auth()->user()->id,
            'quranMemory' => $request->input('quranMemory'),
            'level' => $request->input('level'),
            'answer1' => $request->input('answer1'),
            'answer2' => $request->input('answer2'),
            'answer3' => $request->input('answer3'),
            'answer4' => $request->input('answer4'),
            'answer5' => $request->input('answer5'),
            'answer6' => $request->input('answer6'),
        ];
        
        $religion->update($data);
    
        return redirect()->route('biodata')->with('success', 'Data ibadah berhasil diperbarui!');
    }
    
}
