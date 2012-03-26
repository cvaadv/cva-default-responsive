<?php

class WP_LESS_Styles extends WP_Dependencies {
	var $base_url;
	var $content_url;
	var $default_version;
	var $text_direction = 'ltr';
	var $concat = '';
	var $concat_version = '';
	var $do_concat = false;
	var $print_html = '';
	var $default_dirs;

	function __construct() {
		do_action_ref_array( 'wp_default_less_styles', array(&$this) );
	}

	function do_item( $handle ) {
		if ( !parent::do_item($handle) )
			return false;

		if ( null === $this->registered[$handle]->ver )
			$ver = '';
		else
			$ver = $this->registered[$handle]->ver ? $this->registered[$handle]->ver : $this->default_version;

		if ( isset($this->args[$handle]) )
			$ver = $ver ? $ver . '&amp;' . $this->args[$handle] : $this->args[$handle];

		if ( $this->do_concat ) {
			if ( $this->in_default_dir($this->registered[$handle]->src) && !isset($this->registered[$handle]->extra['conditional']) && !isset($this->registered[$handle]->extra['alt']) ) {
				$this->concat .= "$handle,";
				$this->concat_version .= "$handle$ver";
				return true;
			}
		}

		if ( isset($this->registered[$handle]->args) )
			$media = esc_attr( $this->registered[$handle]->args );
		else
			$media = 'all';

		$href = $this->_css_href( $this->registered[$handle]->src, $ver, $handle );
		$rel = isset($this->registered[$handle]->extra['alt']) && $this->registered[$handle]->extra['alt'] ? 'alternate stylesheet' : 'stylesheet/less';
		$title = isset($this->registered[$handle]->extra['title']) ? "title='" . esc_attr( $this->registered[$handle]->extra['title'] ) . "'" : '';

		$end_cond = $tag = '';
		if ( isset($this->registered[$handle]->extra['conditional']) && $this->registered[$handle]->extra['conditional'] ) {
			$tag .= "<!--[if {$this->registered[$handle]->extra['conditional']}]>\n";
			$end_cond = "<![endif]-->\n";
		}

		$tag .= apply_filters( 'style_loader_tag', "<link rel='$rel' href='$href' media='screen' />\n", $handle );
		if ( 'rtl' === $this->text_direction && isset($this->registered[$handle]->extra['rtl']) && $this->registered[$handle]->extra['rtl'] ) {
			if ( is_bool( $this->registered[$handle]->extra['rtl'] ) ) {
				$suffix = isset( $this->registered[$handle]->extra['suffix'] ) ? $this->registered[$handle]->extra['suffix'] : '';
				$rtl_href = str_replace( "{$suffix}.css", "-rtl{$suffix}.css", $this->_css_href( $this->registered[$handle]->src , $ver, "$handle-rtl" ));
			} else {
				$rtl_href = $this->_css_href( $this->registered[$handle]->extra['rtl'], $ver, "$handle-rtl" );
			}

			$tag .= apply_filters( 'style_loader_tag', "<link rel='$rel' id='$handle-rtl-css' $title href='$rtl_href' type='text/css' media='$media' />\n", $handle );
		}

		$tag .= $end_cond;

		if ( $this->do_concat )
			$this->print_html .= $tag;
		else
			echo $tag;

		return true;
	}

	function all_deps( $handles, $recursion = false, $group = false ) {
		$r = parent::all_deps( $handles, $recursion );
		if ( !$recursion )
			$this->to_do = apply_filters( 'print_less_styles_array', $this->to_do );
		return $r;
	}

	function _css_href( $src, $ver, $handle ) {
		if ( !is_bool($src) && !preg_match('|^https?://|', $src) && ! ( $this->content_url && 0 === strpos($src, $this->content_url) ) ) {
			$src = $this->base_url . $src;
		}

		if ( !empty($ver) )
			$src = add_query_arg('ver', $ver, $src);
		$src = apply_filters( 'style_loader_src', $src, $handle );
		return esc_url( $src );
	}

	function in_default_dir($src) {
		if ( ! $this->default_dirs )
			return true;

		foreach ( (array) $this->default_dirs as $test ) {
			if ( 0 === strpos($src, $test) )
				return true;
		}
		return false;
	}

}

