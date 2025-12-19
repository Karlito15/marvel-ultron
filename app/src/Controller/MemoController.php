<?php

namespace App\Controller;

use App\Trait\YamlToArrayTrait;
use App\Trait\ControllerTrait;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(
    path: '{_locale<%app.supported_locales%>}/memo',
    name: 'app.memo.',
    options: ['expose' => false],
    methods: ['GET'],
    schemes: ['http', 'https'],
    format: 'html',
    utf8: true
)]
final class MemoController extends AbstractController
{
    use ControllerTrait;
    use YamlToArrayTrait;

    /**
     * @return Response
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route(path: '/boulangerie.php', name: 'boulangerie')]
    public function boulangerie(): Response
    {
        // Variables
        $title = $this->translator->trans('text.boulangerie');
        $file = realpath($this->getDirectory() . DIRECTORY_SEPARATOR . 'memo' . DIRECTORY_SEPARATOR . 'Commerce.yaml');

        return $this->render('@App/contents/table.html.twig', [
            'controller_name' => $title,
            'container'       => 'container-fluid',
            'breadcrumb'      => ['level1' => $this->translator->trans('text.memo'), 'level2' => $title],
            'datas'           => self::reader($file, 0),
            'filter'          => 'boulangerie',
        ]);
    }

    /**
     * @return Response
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route(path: '/superette.php', name: 'superette')]
    public function superette(): Response
    {
        // Variables
        $title = $this->translator->trans('text.superette');
        $file = realpath($this->getDirectory() . DIRECTORY_SEPARATOR . 'memo' . DIRECTORY_SEPARATOR . 'Commerce.yaml');

        return $this->render('@App/contents/table.html.twig', [
            'controller_name' => $title,
            'container'       => 'container-fluid',
            'breadcrumb'      => ['level1' => $this->translator->trans('text.memo'), 'level2' => $title],
            'datas'           => self::reader($file, 0),
            'filter'          => 'superette',
        ]);
    }

    /**
     * @return Response
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route(path: '/login.php', name: 'login')]
    public function login(): Response
    {
        // Variables
        $title = $this->translator->trans('text.login');
        $file  = realpath($this->getDirectory() . DIRECTORY_SEPARATOR . 'memo' . DIRECTORY_SEPARATOR . 'Login.yaml');

        return $this->render('@App/contents/card.html.twig', [
            'controller_name' => $title,
            'container'       => 'container-fluid',
            'breadcrumb'      => ['level1' => $this->translator->trans('text.memo'), 'level2' => $title],
            'datas'           => self::reader($file, 0),
            'column'          => 2,
        ]);
    }

    /**
     * @return Response
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route(path: '/NAS.php', name: 'NAS')]
    public function NAS(): Response
    {
        // Variables
        $title = $this->translator->trans('text.NAS');
        $file  = realpath($this->getDirectory() . DIRECTORY_SEPARATOR . 'memo' . DIRECTORY_SEPARATOR . 'NAS.yaml');

        return $this->render('@App/contents/card.html.twig', [
            'controller_name' => $title,
            'container'       => 'container-fluid',
            'breadcrumb'      => ['level1' => $this->translator->trans('text.memo'), 'level2' => $title],
            'datas'           => self::reader($file, 0),
            'column'          => 2,
        ]);
    }

    /**
     * @return Response
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route(path: '/search-and-replace.php', name: 'searchandreplace')]
    public function searchandreplace(): Response
    {
        // Variables
        $title = $this->translator->trans('text.search');
        $file  = realpath($this->getDirectory() . DIRECTORY_SEPARATOR . 'memo' . DIRECTORY_SEPARATOR . 'Search-&-Replace.yaml');

        return $this->render('@App/contents/card.html.twig', [
            'controller_name' => $title,
            'container'       => 'container-fluid',
            'breadcrumb'      => ['level1' => $this->translator->trans('text.memo'), 'level2' => $title],
            'datas'           => self::reader($file),
            'column'          => 2,
        ]);
    }

    /**
     * @return Response
     */
    #[Route(path: '/meteo.php', name: 'meteo')]
    public function meteo(): Response
    {
        // Variables
        $title = $this->translator->trans('text.meteo');

        return $this->render('@App/contents/meteo.html.twig', [
            'controller_name' => $title,
            'container'       => 'container-fluid',
            'breadcrumb'      => ['level1' => $this->translator->trans('text.memo'), 'level2' => $title],
        ]);
    }
}
