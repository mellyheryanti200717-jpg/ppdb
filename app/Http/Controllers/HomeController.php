<?php
namespace App\Http\Controllers;
use App\Models\Post;
class HomeController extends Controller {
    public function index() {
        $posts = Post::latest()->take(3)->get();
        return view("home", compact("posts"));
    }
}
