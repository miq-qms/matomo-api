<?php

namespace MiQ\MatomoApi;

class MatomoApi implements ApiInterface {

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $token;

    /**
     * @param string $url Endpoint url for matomo installation
     * @param string $token Authtoken for api endpoint
     * @return self
     */
    public static function init(string $url, string $token): self
    {
        return new MatomoApi($url, $token);
    }

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

    /**
     * @param string $siteName
     * @param array $urls
     * @return int
     */
    public function addSite(string $siteName, array $urls=[]) : int
    {
        $query = http_build_query([
            'module'    => 'API',
            'method'    => 'SitesManager.addSite',
            'siteName'  => $siteName,
            'urls'      => $urls,
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url.'?'.$query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));

        if(isset($result['result']) && $result['result'] === "error") {
            return -1;
        }

        return intval($result['value']);
    }

    /**
     * https://developer.matomo.org/api-reference/reporting-api
     * @param int $siteId
     * @return array
     */
    public function getSite(int $siteId): array
    {
        //SitesManager.getSiteFromId
        //result = "error"
    }

    function deleteSite(int $siteId): bool
    {
        // TODO: Implement deleteSite() method.
    }
}