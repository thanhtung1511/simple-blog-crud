<?php

namespace App\Helpers\General;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\HtmlString;

class HtmlHelper
{
    /**
     * The URL generator instance.
     *
     * @var UrlGenerator
     */
    protected $url;

    /**
     * HtmlHelper constructor.
     *
     * @param UrlGenerator|null $url
     */
    public function __construct(UrlGenerator $url = null)
    {
        $this->url = $url;
    }

    /**
     * @param       $url
     * @param array $attributes
     * @param null  $secure
     *
     * @return mixed
     */
    public function style($url, $attributes = [], $secure = null)
    {
        $defaults = ['media' => 'all', 'type' => 'text/css', 'rel' => 'stylesheet'];

        $attributes = $attributes + $defaults;

        $attributes['href'] = $this->url->asset($url, $secure);

        return $this->toHtmlString('<link'.$this->attributes($attributes).'>'.PHP_EOL);
    }

    /**
     * Generate a link to a JavaScript file.
     *
     * @param string $url
     * @param array  $attributes
     * @param bool   $secure
     *
     * @return HtmlString
     */
    public function script($url, $attributes = [], $secure = null)
    {
        $attributes['src'] = $this->url->asset($url, $secure);

        return $this->toHtmlString('<script'.$this->attributes($attributes).'></script>'.PHP_EOL);
    }

    /**
     * @param        $cancel_to
     * @param        $title
     * @param string $classes
     *
     * @return HtmlString
     */
    public function formCancel($cancel_to, $title, $classes = 'btn btn-danger btn-sm')
    {
        return html()->a($cancel_to, $title)->class($classes);
    }

    /**
     * @param        $title
     * @param string $classes
     *
     * @return HtmlString
     */
    public function formSubmit($title, $classes = 'btn btn-success btn-sm pull-right')
    {
        return html()->submit($title)->class($classes);
    }

    /**
     * Build an HTML attribute string from an array.
     *
     * @param array $attributes
     *
     * @return string
     */
    public function attributes($attributes)
    {
        $html = [];

        foreach ((array) $attributes as $key => $value) {
            $element = $this->attributeElement($key, $value);

            if (! is_null($element)) {
                $html[] = $element;
            }
        }

        return count($html) > 0 ? ' '.implode(' ', $html) : '';
    }

    /**
     * Build a single attribute element.
     *
     * @param string $key
     * @param string $value
     *
     * @return string
     */
    protected function attributeElement($key, $value)
    {
        if (is_numeric($key)) {
            return $value;
        }

        if (is_bool($value) && $key != 'value') {
            return $value ? $key : '';
        }

        if (! is_null($value)) {
            return $key.'="'.e($value).'"';
        }
    }

    /**
     * Transform the string to an Html serializable object.
     *
     * @param $html
     *
     * @return HtmlString
     */
    protected function toHtmlString($html)
    {
        return new HtmlString($html);
    }
}
