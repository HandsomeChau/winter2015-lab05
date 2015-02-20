<?php

/**
 * Contains hook functions.
 *
 * hooks/Hooks.php
 *
 * Thanks to Dan Buhler!
 */
class Hooks
{
    /**
     * Bolds all capitalized words within paragraph elements of class "lead" by
     * enclosing them in "strong" tags.
     */
    function displayOverride()
    {
        $this->CI =& get_instance();
        $output = $this->CI->output->get_output();
        $matches = array();

        // Define the pattern for a <p> element with attribute class="lead".
        $pattern = '/(<p\s+([^>]+\s)?class\s*=\s*"lead"\s*>)'
            . '(?P<content>[^<]+)(<\\/p\s*>)/';

        // Search the output for <p> elements and store them in $matches.
        preg_match_all( $pattern, $output, $matches );

        // Define the pattern for a word that starts with a capital letter. The
        // capital letter must not be preceded by anything other than a non-word
        // character (e.g. punctuation or whitespace), and is followed by zero
        // or more word characters.
        // Note: This pattern will not work correctly if HTML codes for special
        // characters (e.g. accents) are used. A way more complex pattern would
        // be needed to cover these special cases.
        $pattern = '/(^|\W)([A-Z]\w*)/';
        $replace = '$1<strong>$2</strong>';

        // Loop through the content of all <p> elements and update them.
        foreach ( $matches['content'] as $line ) {
            $newline = preg_replace( $pattern, $replace, $line );
            $output = str_replace( $line, $newline, $output );
        }

        echo $output;
    }
}


/* End of file Hooks.php */
/* Location: application/hooks/Hooks.php */