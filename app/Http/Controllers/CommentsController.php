<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\News;

class CommentsController extends Controller
{
    public function store(Request $request, $newsId)
    {
        $news = News::findOrFail($newsId);

        $request->validate([
            'username' => 'required',
            'content' => 'required',
        ]);

        $comment = new Comments([
            'username' => $request->input('username'),
            'content' => $request->input('content'),
        ]);

        $news->comments()->save($comment);

        return redirect()->back()->with('success', 'Comentariul a fost adăugat cu succes.');
    }

    public function destroy($newsId, $commentId)
    {
        $news = News::findOrFail($newsId);
        $comment = Comments::findOrFail($commentId);

        // Verifică dacă comentariul aparține știrii pentru a evita ștergerea unui comentariu în afara contextului
        if ($news->id === $comment->news_id) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comentariul a fost șters cu succes.');
        }

        return redirect()->back()->with('error', 'Nu ai permisiunea de a șterge acest comentariu.');
    }
}
