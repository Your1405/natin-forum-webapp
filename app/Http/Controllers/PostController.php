<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    function newPost(Request $request){
        $userId = $request->session()->get('userId');
        $categories = Categorie::all();
        if($request->isMethod('GET')){

            return view('posts.new', [
                'categories' => $categories,
                'postStatus' => null,
            ]);
        } else if($request->isMethod('POST')){
            $postInput = $request->all();

            $post = new Post();
            $post->postTitel = $postInput['titel'];
            $post->postBeschrijving = $postInput['content'];
            $post->postAuteur = $userId;
            $post->postCategorie = $postInput['categorie'];
            $post->save();
            $postId = $post->getKey();

            return redirect("/post/$postId");
        }
    }

    function viewPost(Request $request, $id){
        $userId = $request->session()->get('userId');

        $post = DB::table('post')
        ->join('user', 'user.userId', '=', 'post.postAuteur')
        ->join('categorie', 'categorie.categorieId', '=', 'post.postCategorie')
        ->select('post.postTitel', 'post.postBeschrijving', 'post.postAuteur' , 'user.username', 'post.postTijd', 'post.postUpdateTijd', 'categorie.categorieBeschrijving', 'post.postStatus')
        ->where('post.postId', '=', $id)
        ->get()->toArray();

        $post = json_decode(json_encode($post), true);
        
        return view('posts.post', [
            'postInfo'=>$post[0],
            'postId'=>$id,
            'userId'=>$userId
        ]);
        /*
            SELECT post.postTitel, post.postBeschrijving, user.username, post.postTijd, post.postUpdateTijd, categorie.categorieBeschrijving, postStatus
                FROM post 
                    INNER JOIN user ON user.userId = post.postAuteur
                    INNER JOIN categorie ON categorie.categorieId = postCategorie
        */
    }

    function deletePost(Request $request, $id){
        $userId = $request->session()->get('userId');

        $post = Post::find($id);
        if($request->isMethod('DELETE')){
            if($post->postAuteur == $userId){
                if($request->get('selection') == 1){
                    $post->delete();
                    return redirect("/home");
                } else {
                    return redirect("/post/$id");
                }
            } else {
                return redirect("/post/$id");
            }
        } else if($request->isMethod('GET')){
            return view('posts.deleteconfirm', [
                "postId" => $id
            ]);
        }
    }
}
