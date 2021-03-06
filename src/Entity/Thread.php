<?php

namespace App\Entity;


use App\Entity\Traits\Base;
use App\Entity\Traits\Body;
use App\Entity\Traits\Slug;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThreadRepository")
 * @ORM\Table(name="thread")
 * @ORM\EntityListeners({"App\Listener\Entity\ThreadListener"})
 */
class Thread
{
    use Base,
        Slug,
        Body,
        Timestampable,
        SoftDeletable;

    public const NUM_ITEMS = 10;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="thread")
     */
    private $posts;

    /**
     * Many Posts have One User.
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
     */
    private $user;

    /**
     * @ORM\Column(type="string")
     *
     */
    private $title = '';

    /**
     * @ORM\Column(type="integer")
     */
    private $postsCount = 0;

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
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
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