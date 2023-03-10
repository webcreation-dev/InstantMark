<?php

namespace App\Controller;

use App\Repository\BannerRepository;
use App\Repository\CampaignRepository;
use App\Repository\ImpressionRepository;
use App\Repository\SiteRepository;
use App\Repository\VisitRepository;
use App\Repository\VueRepository;
use App\Repository\ZoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        CampaignRepository  $campaignRepository,
        BannerRepository $bannerRepository,
        SiteRepository $siteRepository,
        ZoneRepository $zoneRepository,
        VisitRepository $visitRepository,
        VueRepository $vueRepository,
        ImpressionRepository $impressionRepository
    ): Response
    {
        $campaigns = $campaignRepository->findAll();
        $banners = $bannerRepository->findAll();
        $sites = $siteRepository->findAll();
        $zones = $zoneRepository->findAll();
        $visits = $visitRepository->findAll();
        $vues = $vueRepository->findAll();
        $impressions = $impressionRepository->findAll();

        return $this->render("index.html.twig", compact(
            'campaigns',
            'banners',
            'sites',
            'zones',
            'visits',
            'vues',
            'impressions'
        ));
    }
}
