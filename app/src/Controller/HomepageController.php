<?php

namespace App\Controller;

use App\Trait\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(name: 'app.homepage.', options: ['expose' => false], schemes: ['http', 'https'], format: 'html', utf8: true)]
final class HomepageController extends AbstractController
{
    use ControllerTrait;

    #[Route(path: '{_locale<%app.supported_locales%>}/index.php', name: 'index')]
    public function index(): Response
    {
        // Variables
        $title      = $this->translator->trans('text.homepage');

        return $this->render('@App/contents/homepage.html.twig', [
            'controller_name' => $title,
            'container'       => 'container-fluid',
            'breadcrumb'      => [
                'level1' => $this->translator->trans('text.homepage'),
                'level2' => $title
            ],
        ]);
    }

    #[Route(path: '/', name: 'noLocale')]
    public function indexNoLocale(): Response
    {
        return $this->redirectToRoute('app.homepage.index', ['_locale' => 'fr'], Response::HTTP_PERMANENTLY_REDIRECT);
    }
}
