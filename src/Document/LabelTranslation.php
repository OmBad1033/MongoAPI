<?php

namespace App\Document;
use App\Repository\LabelTranslationRepository;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document(repositoryClass: LabelTranslationRepository::class)]
class LabelTranslation 
{
    #[MongoDB\Id]
    private ?string $objectid = null;

    #[MongoDB\Field(type:'integer')]
    private ?int $id = null;

    private $val;

    #[MongoDB\Field(type: 'hash')]
    private $doc = null;

    public function __construct()
    {
        $val=3;
    }
    /**
     * Get the value of label
     */
    public function getDoc(): ?array
    {
        return $this->doc;
    }

    /**
     * Set the value of label
     */
    public function setDoc(array $doc): self
    {
        $this->val=$this->val+1;
        $this->setId($this->val);
        $this->doc = $doc;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }
}