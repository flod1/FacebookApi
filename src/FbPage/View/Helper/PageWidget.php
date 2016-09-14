<?php
namespace FbPage\View\Helper;

class PageWidget extends BaseWidget
{
    public function setPageID($pageid)
    {
        $this->facebookPageService->setPageid($pageid);

    }
    public function getPageID()
    {
        return $this->facebookPageService->getPageid();
    }

    public function fetchPageInfo()
    {
        $this->results = $this->facebookPageService->fetchPage();

        return $this;
    }
    public function fetchAllEvents($fields=null,$limit=null)
    {
        $this->results = $this->facebookPageService->fetchEvents($fields, $limit);

        return $this;
    }
    public function fetchAllPosts($fields=null,$limit=null)
    {
        $this->results = $this->facebookPageService->fetchPosts($fields, $limit);

        return $this;
    }

    public function fetchAllMilestones($fields=null,$limit=null)
    {
        $this->results = $this->facebookPageService->fetchMilestones($fields, $limit);

        return $this;
    }

    public function fetchAllAlbums($fields=null,$limit=null)
    {
        $this->results = $this->facebookPageService->fetchAlbums($fields, $limit);

        return $this;
    }
}