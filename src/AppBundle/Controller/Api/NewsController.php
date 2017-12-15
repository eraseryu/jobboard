<?php

namespace AppBundle\Controller\Api;

use AppBundle\Controller\BaseController;
use AppBundle\Entity\News;
use AppBundle\Form\NewsType;
use AppBundle\Form\UpdateNewsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends BaseController
{
    /**
     * @Route("/api/news")
     * @Method("POST")
     */
    public function newAction(Request $request)
    {
        $news = new News();
        $news->setDatePosted(new \DateTime());

        $form = $this->createForm(NewsType::class, $news);
        $this->processForm($request, $form);

        if (!$form->isValid()) {
            $this->throwApiProblemValidationException($form);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($news);
        $em->flush();

        $newsUrl = $this->generateUrl(
            'api_news_show',
            ['id' => $news->getId()]
        );

        $response = $this->createApiResponse($news, 201);
        $response->headers->set('Location', $newsUrl);

        return $response;
    }

    /**
     * @param $id
     * @Route("/api/news/{id}", name="api_news_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        /** @var News $news */
        $news =  $this->getNewsRepository()->findOneById($id);

        if (!$news) {
            throw $this->createNotFoundException(sprintf(
                'No news with id: %s',
                $id
            ));
        }

        $response = $this->createApiResponse($news, 200);

        return $response;
    }

    /**
     * @Route("/api/news")
     * @Method("GET")
     */
    public function listAction()
    {
        $allNews = $this->getNewsRepository()->findAll();

        $data = ['news' => []];

        foreach ($allNews as $news) {
            $data['news'][] = $news;
        }

        $response = $this->createApiResponse($data, 200);

        return $response;
    }

    /**
     * @param $id
     * @param Request $request
     *
     * @Route("/api/news/{id}")
     * @Method({"PUT", "PATCH"})
     */
    public function updateAction($id, Request $request)
    {
        /** @var News $news */
        $news =  $this->getNewsRepository()->findOneById($id);
        if (!$news) {
            throw $this->createNotFoundException(sprintf(
                'No news with id: %s',
                $id
            ));
        }

        $form = $this->createForm(UpdateNewsType::class, $news);
        $this->processForm($request, $form);

        if (!$form->isValid()) {
            $this->throwApiProblemValidationException($form);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($news);
        $em->flush();

        $response = $this->createApiResponse($news, 200);

        return $response;
    }

    /**
     * @param $id
     *
     * @Route("/api/news/{id}")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        /** @var News $news */
        $news =  $this->getNewsRepository()->findOneById($id);
        if ($news) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($news);
            $em->flush();
        }
        return new Response(null, 204);
    }
}

