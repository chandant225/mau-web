<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\EducationCategory;
use App\Models\Settings;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

if (!function_exists('domain')) {
    function domain()
    {
        return Session::get('domain');
    }

    function logo()
    {
        $logo = Settings::where('type', 'logo')->first();
        if ($logo) {
            return $logo->name;
        }
    }

    function favIcon()
    {
        $logo = Settings::where('type', 'fav_icon')->first();
        if ($logo) {
            return $logo->name;
        }
    }

    function courseCategory()
    {
        $data = EducationCategory::all();
        if ($data) {
            return $data;
        }
        return [];
    }

    function networks()
    {
        $cat = Category::where('slug', 'our-networks')->first();

        if ($cat) {
            $data = Blog::select('title', 'slug', 'image', 'description')->where('category_id', $cat->id)
                ->where('status', 1)
                ->get();
            if ($data) {
                return $data;
            }
            return [];
        }
        return [];

    }

    function who()
    {
        $cat = Category::where('slug', 'who')->first();

        if ($cat) {
            $data = Blog::select('title', 'slug', 'image', 'description')->where('category_id', $cat->id)
                ->where('status', 1)
                ->get();
            if ($data) {
                return $data;
            }
            return [];
        }
        return [];

    }

    function services()
    {
        $cat = Category::where('slug', 'services')->first();

        if ($cat) {
            $data = Blog::select('title', 'slug', 'image', 'description')->where('category_id', $cat->id)
                ->where('status', 1)
                ->get();
            if ($data) {
                return $data;
            }
            return [];

        }
        return [];
    }

    function departments()
    {
        $cat = Category::where('slug', 'departments')->first();
        if ($cat) {
            $data = Blog::select('title', 'slug')->where('category_id', $cat->id)
                ->where('status', 1)
                ->get();
            if ($data) {
                return $data;
            }
        }
        return [];
    }

    function subServices($slug)
    {
        $cat = Category::where('slug', $slug)->first();
        if ($cat) {
            $data = Blog::select('title', 'slug', 'image')->where('category_id', $cat->id)
                ->where('status', 1)
                ->get();
            if ($data) {
                return $data;
            }
        }
        return [];
    }

    function subNetworks($slug)
    {
        $cat = Category::where('slug', $slug)->first();
        if ($cat) {
            $data = Blog::select('title', 'slug', 'image')->where('category_id', $cat->id)
                ->where('status', 1)
                ->get();
            if ($data) {
                return $data;
            }
        }
        return [];
    }

}
if(!function_exists('short_text')){
    function short_text($text,$length = 30,$read_more = false,$link=false,$style=''){
        if($read_more && $link){
            $moreTag='...<a '.$style.' href="'.$link.'">Read More</a>';
        }else{
            $moreTag='...';
        }
            return Str::limit(strip_tags(html_entity_decode($text)),$length,$moreTag);
    }
}
