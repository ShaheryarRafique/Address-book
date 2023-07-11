<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function generateSitemap()
    {
        $sitemap = Sitemap::create();

        $users_links = array();
        $website_url = "moviesinfo.com";

        // select list of all active users / posts / prompts / movies .... slug e.g. asif-shahzad, ... 
        // iterate each record .. user 
        //      $users_links[] = $website_url + "/user' + user['slug']


        $links = DB::table('links')->get();

        foreach ($links as $link) {
            $sitemap->add(
                Url::create($link->url)
                    ->setLastModificationDate($link->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.5)
            );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return response('Sitemap generated successfully!', 200)
            ->header('Content-Type', 'text/plain');
    }
}
