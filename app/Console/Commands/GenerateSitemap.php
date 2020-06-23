<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Sitemap';

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
        // modify this to your own needs
        SitemapGenerator::create('http://www.thehimalayakingdom.com')
            ->hasCrawled(function (Url $url) {
                if ($url->segment(1) === 'booking' || $url->segment(1) === 'admin') {
                    return;
                }

                if (strpos($url->url, '?') && strpos($url->url, 'review')) {
                    return;
                }

                return $url;
            })
            ->writeToFile(base_path('sitemap.xml'));
    }
}
