<?php

namespace Mlankatech\AppBundle\Handler\RadioStation;

use Mlankatech\AppBundle\Entity\RadioStationStream;
use Mlankatech\AppBundle\Service\FlashMessageService;
use Mlankatech\AppBundle\Service\RadioStationService;
use Mlankatech\AppBundle\Service\RadioStationStreamService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class RadioStationStreamCreateHandler
{
    private $radioStationStreamService;
    private $alert;
    private $radioStationService;

    public function __construct(
        RadioStationStreamService $radioStationStreamService,
        FlashMessageService $alert,
        RadioStationService $radioStationService
    )
    {
        $this->radioStationStreamService = $radioStationStreamService;
        $this->alert = $alert;
        $this->radioStationService = $radioStationService;
    }

    public function handle(Request $request)
    {
        if (null == $request->get('stream_id')) {
            return false;
        }

        $streamId = $request->get('stream_id');

        $radioStation = $this->radioStationService->getByStreamId($streamId);

        if ($radioStation) {

            $data = json_decode($request->get('data'));

            $playedAt = new \DateTime($data->metadata->timestamp_utc);
            $playedAt->setTimezone(new \DateTimeZone('Africa/Johannesburg'));

            $radioStationStream = new RadioStationStream();
            $radioStationStream->setStreamId($streamId);
            $radioStationStream->setRadioStation($radioStation);
            $radioStationStream->setVersion($data->status->version);
            $radioStationStream->setPlayedAt($playedAt);
            $radioStationStream->setReleaseAt(new \DateTime($data->metadata->music[0]->release_date, new \DateTimeZone('Africa/Johannesburg')));
            $radioStationStream->setDuration($data->metadata->played_duration);
            $radioStationStream->setAlbum($data->metadata->music[0]->album->name);
            $radioStationStream->setTitle($data->metadata->music[0]->title);
            $radioStationStream->setAcrid($data->metadata->music[0]->acrid);
            $radioStationStream->setLabel($data->metadata->music[0]->label);
            $radioStationStream->setData($data);
            $radioStationStream->setArtist($data->metadata->music[0]->artists[0]->name);
            $radioStationStream->setIsrc($data->metadata->music[0]->external_ids->isrc);
            $radioStationStream->setUpc($data->metadata->music[0]->external_ids->upc);

            $this->radioStationStreamService->create($radioStationStream);
            
        }

        return true;
    }
}