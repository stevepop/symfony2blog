<?php

namespace Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blog\CoreBundle\Services\AuthorManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class AuthorController
 *
 * @Route("/{_locale}/author", requirements={"_locale"="en|es"}, defaults={"_locale"="en"})
 */
class AuthorController extends Controller
{
    /**
     * Show posts by author
     *
     * @param string $slug
     *
     * @throws NotFoundHttpException
     *
     * @return array
     * @Route("/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $author = $this->getAuthorManager()->findBySlug($slug);

        $posts = $this->getAuthorManager()->findPosts($author);

        return array(
            'author' => $author,
            'posts' => $posts
        );
    }

    /**
     * Get Author Manager
     *
     * @return AuthorManager
     */
    private function getAuthorManager()
    {
         return $this->get('authorManager');
    }

}
