<?php
/**
 * Alert Helper Class
 *
 * @author Roberto Cipriani <roberto@robertodev.com>
 * @package pizza
 */


namespace Pizza\Helper;

class Alert
{

    /**
     *
     *
     * @param $message
     * @param string $type
     * @return string $alert
     */
    public static function renderAlert($message, $type = 'success')
    {
        $alert = '<div class="alert alert-'. $type .'">';
        $alert .= $message;
        $alert .= '</div>';

        return $alert;
    }

	/**
	 *
	 *
	 * @param object $messages
	 * @return str $alert
	 */
	public static function renderValidationAlert($messages)
	{
		$alert = '';

		foreach ($messages->all() as $message) {
			$alert .= '<div class="alert alert-danger">';
			$alert .= $message;
			$alert .= '</div>';
		}

		return $alert;
	}
}
