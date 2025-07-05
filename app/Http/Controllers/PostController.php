<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{



    public function viewsPosts()
    {
        $posts = Post::with('user')->latest()->get(); // Post ordinati dal più recente
        return view('views', compact('posts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'titolo' => 'required|string|max:255',
            'contenuto' => 'required|string',
        ], [
            'titolo.required' => 'Il titolo è obbligatorio.',
            'contenuto.required' => 'Il contenuto è obbligatorio.',
        ]);

        $user = Auth::user();

        $post = new Post();
        $post->titolo = $request->titolo;
        $post->contenuto = $request->contenuto;
        $post->user_id = $user->id;


        if ($post->save()) {
            return redirect()->route('views.show')->with('success', 'Post created successfully!');
        }

        return redirect()->route('home')->with('error', 'Failed to create post.');
    }




    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Se vuoi permettere solo all'autore di cancellare:
        if ($post->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Non hai il permesso per eliminare questo post.');
        }

        $post->delete();

        return redirect()->route('views.show')->with('success', 'Post eliminato con successo!');
    }






    public function myPosts()
    {
        $user = Auth::user();
        $posts = $user->posts()->latest()->get(); // Solo i post dell'utente, dal più recente

        return view('views', compact('posts'));
    }
}
