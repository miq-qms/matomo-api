<?php

namespace MiQ\MatomoApi;

class MatomoApi {

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $token;

    /**
     * MatomoApi constructor.
     * @param string $url Endpoint url for matomo installation
     * @param string $token Authtoken for api endpoint
     */
    public function __construct(string $url, string $token)
    {
        $this->url      = $url;
        $this->token    = $token;
    }

    /**
     * @param string $siteName
     * @return int
     */
    public function addSite(string $siteName) : int
    {
        //$ch = curl_init();
        return 0;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

}