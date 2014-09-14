<?php
namespace Blog\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class PostRepository
 *
 * @package Blog\ModelBundle\Repository
 */
class PostRepository extends EntityRepository
{
    /**
     * Find latest posts
     *
     * @param int $num
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findLatest($num)
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('p.createdAt', 'desc')
            ->setMaxResults($num);

        return $qb->getQuery()->getResult();
    }

    /**
     * Find the first post
     *
     * @return Post
     */
    public function findFirst()
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('p.id', 'asc')
            ->setMaxResults(1);

        return $qb->getQuery()->getSingleResult();
    }

    private function getQueryBuilder()
    {
        $em = $this->getEntityManager();

        $qb = $em->getRepository("ModelBundle:Post")
            ->createQueryBuilder('p');

        return $qb;
    }
}