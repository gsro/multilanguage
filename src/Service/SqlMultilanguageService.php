<?php

namespace GSRO\Multilanguage\Service;

use Zend\Db\Sql\Sql;

/**
 * Class MultilanguageService
 * @package GSRO\Multilanguage\Service\
 */
class SqlMultilanguageService implements MultilanguageServiceInterface
{
    /**
     * @var Sql
     */
    protected $sql;
    
    /**
     * SqlMultilanguageService constructor.
     * @param Sql $sql
     */
    public function __construct(Sql $sql)
    {
        $this->sql = $sql;
    }

    /**
     * list language content
     * @param string $languageCode
     * @return array
     */
    public function getAllBlocks($languageCode)
    {
        $data = [];
        $where = ['languageCode = ?' => $languageCode];
        $select = $this->sql->select();
        $select->from('multilanguage');
        $select->where($where);
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        
        foreach ($results as $value) {
            $data['ml'][$value['name']] = $value['value'];
        }
        return $data;
    }

    /**
     * Verify if language exists
     *
     * @param string $languageCode
     * @return bool
     */
    public function hasLanguage(string $languageCode)
    {
        $newData = [];
        $where = ['languageCode = ?' => $languageCode];
        $select = $this->sql->select();
        $select->from('multilanguage')->limit(1);
        $select->where($where);
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        foreach ($results as $item) {
            return true;
        }

        return false;
    }

    /**
     * Return default language code
     * @return string
     */
    public function getDefaultLanguageCode(): string
    {
        $newData = [];
        $select = $this->sql->select();
        $select->from('multilanguage')->limit(1);
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        
        foreach ($results as $item) {
            return $item['languageCode'];
        }
    
        return false;
    }
}
