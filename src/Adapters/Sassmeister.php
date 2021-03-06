<?php

/**
 * Adapter to generate embed code from SassMeister.
 */
namespace Embed\Adapters;

use Embed\Request;

class Sassmeister extends Webpage implements AdapterInterface
{
    /**
     * {@inheritdoc}
     */
    public static function check(Request $request)
    {
        return $request->isValid() && $request->match([
            'http://sassmeister.com/gist/*',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getCode()
    {
        $id = $this->request->getDirectoryPosition(1);

        return "<p class=\"sassmeister\" data-gist-id=\"{$id}\" data-height=\"480\" data-theme=\"tomorrow\">" .
               "<a href=\"http://sassmeister.com/gist/{$id}\">Play with this gist on SassMeister.</a>" .
               "</p>" .
               "<script src=\"http://cdn.sassmeister.com/js/embed.js\" async></script>";
    }
}
