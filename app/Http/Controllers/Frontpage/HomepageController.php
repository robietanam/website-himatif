<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Repositories\PageContentRepository;
use App\Repositories\DivisionRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProkerRepository;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    protected $pageContentRepository;
    protected $divisionRepository;
    protected $postRepository;
    protected $prokerRepository;

    public function __construct()
    {
        $this->pageContentRepository = new PageContentRepository;
        $this->divisionRepository = new DivisionRepository;
        $this->postRepository = new PostRepository;
        $this->prokerRepository = new ProkerRepository;
    }

    public function getHomepage()
    {
        /* editable-page data */
        $header = (array) json_decode($this->pageContentRepository->findBySlug('header-homepage')->data);
        $section2 = (array) json_decode($this->pageContentRepository->findBySlug('section2-homepage')->data);
        $section3 = (array) json_decode($this->pageContentRepository->findBySlug('section3-homepage')->data);
        $visionMission = (array) json_decode($this->pageContentRepository->findBySlug('section-vision-mission')->data);
        $gallery = (array) json_decode($this->pageContentRepository->findBySlug('section-gallery-homepage')->data);

        $prokers = $this->prokerRepository->get(
            null,
            [['status', '1']],
        );

        return view('frontpage.modules.beranda', compact([
            'header',
            'section2',
            'section3',
            'visionMission',
            'prokers',
            'gallery',
        ]));
    }

    public function getAbout()
    {
        /* editable-page data */
        $header = (array) json_decode($this->pageContentRepository->findBySlug('header-about')->data);
        $slogan = (array) json_decode($this->pageContentRepository->findBySlug('section-slogan')->data);
        $visionMission = (array) json_decode($this->pageContentRepository->findBySlug('section-vision-mission')->data);

        return view('frontpage.modules.tentang', compact([
            'header',
            'slogan',
            'visionMission'
        ]));
    }

    public function getPengurus()
    {
        $header = (array) json_decode($this->pageContentRepository->findBySlug('header-pengurus')->data);
        $divisions = $this->divisionRepository->getParent();
        return view('frontpage.modules.pengurus', compact([
            'header',
            'divisions',
        ]));
    }

    public function getProker()
    {
        $header = (array) json_decode($this->pageContentRepository->findBySlug('header-proker')->data);
        $prokers = $this->prokerRepository->get(
            null,
            [['status', '1']],
        );
        return view('frontpage.modules.proker', compact([
            'header',
            'prokers',
        ]));
    }

    public function showProker($id)
    {
        $proker = $this->prokerRepository->findById($id);
        return view('frontpage.modules.proker-show', compact('proker'));
    }

    public function getBerita(Request $request)
    {
        $filter = [['title', 'LIKE', "%$request->q%"]];
        $filter2 = [['body', 'LIKE', "%$request->q%"]];
        $limit = $request->limit ?? 8;

        $posts = $this->postRepository->get($limit, $filter, $filter2);
        return view('frontpage.modules.berita-index', compact('posts'));
    }

    public function showBerita($slug)
    {
        $post = $this->postRepository->findBySlug($slug);
        $otherPosts = $this->postRepository->get(4, [['id', '!=', $post->id]]);
        if ($post) {
            return view('frontpage.modules.berita-show', compact([
                'post',
                'otherPosts'
            ]));
        } else {
            abort(404);
        }
    }
}
