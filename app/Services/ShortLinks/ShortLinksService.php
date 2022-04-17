<?php

namespace App\Services\ShortLinks;

use App\Models\ShortLink;
use App\Services\ShortLinks\Handlers\ShortLinkCreateHandler;
use App\Services\ShortLinks\Handlers\ShortLinkDeleteHandler;
use App\Services\ShortLinks\Handlers\ShortLinkFindHandler;
use App\Services\ShortLinks\Handlers\ShortLinkGetAllHandler;
use App\Services\ShortLinks\Handlers\ShortLinkUpdateHandler;
use Illuminate\Database\Eloquent\Collection;

class ShortLinksService
{
    private ShortLinkGetAllHandler $shortLinkGetAllHandler;
    private ShortLinkFindHandler $shortLinkFindHandler;
    private ShortLinkCreateHandler $shortLinkCreateHandler;
    private ShortLinkUpdateHandler $shortLinkUpdateHandler;
    private ShortLinkDeleteHandler $shortLinkDeleteHandler;

    public function __construct(
        ShortLinkGetAllHandler $shortLinkGetAllHandler,
        ShortLinkFindHandler   $shortLinkFindHandler,
        ShortLinkCreateHandler $shortLinkCreateHandler,
        ShortLinkUpdateHandler $shortLinkUpdateHandler,
        ShortLinkDeleteHandler $shortLinkDeleteHandler
    )
    {
        $this->shortLinkGetAllHandler = $shortLinkGetAllHandler;
        $this->shortLinkFindHandler = $shortLinkFindHandler;
        $this->shortLinkCreateHandler = $shortLinkCreateHandler;
        $this->shortLinkUpdateHandler = $shortLinkUpdateHandler;
        $this->shortLinkDeleteHandler = $shortLinkDeleteHandler;
    }

    public function getList(): Collection
    {
        return $this->shortLinkGetAllHandler->handle();
    }

    public function find(string $shortLink)
    {
        return $this->shortLinkFindHandler->handle($shortLink);
    }

    public function create(array $data): ShortLink
    {
        return $this->shortLinkCreateHandler->handle($data);
    }

    public function updateShortLink(ShortLink $shortLink, array $data): ShortLink
    {
        return $this->shortLinkUpdateHandler->handle($shortLink, $data);
    }

    public function deleteUser(ShortLink $shortLink): ?bool
    {
        return $this->shortLinkDeleteHandler->handle($shortLink);
    }
}
