<?php

namespace MiQ\MatomoApi;

interface ApiInterface {
    /**
     * @param string $siteName New name of the site
     * @param array $urls (optional) corresponding urls for this site
     * @return int the ID of the newly created site, -1 if there was an error
     */
    function addSite(string $siteName, array $urls=[]): int;

    /**
     * @param int $siteId the ID of the site to be removed
     * @return bool true if removal was successful otherwise false
     */
    function deleteSite(int $siteId): bool;

    /**
     * @param int $siteId the ID of the site, which data should be retrieved
     * @return array array with site data, if site not exists or no access rights an empty array is returned
     */
    function getSite(int $siteId): array;
}