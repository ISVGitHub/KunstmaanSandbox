<?php

namespace Kunstmaan\KAdminBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * GalleryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GalleryRepository extends EntityRepository
{

    public function getAllGalleries($limit = null)
        {
            $qb = $this->createQueryBuilder('imagegallery')
                       ->select('imagegallery')
                       ->where('imagegallery.parent is null')
                       ->addOrderBy('imagegallery.created', 'ASC');

            if (false === is_null($limit))
                $qb->setMaxResults($limit);

            return $qb->getQuery()
                      ->getResult();
        }

}