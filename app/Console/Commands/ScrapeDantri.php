<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Goutte;
use App\Models\Post;
use App\Models\Category;


class ScrapeDantri extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:dantri';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Đang cào Dân Trí!';

    protected $collections = [
        // [
        //     'slug' => 'xa-hoi.htm',
        //     'name' => 'Xã hội'
        // ],
        [
            'slug' => 'the-gioi.htm',
            'name' => 'Thế giới'
        ],
        [
            'slug' => 'the-thao.htm',
            'name' => 'Thể thao'
        ],
        [
            'slug' => 'giao-duc-khuyen-hoc.htm',
            'name' => 'Giáo dục và khoa học'
        ]
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Dang lay du lieu tu dan tri..");

        foreach ($this->collections as $collection) {
            $data['name'] = $collection['name'];
            $data['slug'] = $collection['slug'];
            $category = Category::where('slug', '=',$data['slug'])->first();

            if($category == null){
                $category = Category::create($data);
            }
            $this->scrape($data['slug'], $category->id);
        }
    }

    /**
     * For scraping data for the specified collection.
     *
     * @param  string $collection
     * @return boolean
     */

    public static function scrape($collection, $category)
    {
        $url = env('DANTRI_POP_URL').'/'.$collection;
        $urlPage = $url;

        for($i = 0; $i < 5; $i++){
            $crawler = Goutte::request('GET', $urlPage);

            // crawler href
            try{
                $urlpost = $crawler->filter('#listcheckepl .mr1 a[data-linktype="newsdetail"]')->each(function ($node) {
                   
                   return env('DANTRI_POP_URL').$node->attr('href');
                });

            }catch(Exception $e){
                print_r($e->getMessage());
            }finally{
                // print_r($urlpost);

                foreach ($urlpost as $url) {
                    self::scrapePost($url, $category);   
                }

                try{
                    $urlPage = $crawler->filter('.fr a.fon27.mt1.mr2')->each(function ($node){
                        $urlPage = env('DANTRI_POP_URL').$node->attr('href');
                        return $urlPage;
                    })[0];
                }catch(Exception $e){
                    print_r($e->getMessage());
                }

                print_r($urlPage);
            }
        }

        return true;
    }

    public static function scrapePost($url, $category){
        // news-tags-item
        
        $crawlerPost = Goutte::request('GET', $url);
        $data = array();
        $data['user_id'] = 1;
        $data['category_id'] = $category;
        $tags = array();

        try{
            $data['title'] = $crawlerPost->filter('h1.fon31.mgb15')->each(function ($nodePost) {
              print_r($nodePost->text());
              return $nodePost->text();
            })[0];

            $data['slug']  = str_slug($data['title']);

            $data['description'] = $crawlerPost->filter('h2.fon33.mt1.sapo')->each(function ($node) {
              return str_replace('Dân trí','',$node->text());
            })[0];

            $data['content'] = $crawlerPost->filter('div#divNewsContent.detail-content')->each(function ($node) {
                // $vitri = strpos($node->html(), '<div class="news-tag"> <div class="news-tag-list">');
                // $ct = substr($node->html(), $vitri);

                $content = str_replace('Dân trí','',$node->html());
                // $content = rtrim($content, $ct);
              return  $content;
            })[0];
            // $data['content'] .= "</div>";

            $data['thumbnail'] = $crawlerPost->filter('div#divNewsContent.detail-content .VCSortableInPreviewMode img')->each(function ($node) {
              return  $node->attr('src');
            })[0];

            $tags = $crawlerPost->filter('div.news-tag .news-tag-list .news-tags-item a')->each(function ($node) {
              return $node->text();
            });
        }catch(Exception $e){
            print_r($e->getMessage());
        }

        $post = Post::where('slug', '=',$data['slug'])->first();

        if($post == null){
            $post1 = Post::create($data);
            $post1->tag($tags);
        }

        return true;
    }
}
