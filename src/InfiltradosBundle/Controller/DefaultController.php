<?php

namespace InfiltradosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use InfiltradosBundle\Form\Type\ProfileType;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
    
        return $this->render('InfiltradosBundle:Default:index.html.twig');
    }

    /**
     * @Route("/edit-profile", name="edit_profile")
     */
    public function editProfileAction(Request $request)
    {
        $user = $this->getUser();

        $form = $this->createForm(ProfileType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            //$picture = $user->getPicture();
            //$this->get('kcloud.picture_uploader')->upload($picture);
            $userManager = $this->get('fos_user.user_manager');
            $userManager->updateUser($user);
            //$em->flush();

            $this->addFlash(
                'notice',
                'Your profile has been saved.'
            );

            $event = new UserPostPersistEvent($user);
            $this->get('event_dispatcher')->dispatch('kcloud.event.user_post_persist', $event);

            return $this->redirectToRoute('edit_profile');
        }

        return $this->render(':default:edit_profile.html.twig', array(
            'form' => $form->createView(),
            'user' => $user,
        ));
    }
}
