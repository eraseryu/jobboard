<?php
/**
 * Created by PhpStorm.
 * User: milan.petrovic
 * Date: 13.12.17
 * Time: 18:18
 */

namespace AppBundle\Controller;

use AppBundle\Entity\News;
use AppBundle\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\Serializer\SerializationContext;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpFoundation\Request;

abstract class BaseController extends Controller
{
    /**
     * @return NewsRepository
     */
    protected function getNewsRepository()
    {
        return $this->getDoctrine()->getRepository('AppBundle:News');
    }

    protected function createApiResponse($data, $statusCode = 200)
    {
        $json = $this->serialize($data);

        return new Response($json, $statusCode, array(
            'Content-Type' => 'application/json'
        ));
    }

    protected function serialize($data, $format = 'json')
    {
        $context = new SerializationContext();
        $context->setSerializeNull(true);

        $request = $this->get('request_stack')->getCurrentRequest();
        $groups = array('Default');
        if ($request->query->get('deep')) {
            $groups[] = 'deep';
        }
        $context->setGroups($groups);

        return $this->container->get('jms_serializer')
            ->serialize($data, $format, $context);
    }

    protected function processForm(Request $request, FormInterface $form)
    {
        $clearMissing = $request->getMethod() != 'PATCH';
        $data = json_decode($request->getContent(), true);
        $form->submit($data, $clearMissing);
    }

}