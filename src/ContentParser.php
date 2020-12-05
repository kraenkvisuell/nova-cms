<?php

namespace Kraenkvisuell\NovaCms;

class ContentParser
{
    public function produceAttribute($value)
    {
        if (is_string($value)) {
            return $value;
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

                if (is_object($attributeValue)) {
                    $value[$attributeKey] = $this->getTranslatedObject($attributeValue);
                }
            }

            return (object) $value;
        }

        return $item;
    }

    protected function getTranslatedObject($value)
    {
        if (@$value->{app()->getLocale()}) {
            return $value->{app()->getLocale()};
        }

        if (@$value->{config('translatable.fallback_locale')}) {
            return $value->{config('translatable.fallback_locale')};
        }

        return '';
    }
}
