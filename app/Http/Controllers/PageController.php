<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Team;
use App\Models\Blog;
use App\Models\MetaTags;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\GalleryAlbum;
use App\Models\Counter;
use App\Models\About;
use App\Models\Appointment;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Faq;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $teams = Team::orderBy('position', 'asc')->get();
        $sliders = Slider::all();
        $services = Service::take(3)->get();
        $testimonials = Testimonial::all();
        $blogs = Blog::all();
        $counters = Counter::all();
        $abouts = About::all();
        $faqs = Faq::orderBy('updated_at','desc')->get();
        $metatag = MetaTags::where('page','home_page')->get()->first();
        return view('client.welcome',compact('sliders','services','teams','testimonials','blogs','metatag','counters','abouts','faqs'));
    }

    public function about(){
        $services = Service::all();
        $teams = Team::all();
        $abouts = About::all();
        $metatag = MetaTags::where('page','about_page')->get()->first();
        return view('client.about',compact('services','teams','abouts','metatag'));
    }

    public function contactPage() {
        $profile = Profile::get()->first();
        $metatag = MetaTags::where('page','contact_page')->get()->first();
        return view('client.contact',compact('metatag','profile'));
    }

    public function servicePage() {
        $services = Service::all();
        $metatag = MetaTags::where('page','service_page')->get()->first();
        return view('client.service',compact('metatag'))->with(['services'=>$services]);
   }

    public function serviceDetails($slug){
        $services = Service::all();
        $service = Service::where('slug', $slug)->first();
        $testimonials = Testimonial::all();
       
        return view('client.service-details',compact('service','services','testimonials'));
    }

    public function blogs(){
        $blogs = Blog::all();
        $metatag = MetaTags::where('page','blog_page')->get()->first();
        return view('client.blog',compact('blogs','metatag'));
    }

    public function blogDetails($slug){
        $blogs = Blog::all();
        $blog = Blog::where('slug', $slug)->first();
        return view('client.blog-details',compact('blogs','blog'));
    }

    public function galleryPage(){
        $metatag = MetaTags::where('page','gallery_page')->get()->first();
        $albums = GalleryAlbum::orderBy('created_at', 'desc')->get();
        return view('client.gallery')->with(['albums'=>$albums,'metatag' => $metatag]);
    }
     
    public function galleryImage($slug) {
        $images = GalleryImage::where('album_slug', $slug)->get();
        return view('client.gallery-image',compact('images','slug'));
    }

    public function appointment(){
        return view('client.appointment');
    }

    public function doctors(){
        $teams = Team::orderBy('position', 'asc')->get();
        return view('client.doctor',compact('teams'));
    }

    public function doctorDetails($slug){
        $teams = Team::orderBy('position', 'asc')->get();
         $team = Team::where('slug', $slug)->first();
        return view('client.doctor-details',compact('teams','team'));
    }

    public function privacy(){
        return view('client.privacy');
    }

    public function terms(){
        return view('client.terms');
    }
    public function dashboard(){
        $appointments = Appointment::all();
        $todayAppointments = [];

        $todayDate = date('Y-m-d'); // Get today's date in the "2023-08-31" format

        foreach ($appointments as $appointment) {
            $appointmentDate = date('Y-m-d', strtotime($appointment->created_at));

            if ($appointmentDate === $todayDate) {
                $todayAppointments[] = $appointment;
            }
        }
        $teams = Team::all();
        $sliders = Slider::all();
        $services = Service::all();
        $testimonials = Testimonial::all();
        $blogs = Blog::all();
        $counters = Counter::all();
        return view('admin.dashboard',compact('teams','sliders','services','testimonials','blogs','counters','todayAppointments'));
    }
    public function thankYouPage() {
        return view('client.thank_you');
    }

    public function page($slug) {
        $post = Post::where('slug', $slug)->get()->first();
        return view('client.page',compact('post'));
    }
}
