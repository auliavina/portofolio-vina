<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MisiController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\SkilController;
use App\Http\Controllers\StrukturKepengurusanController;
use App\Http\Controllers\VidioController;
use App\Http\Controllers\VisiController;
use App\Models\About;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routing gambar
Route::get('gambar/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/gambar/' . $folder . '/' . $filename);

    if (!file_exists($path)) {
        abort(500);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file)->header('Content-Type', $type);
})->name('show-gambar');


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendController::class, 'index'])->name('frontend');
Route::get('/detail/{id}', [FrontEndController::class, 'detailProduct'])->name('detail.product');
Route::post('/pesan', [FrontEndController::class, 'pesan'])->name('pesan');
Route::get('/pesanan', [FrontEndController::class, 'pesananSaya'])->name('frontend.pesanan');
Route::patch('pesanan/selesai/{id}', [FrontEndController::class, 'selesai'])->name('pesanan.selesai');


Auth::routes();

Route::group(['middleware' => 'role:1'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');


    // Header
    Route::get('admin/header', [HeaderController::class, 'index'])->name('header');
    Route::get('admin/header/create', [HeaderController::class, 'create'])->name('header.create');
    Route::get('admin/header/edit/{id}', [HeaderController::class, 'edit'])->name('header.edit');
    Route::patch('admin/header/{id}', [HeaderController::class, 'update'])->name('header.update');
    Route::post('admin/header/store', [HeaderController::class, 'store'])->name('header.store');
    Route::delete('admin/header/destroy/{id}', [HeaderController::class, 'destroy'])->name('header.destroy');

    // Biodata
    Route::get('admin/biodata', [BiodataController::class, 'index'])->name('biodata');
    Route::get('admin/biodata/create', [BiodataController::class, 'create'])->name('biodata.create');
    Route::get('admin/biodata/edit/{id}', [BiodataController::class, 'edit'])->name('biodata.edit');
    Route::patch('admin/biodata/{id}', [BiodataController::class, 'update'])->name('biodata.update');
    Route::post('admin/biodata/store', [BiodataController::class, 'store'])->name('biodata.store');
    Route::delete('admin/biodata/destroy/{id}', [BiodataController::class, 'destroy'])->name('biodata.destroy');

    // About
    Route::get('admin/about', [AboutController::class, 'index'])->name('about');
    Route::get('admin/about/create', [AboutController::class, 'create'])->name('about.create');
    Route::get('admin/about/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
    Route::patch('admin/about/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::post('admin/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::delete('admin/about/destroy/{id}', [AboutController::class, 'destroy'])->name('about.destroy');

    // Skill
    Route::get('admin/skill', [SkilController::class, 'index'])->name('skill');
    Route::get('admin/skill/create', [SkilController::class, 'create'])->name('skill.create');
    Route::get('admin/skill/edit/{id}', [SkilController::class, 'edit'])->name('skill.edit');
    Route::patch('admin/skill/{id}', [SkilController::class, 'update'])->name('skill.update');
    Route::post('admin/skill/store', [SkilController::class, 'store'])->name('skill.store');
    Route::delete('admin/skill/destroy/{id}', [SkilController::class, 'destroy'])->name('skill.destroy');


    // Education
    Route::get('admin/education', [EducationController::class, 'index'])->name('education');
    Route::get('admin/education/create', [EducationController::class, 'create'])->name('education.create');
    Route::get('admin/education/edit/{id}', [EducationController::class, 'edit'])->name('education.edit');
    Route::patch('admin/education/{id}', [EducationController::class, 'update'])->name('education.update');
    Route::post('admin/education/store', [EducationController::class, 'store'])->name('education.store');
    Route::delete('admin/education/destroy/{id}', [EducationController::class, 'destroy'])->name('education.destroy');

    // Experience
    Route::get('admin/experience', [ExperienceController::class, 'index'])->name('experience');
    Route::get('admin/experience/create', [ExperienceController::class, 'create'])->name('experience.create');
    Route::get('admin/experience/edit/{id}', [ExperienceController::class, 'edit'])->name('experience.edit');
    Route::patch('admin/experience/{id}', [ExperienceController::class, 'update'])->name('experience.update');
    Route::post('admin/experience/store', [ExperienceController::class, 'store'])->name('experience.store');
    Route::delete('admin/experience/destroy/{id}', [ExperienceController::class, 'destroy'])->name('experience.destroy');

    // Products
    Route::get('admin/product', [ProductController::class, 'index'])->name('product');
    Route::get('admin/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('admin/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('admin/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('admin/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::delete('admin/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    // Pesanan
    Route::get('admin/pesanan', [PesananController::class, 'index'])->name('pesanan');
    Route::get('admin/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
    Route::get('admin/pesanan/edit/{id}', [PesananController::class, 'edit'])->name('pesanan.edit');
    Route::patch('admin/pesanan/{id}', [PesananController::class, 'update'])->name('pesanan.update');
    Route::post('admin/pesanan/store', [PesananController::class, 'store'])->name('pesanan.store');
    Route::delete('admin/pesanan/destroy/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
    Route::patch('admin/pesanan/diproses/{id}', [PesananController::class, 'diproses'])->name('pesanan.diproses');
    Route::get('admin/pesanan/laporan', [PesananController::class, 'laporan'])->name('pesanan.laporan');

    // Contact
    Route::get('admin/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('admin/contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::get('admin/contact/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::patch('admin/contact/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::post('admin/contact/store', [ContactController::class, 'store'])->name('contact.store');
    Route::delete('admin/contact/destroy/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
});
