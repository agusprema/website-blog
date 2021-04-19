<?php

namespace app\helpers;

use EditorJS\EditorJS;
use EditorJS\EditorJSException;
use Illuminate\Support\Facades\Route;

class CodexToHtml
{
    /**
     * HTML callbacks, used for extending render functionality.
     */
    protected static $hasBootedHtmlCallbacks = false;
    protected static $htmlRenderCallbacks = [];

    /**
     * @param string|mixed $jsonData
     * @return string
     * @throws \Throwable
     */
    public static function generateHtmlOutput($jsonData): string
    {
        if (empty($jsonData)) {
            return '';
        }

        // Clean non-string data
        if (!is_string($jsonData)) {
            $newData = json_encode($jsonData);
            if (json_last_error() === \JSON_ERROR_NONE) {
                $jsonData = $newData;
            }
        }

        $config = config('editor.validationSettings');

        static::bootHtmlCallbacks();

        try {
            // Initialize Editor backend and validate structure
            $editor = new EditorJS($jsonData, json_encode($config));

            // Get sanitized blocks (according to the rules from configuration)
            $blocks = $editor->getBlocks();

            $htmlOutput = '';

            foreach ($blocks as $block) {
                if (isset(static::$htmlRenderCallbacks[$block['type']])) {
                    $htmlOutput .= (static::$htmlRenderCallbacks[$block['type']])($block);
                }
            }

            // return html_entity_decode(
            //     view('vendor.editor.content', ['content' => $htmlOutput])->render()
            // );
            return html_entity_decode($htmlOutput);
        } catch (EditorJSException $e) {
            // process exception
            return 'Something went wrong: ' . $e->getMessage();
        }
    }

    /**
     * @param $blockData
     * @return string
     */
    public static function calculateImageClasses($blockData)
    {
        $classes = [];
        foreach ($blockData as $key => $data) {
            if (is_bool($data) && $data === true) {
                $classes[] = $key;
            }
        }

        return implode(' ', $classes);
    }

    /**
     * Boots the HTML callbacks, as to allow extension
     * of HTML output for custom blocks
     *
     * @return void
     */
    protected static function bootHtmlCallbacks()
    {
        if (static::$hasBootedHtmlCallbacks) return;

        static::$htmlRenderCallbacks['header'] = function ($block) {
            return view('vendor.editor.heading', $block['data'])->render();
        };

        static::$htmlRenderCallbacks['paragraph'] = function ($block) {
            return view('vendor.editor.paragraph', $block['data'])->render();
        };

        static::$htmlRenderCallbacks['list'] = function ($block) {
            return view('vendor.editor.list', $block['data'])->render();
        };

        static::$htmlRenderCallbacks['image'] = function ($block) {
            $block['data']['classes'] = CodexToHtml::calculateImageClasses($block['data']);
            return view('vendor.editor.image', $block['data'])->render();
        };

        static::$htmlRenderCallbacks['inlineImage'] = function ($block) {
            $block['data']['classes'] = CodexToHtml::calculateImageClasses($block['data']);
            return view('vendor.editor.imageurl', $block['data'])->render();
        };

        static::$htmlRenderCallbacks['code'] = function ($block) {
            return view('vendor.editor.code', $block['data'])->render();
        };

        static::$htmlRenderCallbacks['linkTool'] = function ($block) {
            return view('vendor.editor.link', $block['data'])->render();
        };

        static::$htmlRenderCallbacks['checklist'] = function ($block) {
            return view('vendor.editor.checklist', $block['data'])->render();
        };

        static::$htmlRenderCallbacks['delimiter'] = function ($block) {
            return view('vendor.editor.delimiter', $block['data'])->render();
        };

        static::$htmlRenderCallbacks['table'] = function ($block) {
            return view('vendor.editor.table', $block['data'])->render();
        };

        static::$htmlRenderCallbacks['raw'] = function ($block) {
            return view('vendor.editor.raw', $block['data'])->render();
        };

        static::$htmlRenderCallbacks['embed'] = function ($block) {
            return view('vendor.editor.embed', $block['data'])->render();
        };

        static::$hasBootedHtmlCallbacks = true;
    }

    public static function instance()
    {
        return new CodexToHtml();
    }
}
