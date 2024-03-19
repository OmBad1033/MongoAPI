<?php

namespace App\Repository;

use App\Document\LabelTranslation;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Doctrine\Bundle\MongoDBBundle\Repository\ServiceDocumentRepository;


class LabelTranslationRepository extends ServiceDocumentRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LabelTranslation::class);
    }

    public function save(LabelTranslation $entity, bool $flush = false): void
    {
        $this->getDocumentManager()->persist($entity);

        if ($flush) {
            $this->getDocumentManager()->flush();
        }
    }

    public function remove(LabelTranslation $entity, bool $flush = false): void
    {
        $this->getDocumentManager()->remove($entity);

        if ($flush) {
            $this->getDocumentManager()->flush();
        }
    }

    public function get(int $id,bool $flush=false) {
        #return $this->getDocumentManager()->find(LabelTranslation::class,$id);
        $querybuilder=$this->getDocumentManager()->createQueryBuilder(LabelTranslation::class);
        $doc=$querybuilder->field("id")->equals($id)->getQuery()->getSingleResult();
        return $doc;

    }
}
