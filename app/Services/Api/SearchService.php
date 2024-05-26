<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\DB;

class SearchService
{
    public function search($search_term)
    {
        $searchWord = $search_term;

        $results = DB::table('categories')
            ->select('title', 'id', DB::raw("'categoria' as table_name"))
            ->where('title', 'LIKE', '%' . $searchWord . '%')
            ->union(
                DB::table('subcategories')
                    ->select('title','id', DB::raw("'subcategoria' as table_name"))
                    ->where('title', 'LIKE', '%' . $searchWord . '%')
            )
            ->union(
                DB::table('topics')
                    ->select('title','id', DB::raw("'tópico' as table_name"))
                    ->where('title', 'LIKE', '%' . $searchWord . '%')
            )
            ->union(
                DB::table('blog_posts')
                    ->select('title','id', DB::raw("'postagem' as table_name"))
                    ->where('title', 'LIKE', '%' . $searchWord . '%')
            )
            ->get();
            
    

        return $results;
    }

    
    
}