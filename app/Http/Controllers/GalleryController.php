<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\GalleryAlbum;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = GalleryAlbum::orderBy('created_at', 'desc')->get();
        return view('admin.gallery.list',compact('albums'));
    }

    public function galleryImage ($slug) {
        $images = GalleryImage::where('album_slug', $slug)->get();
        return view('admin.gallery.gallery-image',compact('images','slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.gallery.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
            $current = Carbon::now()->format('YmdHs');
            $slug = Str::slug($request->title,'-');
            $coverImage = $current ."_". $request->file('cover_image')->getClientOriginalName();
            $request->file('cover_image')->move(public_path(). '/uploads/gallery/cover',$coverImage);
            $album = new GalleryAlbum();
            $album->title = $request->title;
            $album->slug = $slug;
            $album->position = $request->position;
            $album->cover_image = $coverImage;
            $albumSaved = $album->save();
            if($albumSaved){
               foreach($request->file('images') as $image) {
                $imageName = $current ."_". $image->getClientOriginalName();
                $image->move(public_path(). '/uploads/gallery/album',$imageName);
                $gallery = new GalleryImage();
                $gallery->filename = $imageName;
                $gallery->album_slug = $slug;
                $gallery->save();
               }
               return redirect()->route('admin.gallery.list')->with('success','gallery has been uploaded successfully'); 
            } 
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $gallery = Gallery::where('slug', $slug)->first();
        return view('client.gallery-details')->with(['gallery' => $gallery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = GalleryAlbum::find($id);
        return view('admin.gallery.edit',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id ) 
    {
        
        $images = galleryImage::where('album_slug',$request->old_slug)->get();
        foreach($images as $image) {
             $image->album_slug = Str::slug($request->title,'-');
             $image->save();
        }

        $newSlug = Str::slug($request->title,'-');
        if($request->hasfile('cover_image')){
            $coverImage = $request->file('cover_image')->getClientOriginalName();
            $request->file('cover_image')->move(public_path(). '/uploads/gallery/cover',$coverImage);
            $album = GalleryAlbum::find($id);
            $filename = $album->cover_image;
            if (File::exists(public_path('uploads/gallery/cover/'.$filename))) {
               File::delete(public_path('uploads/gallery/cover/'.$filename));
               }
            $album->title = $request->title;
            $album->slug = $newSlug;
            $album->position = $request->position;
            $album->cover_image = $coverImage;
            $save_album = $album->save();
            if($save_album){
                return redirect()->route('admin.gallery.list')->with('success','album has been updated successfully.');
            }else {
                return back()->with('error','something went wrong');
            }
        }else {
            $album = GalleryAlbum::find($id);
            $filename = $album->cover_image;
            $album->title = $request->title;
            $album->slug = $newSlug;
            $album->position = $request->position;
            $album->cover_image = $filename;
            $save_album = $album->save();
            if($save_album){
                return redirect()->route('admin.gallery.list')->with('success','album has been updated successfully.');
            }else {
                return back()->with('error','something went wrong');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = GalleryAlbum::find($id);
        $cover_image = $album->cover_image;
        if(File::exists(public_path('uploads/gallery/cover/' . $cover_image))) {
            File::delete(public_path('uploads/gallery/cover/' . $cover_image));
         }
        $album_slug = $album->slug;
        $images = galleryImage::where('album_slug',$album_slug)->get();
        foreach($images as $image) {
             $fileName = $image->filename;
             if(File::exists(public_path('uploads/gallery/album/' . $fileName))) {
                File::delete(public_path('uploads/gallery/album/' . $fileName));
             }
             $image->delete();
        }
        
        $album->delete();
        return redirect()->back()->with('success','gallery has been deleted successfully.');
    }

    public function deleteImage($id)
    {
        $image = GalleryImage::find($id);
        $filename = $image->filename;
     if (File::exists(public_path('uploads/gallery/album/'.$filename))) {
        File::delete(public_path('uploads/gallery/album/'.$filename));
      }
        $image->delete();
        return redirect()->back()->with('success','image has been deleted successfully.');
    }

    public function addMoreImage($slug){
        return view('admin.gallery.add-image',compact('slug'));
    }

    public function addMoreImageUpdate (Request $request,$album_slug) {
        if($request->file('images')){
            $current = Carbon::now()->format('YmdHs');
            foreach($request->file('images') as $image) {
                $imageName = $current ."_". $image->getClientOriginalName();
                $image->move(public_path(). '/uploads/gallery/album',$imageName);
                $gallery = new GalleryImage();
                $gallery->filename = $imageName;
                $gallery->album_slug = $album_slug;
                $gallery->save();
               }
               return redirect()->route('admin.gallery.image',['album_slug' => $album_slug])->with('success','image has been added successfully.');
        } else {
            return back()->with('error','please choose images');
        }
    }
}
