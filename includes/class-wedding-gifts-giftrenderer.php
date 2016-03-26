<?php

/**
 * Created by PhpStorm.
 * User: tspycher
 * Date: 21/03/16
 * Time: 21:58
 */
class Wedding_Gifts_Renderer {

    public function render_all_gifts() {
        $result = array();
        foreach(Wedding_Gifts_Entity::findAll() as $gift) {
            $result[] = $this->render_gift($gift);
        }
        return $this->template('gifts', $result);
    }

    public function render_gift(Wedding_Gifts_Entity $gift) {
        return $this->template('gift', $gift);
    }

    public function template($template_name, $data = null, $type = 'public') {
        ob_start();
        global $current_user;
        global $gift_notifications;

        include(sprintf('%s%s/partials/%s.php',plugin_dir_path( dirname( __FILE__ ) ),$type,$template_name));
        return ob_get_clean();
    }
}