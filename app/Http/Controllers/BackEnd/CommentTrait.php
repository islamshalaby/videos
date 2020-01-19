<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Comments\Store;
use App\Models\Comment;


trait CommentTrait {
    public function storeComment(Store $request) {
        $post = $request->all();
        $post['user_id'] = auth()->user()->id;
        Comment::create($post);

        return redirect()->route('videos.edit', ['id' => $post['video_id'], '#comments']);
    }

    public function deleteComment($id) {
        $row = Comment::findOrFail($id);
        $row->delete();

        return redirect()->route('videos.edit', ['id' => $row['video_id'], '#comments']);
    }

    public function updateComment($id, Store $request) {
        $post = $request->all();

        $row = Comment::findOrFail($id);
        $row->update($post);

        return redirect()->route('videos.edit', ['id' => $row['video_id'], '#comments']);
    }
}
