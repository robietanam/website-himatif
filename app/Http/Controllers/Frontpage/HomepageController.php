<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Repositories\PageContentRepository;
use App\Repositories\DivisionRepository;

class HomepageController extends Controller
{
    protected $pageContentRepository;
    protected $divisionRepository;

    public function __construct()
    {
        $this->pageContentRepository = new PageContentRepository;
        $this->divisionRepository = new DivisionRepository;
    }

    public function getHomepage()
    {
        /* editable-page data */
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
        /* editable-page data */
        $slogan = (array) json_decode($this->pageContentRepository->findBySlug('section-slogan')->data);

        return view('frontpage.modules.tentang', compact('slogan'));
    }

    public function getPengurus()
    {
        $divisions = $this->divisionRepository->get();
        return view('frontpage.modules.pengurus', compact('divisions'));
    }
}
