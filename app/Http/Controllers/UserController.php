<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    // Menampilkan daftar kursus
    public function index(Request $request)
    {
        $query = Course::query();
        
        // Jika ada parameter pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        $courses = $query->paginate(10); // Mengambil data kursus dengan pagination
        
        return view('index', compact('courses'));
    }

    
    // Menampilkan form untuk mengedit kursus
    public function edit($id)
    {
        $course = Course::findOrFail($id); // Mencari kursus berdasarkan id
        return view('edit', compact('course'));
    }

    // Memperbarui data kursus
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'durasi' => 'required|integer',
        ]);

        $course = Course::findOrFail($id);
        $course->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'durasi' => $request->durasi,
        ]);

        return redirect()->route('index')->with('success', 'Kursus berhasil diperbarui');
    }
     // Menampilkan form penambahan kursus
     public function create()
     {
         return view('create'); // Pastikan view 'courses.create' sudah ada
     }
 
     // Menyimpan data kursus yang baru
     public function store(Request $request)
     {
         // Validasi input dari form
         $request->validate([
             'judul' => 'required|string|max:255',
             'deskripsi' => 'required|string',
             'durasi' => 'required|integer',
         ]);
 
         // Menyimpan data ke database
         Course::create([
             'judul' => $request->judul,
             'deskripsi' => $request->deskripsi,
             'durasi' => $request->durasi,
         ]);
 
         // Redirect ke halaman kursus atau menampilkan pesan sukses
         return redirect()->route('index')->with('success', 'Kursus berhasil ditambahkan!');
     }
     public function destroy($id)
{
    // Temukan kursus berdasarkan ID dan hapus
    $course = Course::findOrFail($id);
    $course->delete();

    // Redirect ke halaman daftar kursus dengan pesan sukses
    return redirect()->route('index')->with('success', 'Kursus berhasil dihapus!');
}

}
