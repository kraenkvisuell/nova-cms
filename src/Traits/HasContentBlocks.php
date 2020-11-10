<?php

namespace Kraenkvisuell\NovaCms\Traits;

trait HasContentBlocks
{
    public function contentBlocks($field = null)
    {
        if (!$field) {
            $field = $this->contentBlockFields[0] ?? 'content';
        }

        $contentBlocks = collect([]);

        $this->{$field}->each(function ($item) use (&$contentBlocks) {
            $contentBlocks->push(
                (object) [
                    'block' => $item->name(),
                    'field' => $this->produceAttributes($item->getAttributes()),
                ]
            );
        });

        return $contentBlocks;
    }

    protected function produceAttributes($fieldAttributes)
    {
        $attributes = [];

        foreach ($fieldAttributes as $key => $value) {
            $attributes[$key] = $this->produceAttribute($value);
        }

        return (object) $attributes;
    }

    protected function produceAttribute($value)
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
