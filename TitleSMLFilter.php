<?php

include_once(dirname(__FILE__).'/ASMLFilter.php');

/**
 * Created by IntelliJ IDEA.
 * User: valdar
 * Date: 9/16/12
 * Time: 5:23 PM
 * To change this template use File | Settings | File Templates.
 */
class TitleSMLFilter extends ASMLFilter
{
    public function __construct($language="") {
        parent::__consruct($language);
    }

    /**
     * Filters the body in order to display only the selected language, or default if not specified
     *
     * @param string $content The post's body to be filtered
     * @return string
     */
    public function filter($content) {
        global $wp_query;
        if (isset($wp_query->query_vars['lng'])) {
            $lang =  $wp_query->query_vars['lng'];
        }
        else {
            $lang = $this->_defaultLanguage;
        }

        return $this->filterDOM($content, $lang)[0];
    }
}
