<?php

namespace GSRO\Multilanguage\Service;

class MultilanguageDemoService implements MultilanguageServiceInterface
{
    /**
     * @param string $languageCode
     * @return array
     */
    public function getAllBlocks($languageCode)
    {
        return [
            'demo' => [
                'welcome' => [
                    'pageTitle' => 'Welcome to GSRO\\Multilanguage',
                    'paragraph1' => 'Selected language ' . $languageCode . '<hr/>' .
                    'This is a demo of how multilanguage works, please switch to MultilanguageService class'
                ]
            ]
        ];
    }

    /**
     * Verify if language exists
     *
     * @param string $languageCode
     * @return bool
     */
    public function hasLanguage(string $languageCode)
    {
        return true;
    }

    /**
     * Return default language code
     * @return string
     */
    public function getDefaultLanguageCode(): string
    {
        return 'en';
    }
}
