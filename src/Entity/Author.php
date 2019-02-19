<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="author")
     */
    private $article_edit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Newsletter", mappedBy="author")
     */
    private $newsletter_update;

    public function __construct()
    {
        $this->article_edit = new ArrayCollection();
        $this->newsletter_update = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticleEdit(): Collection
    {
        return $this->article_edit;
    }

    public function addArticleEdit(Article $articleEdit): self
    {
        if (!$this->article_edit->contains($articleEdit)) {
            $this->article_edit[] = $articleEdit;
            $articleEdit->setAuthor($this);
        }

        return $this;
    }

    public function removeArticleEdit(Article $articleEdit): self
    {
        if ($this->article_edit->contains($articleEdit)) {
            $this->article_edit->removeElement($articleEdit);
            // set the owning side to null (unless already changed)
            if ($articleEdit->getAuthor() === $this) {
                $articleEdit->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Newsletter[]
     */
    public function getNewsletterUpdate(): Collection
    {
        return $this->newsletter_update;
    }

    public function addNewsletterUpdate(Newsletter $newsletterUpdate): self
    {
        if (!$this->newsletter_update->contains($newsletterUpdate)) {
            $this->newsletter_update[] = $newsletterUpdate;
            $newsletterUpdate->setAuthor($this);
        }

        return $this;
    }

    public function removeNewsletterUpdate(Newsletter $newsletterUpdate): self
    {
        if ($this->newsletter_update->contains($newsletterUpdate)) {
            $this->newsletter_update->removeElement($newsletterUpdate);
            // set the owning side to null (unless already changed)
            if ($newsletterUpdate->getAuthor() === $this) {
                $newsletterUpdate->setAuthor(null);
            }
        }

        return $this;
    }
}
