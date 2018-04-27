<?php
namespace KeriganSolutions\FacebookFeed;

use GuzzleHttp\Client;

class FacebookPhotoGallery
{
    protected $client;
    protected $pageId;
    protected $accessToken;

    public function __construct()
    {
        $this->accessToken = config('facebook.access_token');
        $this->pageId      = config('facebook.page_id');
        $this->client      = new Client(['base_uri' => 'https://graph.facebook.com/v2.11/']);
    }
    public function albums($limit = null, $before = null, $after = null)
    {
        $fields = 'id,name,link,created_time,cover_photo{picture,images.limit(1)}';

        $response = $this->client->request(
            'GET',
            $this->pageId .
            '/albums?fields=' . $fields .
            '&before=' . $before .
            '&after=' . $after .
            '&limit=' . $limit .
            '&access_token=' . $this->accessToken
        );

        $results = json_decode($response->getBody());

        return json_encode($results);
    }

    public function albumPhotos($albumId, $limit = null, $before = null, $after = null)
    {
        $fields = 'images,name,album';

        $response = $this->client->request(
            'GET',
            $albumId .
            '/photos?fields=' . $fields .
            '&before=' . $before .
            '&after=' . $after .
            '&limit=' . $limit .
            '&access_token=' . $this->accessToken
        );

        $results = json_decode($response->getBody());

        return json_encode($results);
    }
}
