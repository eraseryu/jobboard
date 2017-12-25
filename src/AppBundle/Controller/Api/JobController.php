<?php

namespace AppBundle\Controller\Api;

use AppBundle\Controller\BaseController;
use AppBundle\Entity\Jobs;
use AppBundle\Form\UpdateJobsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\JobsType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class JobController
 * @package AppBundle\Controller\Api
 */
class JobController extends BaseController
{
    /**
     *
     * @Route("/api/jobs")
     * @Method("POST")
     */
    public function newAction(Request $request)
    {
        $job = new Jobs();
        $job->setDateCreated(new \DateTime());

        $form = $this->createForm(JobsType::class, $job);
        $this->processForm($request, $form);

        if (!$form->isValid()) {
            $this->throwApiProblemValidationException($form);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($job);
        $em->flush();

        $jobUrl = $this->generateUrl(
            'api_job_show',
            ['id' => $job->getId()]
        );

        $response = $this->createApiResponse($job, 201);
        $response->headers->set('Location', $jobUrl);

        return $response;
    }

    /**
     * @param $id
     * @param Request $request
     *
     * @Route("/api/jobs/{id}")
     * @Method({"PUT", "PATCH"})
     */
    public function updateAction($id, Request $request)
    {
        /** @var Jobs $job */
        $job =  $this->getJobsRepository()->findOneById($id);
        if (!$job) {
            throw $this->createNotFoundException(sprintf(
                'No job with id: %s',
                $id
            ));
        }

        $form = $this->createForm(UpdateJobsType::class, $job);
        $this->processForm($request, $form);

        if (!$form->isValid()) {
            $this->throwApiProblemValidationException($form);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($job);
        $em->flush();

        $response = $this->createApiResponse($job, 200);

        return $response;
    }

    /**
     * @param $id
     *
     * @Route("/api/jobs/{id}")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        /** @var Jobs $job */
        $job =  $this->getJobsRepository()->findOneById($id);
        if ($job) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($job);
            $em->flush();
        }
        return new Response(null, 204);
    }

    /**
     * @param $id
     * @Route("/api/jobs/{id}", name="api_job_show")
     * @Method("GET")
     */
    public function showAction($id)
    {

    }

    /**
     * @Route("/api/jobs")
     * @Method("GET")
     */
    public function listAction()
    {

    }
}