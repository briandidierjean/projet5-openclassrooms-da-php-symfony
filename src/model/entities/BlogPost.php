<?php
namespace App\Model\Entity;

use \Core\Entity;

class BlogPost extends Entity
{
    protected $id;
    protected $userId;
    protected $title;
    protected $heading;
    protected $content;
    protected $updateDate;

    /**
     * Check if a blog post is valid
     * 
     * @return bool
     */
    public function isValid()
    {
        return !(
            empty($this->title) ||
            empty($this->heading) ||
            empty($this->content) ||
            empty($this->updateDate)
        );
    }

    // GETTERS
    public function getTitle()
    {
        return $this->title;
    }

    public function getHeading()
    {
        return $this->heading;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    // SETTERS
    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->title = $title;
        }
    }

    public function setHeading($heading)
    {
        if (is_string($heading)) {
            $this->heading = $heading;
        }
    }

    public function setContent($content)
    {
        if (is_string($content)) {
            $this->content = $content;
        }
    }

    public function setUpdateDate(\DateTime $updateDate)
    {
        $this->updateDate = $updateDate;
    }
}