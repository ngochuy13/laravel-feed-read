<?php

namespace App\Services;

use App\Blog;


class BlogService
{
    public function listBlog($params)
    {
        // return Blog::paginate(10);
        // return false;
        $query = Blog::select('*');
        if ($params) {
            if (!empty($params['category'])) {
                $query->where('category', 'LIKE', '%'.$params['category'].'%');
            }
        }
        if(empty($params['perPage'])){
            $query->paginate(config('forms.common.perPage'));
        }

        $results = $query->orderBy('id', 'DESC')->paginate(config('forms.common.perPage'));
        return $results;
    }
    public function getBlogDetail($id)
    {
        $blog = Blog::findOrFail($id);
        return $blog;
    }
    public function createBlog($params)
    {
        if($params){
            $blog = Blog::create($params);
            return $blog;
        }
        return false;
    }
    public function updateBlog($params)
    {
        if($params) {
            return Blog::where('id' , $params['id'])
                ->update([
                    'title' => $params['title'],
                    'description' => $params['description'],
                    'link' => $params['link'],
                    'category' => $params['category'],
                    'comments' => $params['comments'],
                    'pubDate' => $params['pubDate']
                ]);
        }

        return false;
    }
    public function deleteBlog($id)
    {
        if($id) {
            return Blog::where('id' , $id)
                ->delete();
        }

        return false;
    }

}
