<?php

namespace GSRO\Multilanguage\Service;

/**
 * Interface MultilanguageServiceInterface
 * @package GSRO\Multilanguage\Service
 */
interface MultilanguageServiceInterface
{
    /**
     * list language content
     * @param string $langaugeCode
     * @return array
     */
    public function getAllBlocks($languageCode);

    /**
     * Verify if language exists
     *
     * @param string $languageCode
     * @return bool
     */
    public function hasLanguage(string $languageCode);

    /**
     * Return default language code
     * @return string
     */
    public function getDefaultLanguageCode() : string;
}
