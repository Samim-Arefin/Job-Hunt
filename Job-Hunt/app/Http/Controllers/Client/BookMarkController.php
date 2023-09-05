<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserBookmark;
use Auth;

class BookMarkController extends Controller
{
   public function bookmark($id)
    {
        $existing_bookmark_check = UserBookmark::where('user_id',Auth::guard('user')->user()->id)->where('job_id',$id)->count();
        if($existing_bookmark_check > 0) {
            return redirect()->back()->with('error', 'This job is already added to the bookmark');
        }

        $obj = new UserBookmark();
        $obj->user_id = Auth::guard('user')->user()->id;
        $obj->job_id = $id;
        $obj->save();

        return redirect()->back()->with('success', 'Job is added to bookmark section successfully.');
    }

    public function bookmark_view()
    {
        $bookmarked_jobs = UserBookmark::with('rJob','rUser')->where('user_id',Auth::guard('user')->user()->id)->get();

        return view('client.user.bookmark.index', compact('bookmarked_jobs'));
    }

    public function bookmark_delete($id)
    {
        UserBookmark::where('id',$id)->delete();

        return redirect()->back()->with('success', 'Bookmark item is deleted successfully.');
    }
}
