<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;

class PageController extends Controller
{
    public function __construct()
    {
        $this->pageModel = new Page();
        $this->faqModel = new Faq();
    }

    public function index($slug)
    {
        $pageData = $this->pageModel
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
     
        return view('frontend.pages.page', compact('pageData'));
    }

    public function termsAndConditions()
    {
        $data['page'] = $this->pageModel
            ->where([
                ['slug', 'terms-and-conditions'],
                ['status', 'published']
            ])
            ->first();
        if (empty($data['page'])) abort(404);

        return view('frontend.pages.terms_and_conditions', $data);
    }

    public function faqs()
    {
        $data['page'] = $this->pageModel
            ->where([
                ['slug', 'faqs'],
                ['status', 'published']
            ])
            ->first();

        if (empty($data['page']))  abort(404);

        $data['faqs'] = $this->faqModel
            ->where('status', 'published')
            ->orderBy('position', 'DESC')
            ->get();

        return view('frontend.pages.faqs', $data);
    }

}
