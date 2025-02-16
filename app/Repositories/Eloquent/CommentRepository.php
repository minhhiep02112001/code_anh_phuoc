<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\Contracts\CommentContracts;
use App\Repositories\Repository;

class CommentRepository extends Repository implements CommentContracts
{
    public function model()
    {
        return Comment::class;
    }
}