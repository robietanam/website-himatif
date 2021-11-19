<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Repositories\PageContentRepository;

class HomepageController extends Controller
{
    protected $pageContentRepository;

    public function __construct()
    {
        $this->pageContentRepository = new PageContentRepository;
    }

    public function getHomepage()
    {
        $header = (array) json_decode($this->pageContentRepository->findBySlug('header-homepage')->data);
        $section2 = json_decode($this->pageContentRepository->findBySlug('section2-homepage')->data);
        $section3 = (array) json_decode($this->pageContentRepository->findBySlug('section3-homepage')->data);
        $visionMission = (array) json_decode($this->pageContentRepository->findBySlug('section-vision-mission')->data);
        $gallery = (array) json_decode($this->pageContentRepository->findBySlug('section-gallery-homepage')->data);

        return view('frontpage.modules.beranda', compact([
            'header',
            'section2',
            'section3',
            'visionMission',
            'gallery',
        ]));
    }

    public function getAbout()
    {
        $slogan = (array) json_decode($this->pageContentRepository->findBySlug('section-slogan')->data);

        return view('frontpage.modules.tentang', compact('slogan'));
    }
}
