<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Community;
use App\News;

class ReadingPagecontroller extends Controller
{
    //
    public function communityshow(Request $request)
    {
        $page = Community::where('permalink',$request->permalink)->first();
        $posts = NEWS::where('user_id',$page->user_id)->orderBy('id', 'DESC')->take(3)->get();
        $keywords = '';
        return view('community',['page' =>$page,'posts' =>$posts,'keywords'=>$keywords]);
    }

    public function newsshow(Request $request)
    {
        $post = News::where('news_permalink',$request->news_permalink)->first();
        $keywords = '';
        return view('news',['post' =>$post,'keywords'=>$keywords]);
    }

    public function indexnews()
    {
        $keywords = '';
        $posts = News::latest()->get();
        $posts = News::latest()->paginate(10);
        return view('indexnews',['posts' =>$posts, 'keywords'=>$keywords]);
    }

    public function indexcommunity()
    {
        $keywords = '';
        return view('indexcommunity',['keywords'=>$keywords]);
    }

    public function about()
    {
        $keywords = '';
        return view('aboutnewstylehustle',['keywords'=>$keywords]);
    }

    public function lessonshow()
    {
        $keywords = '';
        return view('lesson',['keywords'=>$keywords]);
    }

    public function videopageshow()
    {
        $keywords = '';
        return view('video',['keywords'=>$keywords]);
    }

    public function toppage()
    {
        $keywords = '';
        $posts = NEWS::orderBy('id', 'DESC')->take(3)->get();
        return view('toppage',['posts' =>$posts, 'keywords'=>$keywords]);
    }

    public function privacypolicy()
    {
        $keywords = '';
        return view('privacy_policy',['keywords'=>$keywords]);
    }

    public function disclaimer()
        {
            $keywords = '';
            return view('disclaimer',['keywords'=>$keywords]);
        }

    public function regarding()
        {
            $keywords = '';
            return view('regarding',['keywords'=>$keywords]);
        }
}
