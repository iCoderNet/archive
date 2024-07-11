<?php

namespace App\Helpers;

class HtmlTruncate
{
    public static function truncate($text, $length = 100)
    {
        if (empty($text)) {
            return '';
        }

        $doc = new \DOMDocument();
        @$doc->loadHTML(mb_convert_encoding($text, 'HTML-ENTITIES', 'UTF-8'));
        $doc->encoding = 'UTF-8';
        $totalLength = 0;
        $truncatedText = '';

        foreach ($doc->childNodes as $node) {
            $result = self::truncateNode($node, $length - $totalLength);
            $totalLength += $result['length'];
            $truncatedText .= $result['html'];
            if ($totalLength >= $length) {
                break;
            }
        }

        return $truncatedText;
    }

    private static function truncateNode($node, $length)
    {
        $html = '';
        $nodeLength = 0;

        if ($node instanceof \DOMText) {
            $nodeValue = mb_substr($node->nodeValue, 0, $length);
            $nodeLength = mb_strlen($nodeValue);
            $html = htmlspecialchars($nodeValue, ENT_QUOTES, 'UTF-8');
        } else {
            $openTag = '<' . $node->nodeName;
            if ($node->hasAttributes()) {
                foreach ($node->attributes as $attribute) {
                    $openTag .= ' ' . $attribute->nodeName . '="' . htmlspecialchars($attribute->nodeValue, ENT_QUOTES, 'UTF-8') . '"';
                }
            }
            $openTag .= '>';

            $html = $openTag;
            foreach ($node->childNodes as $childNode) {
                $result = self::truncateNode($childNode, $length - $nodeLength);
                $nodeLength += $result['length'];
                $html .= $result['html'];
                if ($nodeLength >= $length) {
                    break;
                }
            }

            $html .= '</' . $node->nodeName . '>';
        }

        return ['html' => $html, 'length' => $nodeLength];
    }
}
