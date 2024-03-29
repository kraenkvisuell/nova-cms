<?php

namespace Kraenkvisuell\NovaCms;

use Kraenkvisuell\NovaCms\Models\Page;
use Kraenkvisuell\NovaCms\ProxyObject;

class ContentParser
{
    public function produceAttributes($fieldAttributes)
    {
        $attributes = [];

        foreach ($fieldAttributes as $key => $value) {
            $attributes[$key] = $this->produceAttribute($value);
        }

        return new ProxyObject((object) $attributes);
    }

    public function produceAttribute($value)
    {
        if (is_string($value)) {
            if (substr($value, 0, 2) == '[{') {
                $value = json_decode($value);
            } else {
                return nova_cms_magify_links($value, config('nova-cms.content.open_urls_in_new_tab'));
            }
        }

        if (is_object($value)) {
            return $this->getTranslatedObject($value);
        }

        if (is_array($value)) {
            $newValue = [];
            foreach ($value as $item) {
                $newValue[] = $this->produceNestedAttribute($item);
            }

            return $newValue;
        }

        return $value;
    }

    protected function produceNestedAttribute($item)
    {
        if (is_string($item)) {
            return $item;
        }

        if (is_array($item) && @$item['key'] && @$item['attributes'] && @$item['layout']) {
            $item = (object) $item;
        }

        if (is_object($item) && @$item->key && @$item->attributes && @$item->layout) {
            $value = [
                'layout' => $item->layout,
            ];

            foreach ($item->attributes as $attributeKey => $attributeValue) {
                $value[$attributeKey] = $attributeValue;

                if (is_array($attributeValue)) {
                    $value[$attributeKey] = [];
                    foreach ($attributeValue as $arrayItem) {
                        $value[$attributeKey][] = $this->produceNestedAttribute($arrayItem);
                    }
                }

                if ($attributeKey == 'link_page_id') {
                    $page = Page::find($attributeValue);
                    if ($page) {
                        $value['page_link_url'] = route('nova-page-single', [$page->slug]);
                        $value['page_link_type'] = $page->page_type;
                    }
                }

                if (is_object($attributeValue)) {
                    $value[$attributeKey] = $this->getTranslatedObject($attributeValue);
                }
            }

            return new ProxyObject((object) $value);
        }

        return $item;
    }

    protected function getTranslatedObject($value)
    {
        if (@$value->{app()->getLocale()}) {
            return nova_cms_magify_links($value->{app()->getLocale()}, config('nova-cms.content.open_urls_in_new_tab'));
        }

        if (@$value->{config('translatable.fallback_locale')}) {
            return nova_cms_magify_links($value->{config('translatable.fallback_locale')}, config('nova-cms.content.open_urls_in_new_tab'));
        }

        return '';
    }
}
