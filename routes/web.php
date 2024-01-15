<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MetaTagsController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentSlotController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FAQController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/


Auth::routes();

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'servicePage'])->name('services');
Route::get('/service/{slug}', [PageController::class, 'serviceDetails'])->name('service.details');
Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [PageController::class, 'blogDetails'])->name('blog.details');
Route::get('/department/{slug}', [PageController::class, 'departmentDetails'])->name('department.details');
Route::get('/doctors', [PageController::class, 'doctors'])->name('doctors');
Route::get('/doctor/{slug}', [PageController::class, 'doctorDetails'])->name('doctor.details');
Route::get('/appointment', [PageController::class, 'appointment'])->name('appointment');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/page/{slug}', [PageController::class, 'page'])->name('page');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/contact', [PageController::class, 'contactPage'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/thank-you', [PageController::class, 'thankYouPage'])->name('thankyou');
Route::get('/gallery', [PageController::class, 'galleryPage'])->name('gallery');
Route::get('/gallery/{slug}', [PageController::class, 'galleryImage'])->name('gallery.show');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment');
// Route::get('/appointment-slots', [PageController::class, 'slots'])->name('slots');
// Route::post('/appointment-slots', [AppointmentSlotController::class, 'store'])->name('slots');
Route::get('/profile', [ProfileController::class, 'profilePage'])->name('profile');
Route::get('/update-counter', [CounterController::class, 'updateCountersManually']);
                                                                                                                     
Route::middleware('auth')->name('admin.')->group(function () {
    Route::get('/admin/dashboard', [PageController::class, 'dashboard']);


    //slider controller
    Route::get('/admin/slider/list', [SliderController::class, 'index'])->name('slider.list');
    Route::get('/admin/slider/add', [SliderController::class, 'create'])->name('slider.add');
    Route::post('/admin/slider/add', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/admin/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/admin/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::post('/admin/slider/delete/{id}', [SliderController::class, 'destroy'])->name('slider.delete');

    Route::get('/admin/profile/list', [ProfileController::class, 'index'])->name('profile.list');
    Route::get('/admin/profile/add', [ProfileController::class, 'create'])->name('profile.add');
    Route::post('/admin/profile/add', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/admin/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/admin/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/admin/profile/delete/{id}', [ProfileController::class, 'destroy'])->name('profile.delete');
    Route::post('/upload_profile_editor_image', [ProfileController::class, 'profileEditorUpload'])->name('profile.editor.upload');

    //counter
    Route::get('/admin/counter/list', [CounterController::class, 'index'])->name('counter.list');
    Route::get('/admin/counter/add', [CounterController::class, 'create'])->name('counter.add');
    Route::post('/admin/counter/add', [CounterController::class, 'store'])->name('counter.store');
    Route::get('/admin/counter/edit/{id}', [CounterController::class, 'edit'])->name('counter.edit');
    Route::post('/admin/counter/update/{id}', [CounterController::class, 'update'])->name('counter.update');
    Route::post('/admin/counter/delete/{id}', [CounterController::class, 'destroy'])->name('counter.delete');

    //faq
    Route::get('/admin/faq/list', [FAQController::class, 'index'])->name('faq.list');
    Route::get('/admin/faq/add', [FAQController::class, 'create'])->name('faq.add');
    Route::post('/admin/faq/add', [FAQController::class, 'store'])->name('faq.store');
    Route::get('/admin/faq/edit/{id}', [FAQController::class, 'edit'])->name('faq.edit');
    Route::post('/admin/faq/update/{id}', [FAQController::class, 'update'])->name('faq.update');
    Route::post('/admin/faq/delete/{id}', [FAQController::class, 'destroy'])->name('faq.delete');

    //blog controller
    Route::get('/admin/blog/list', [BlogController::class, 'index'])->name('blog.list');
    Route::get('/admin/blog/add', [BlogController::class, 'create'])->name('blog.add');
    Route::post('/admin/blog/add', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/admin/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::post('/admin/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
    Route::post('/upload_blog_editor_image', [BlogController::class, 'blogEditorUpload'])->name('blog.editor.upload');

    //post controller
    Route::get('/admin/post/list', [PostController::class, 'index'])->name('post.list');
    Route::get('/admin/post/add', [PostController::class, 'create'])->name('post.add');
    Route::post('/admin/post/add', [PostController::class, 'store'])->name('post.store');
    Route::get('/admin/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/admin/post/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::post('/admin/post/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
    Route::post('/upload_post_editor_image', [PostController::class, 'postEditorUpload'])->name('post.editor.upload');

    //contact form
    Route::get('/admin/contact/list', [ContactController::class, 'index'])->name('contact.list');
    Route::post('/admin/contact/delete/{id}', [ContactController::class, 'destroy'])->name('contact.delete');

    //service controller
    Route::get('/admin/service/list', [ServiceController::class, 'index'])->name('service.list');
    Route::get('/admin/service/add', [ServiceController::class, 'create'])->name('service.add');
    Route::post('/admin/service/add', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/admin/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('/admin/service/update/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::post('/admin/service/delete/{id}', [ServiceController::class, 'destroy'])->name('service.delete');
    Route::post('/upload_service_editor_image', [ServiceController::class, 'serviceEditorUpload'])->name('service.editor.upload');

    //team
    Route::get('/admin/team/list', [TeamController::class, 'index'])->name('team.list');
    Route::get('/admin/team/add', [TeamController::class, 'create'])->name('team.add');
    Route::post('/admin/team/add', [TeamController::class, 'store'])->name('team.store');
    Route::get('/admin/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
    Route::post('/admin/team/update/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::post('/admin/team/delete/{id}', [TeamController::class, 'destroy'])->name('team.delete');


    //gallery controller
    Route::get('/admin/gallery/list', [GalleryController::class, 'index'])->name('gallery.list');
    Route::get('/admin/gallery/image/{album_slug}', [GalleryController::class, 'galleryImage'])->name('gallery.image');
    Route::get('/admin/gallery/add', [GalleryController::class, 'create'])->name('gallery.add');
    Route::post('/admin/gallery/add', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/admin/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/admin/gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::post('/admin/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('gallery.delete');
    Route::post('/admin/gallery/image/delete/{id}', [GalleryController::class, 'deleteImage'])->name('gallery.image.delete');
    Route::get('/admin/gallery/add-more/{slug}', [GalleryController::class, 'addMoreImage'])->name('gallery.image.add_more.get');
    Route::post('/admin/gallery/add-more/{album_slug}', [GalleryController::class, 'addMoreImageUpdate'])->name('gallery.image.add_more.update');

    //testimonial
    Route::get('/admin/testimonial/list', [TestimonialController::class, 'index'])->name('testimonial.list');
    Route::get('/admin/testimonial/add', [TestimonialController::class, 'create'])->name('testimonial.add');
    Route::post('/admin/testimonial/add', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/admin/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('/admin/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::post('/admin/testimonial/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.delete');

    //  appointments
    Route::get('/admin/appointment/list', [AppointmentController::class, 'index'])->name('appointment.list');
    Route::post('/admin/appointment/delete/{id}', [AppointmentController::class, 'destroy'])->name('appointment.delete');

    //  appointmentslot
    Route::get('/admin/appointmentslot/list', [AppointmentSlotController::class, 'index'])->name('appointmentslot.list');
    Route::get('/admin/appointmentslot/add', [AppointmentSlotController::class, 'create'])->name('appointmentslot.add');
    Route::post('/admin/appointmentslot/add', [AppointmentSlotController::class, 'store'])->name('appointmentslot.store');
    Route::get('/admin/appointmentslot/edit/{id}', [AppointmentSlotController::class, 'edit'])->name('appointmentslot.edit');
    Route::post('/admin/appointmentslot/update/{id}', [AppointmentSlotController::class, 'update'])->name('appointmentslot.update');
    Route::post('/admin/appointmentslot/delete/{id}', [AppointmentSlotController::class, 'destroy'])->name('appointmentslot.delete');

    //about
    Route::get('/admin/about/list', [AboutController::class, 'index'])->name('about.list');
    Route::get('/admin/about/add', [AboutController::class, 'create'])->name('about.add');
    Route::post('/admin/about/add', [AboutController::class, 'store'])->name('about.store');
    Route::get('/admin/about/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/admin/about/update/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::post('/admin/about/delete/{id}', [AboutController::class, 'destroy'])->name('about.delete');
    Route::post('/upload_about_editor_image', [AboutController::class, 'aboutEditorUpload'])->name('about.editor.upload');

    //metatags
    Route::get('/admin/metatag/list', [MetaTagsController::class, 'index'])->name('metatag.list');
    Route::get('/admin/metatag/add', [MetaTagsController::class, 'create'])->name('metatag.add');
    Route::post('/admin/metatag/add', [MetaTagsController::class, 'store'])->name('metatag.store');
    Route::get('/admin/metatag/edit/{id}', [MetaTagsController::class, 'edit'])->name('metatag.edit');
    Route::post('/admin/metatag/update/{id}', [MetaTagsController::class, 'update'])->name('metatag.update');
    Route::post('/admin/metatag/delete/{id}', [MetaTagsController::class, 'destroy'])->name('metatag.delete');
});
