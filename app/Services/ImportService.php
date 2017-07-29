<?php

namespace App\Services;

use App\Blog;
use Illuminate\Support\Facades\Log;


class ImportService
{

    /**
     * Create Blog
     * @param array $params
     * @return boolean
     */
    public function createBlog($params)
    {
        if($params){
            $blog = Blog::create($params);
            if ($blog) {
                Log::info('Create blog: '.$params['title']);
                echo 'Create blog: '.$params['title'] .'<br/>';
            } else {
                Log::error('Error Create blog: '.$params['title']);
                echo 'Error Create blog: '.$params['title'] .'<br/>';
            }
            return $blog;
        }
        return false;
    }

}
