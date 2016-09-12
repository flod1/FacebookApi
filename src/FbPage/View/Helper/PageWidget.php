<?php
namespace FbPage\View\Helper;

class PageWidget extends BaseWidget
{
    public function fetchPageInfo()
    {
        $this->result = $this->facebookPageService->fetchPage();

        return $this;
    }
    public function fetchAllEvents()
    {
        $this->results = $this->facebookPageService->fetchEvents($this->getFields(), $this->getLimit());

        return $this;
    }

    public function fetchAllMilestones()
    {
        $this->results = $this->facebookPageService->fetchMilestones($this->getFields(), $this->getLimit());

        return $this;
    }

    public function fetchAllAlbums()
    {
        $this->results = $this->facebookPageService->fetchAlbums($this->getFields(), $this->getLimit());

        return $this;
    }
}