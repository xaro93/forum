<?php

namespace App\Entity;


use App\Entity\Traits\Base;
use App\Entity\Traits\Slug;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThreadRepository")
 * @ORM\Table(name="thread")
 * @ORM\EntityListeners({"App\Listener\Entity\ThreadListener"})
 */
class Thread
{
    use Base,
        Slug;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="thread")
     */
    private $posts;

    /**
     * @ORM\Column(type="string")
     *
     */
    private $title = '';

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    /**
     * @param Post[] ...$posts
     */
    public function setPosts(Post ...$posts): void
    {
        $this->posts = $posts;
    }

    /**
     * @param Post $post
     */
    public function addPost(Post $post)
    {
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
        }
    }

    public function removePost(Post $post)
    {
        $this->posts->remove($post);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }

}