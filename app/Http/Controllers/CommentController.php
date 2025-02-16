<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        $limit = $request->limit ?? 5;
        $sort = $request->sort ?? 'desc';
        $filter = ['data_id' => $request->get('data_id') ?? -1, 'is_status' => 1, 'parent_id' => 0, 'type' => $request->type ?? ''];
        $count  = Comment::where($filter)->count();
        $collection = Comment::where($filter)->orderBy('created_at', $sort)->simplePaginate($limit);
      
        $user_id = collect($collection->items())->pluck('user_id')->unique()->values()->toArray();
        $users = User::whereIn('id', $user_id)->get()->keyBy('id')->toArray();
          
        $html = view('front_end.block.comment', ['rows' => $collection, 'users' =>$users, 'count' => $count, 'limit' => $limit, 'data_id' => $request->get('data_id'), 'type' => $request->get('type')])->render();

        return response()->json([
            'html' => $html,
            'status' => 'success',
            'count' => $count
        ]);
    }

    public function load_ajax(Request $request)
    {
        $page = $request->page ?? 1;
        $limit = $request->limit ?? 5;
        $sort = $request->sort ?? 'desc';
        $filter = [
            'data_id' => $request->get('data_id') ?? -1,
            'is_status' => 1,
            'parent_id' => $request->parent_id ?? 0,
            'type' => $request->type ?? ''
        ];
        $collection = Comment::where($filter)->orderBy('created_at', $sort)->simplePaginate($limit);
       
        $user_id = collect($collection)->pluck('user_id')->toArray();
        $users = User::whereIn('id', $user_id)->get()->keyBy('id')->toArray();
         
        
        $html = view('front_end.block.comment_list', ['users'=> $users,'rows' => $collection])->render();

        return response()->json([
            'html' => $html, 'status' => 'success', 'count' => $collection->count()
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->only(['parent_id', 'type', 'content', 'data_id']);
        if (!Auth::check()) return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);
        $data['user_id'] = Auth::id() ?? 1;
        try {
            DB::beginTransaction();
            $comment = Comment::create($data);
            DB::commit();
            if (!empty($data['parent_id'])) {
                $_count = Comment::where('parent_id', $data['parent_id'])->count();
                Comment::where('id', $data['parent_id'])->update(['total_reply' => $_count]);
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
        return response()->json([
            'html' => view('front_end.block.comment_item', ['comment' =>  $comment])->render(),
            'status' => 'success',
            'message' => 'Thành công'
        ]);
    }

    public function like(Request $request)
    {
        $comment = Comment::find($request->id ?? -1);
        try {
            $comment->like = $comment->like + 1;
            $comment->save();
            return response()->json([
                'status' => 'success',
                'count' =>  $comment->like
            ]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }
}
