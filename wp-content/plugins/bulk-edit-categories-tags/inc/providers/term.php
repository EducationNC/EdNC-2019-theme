<?php

class VGSE_Provider_Term {

	static private $instance = false;
	var $key = 'term';
	var $is_post_type = false;
	static $data_store = array();
	var $terms_with_levels = array();

	private function __construct() {
		
	}

	function get_provider_read_capability($post_type_key) {
		return $this->get_provider_edit_capability($post_type_key);
	}

	function get_provider_edit_capability($post_type_key) {
		if (!taxonomy_exists($post_type_key)) {
			return false;
		}
		$tax = get_taxonomy($post_type_key);
		return $tax->cap->edit_terms;
	}

	function init() {
		
	}

	function get_total($post_type = null) {
		$result = wp_count_terms($post_type, array(
			'hide_empty' => false,
		));
		return (int) $result;
	}

	/**
	 * Creates or returns an instance of this class.
	 *
	 * @return  Foo A single instance of this class.
	 */
	static function get_instance() {
		if (null == VGSE_Provider_Term::$instance) {
			VGSE_Provider_Term::$instance = new VGSE_Provider_Term();
			VGSE_Provider_Term::$instance->init();
		}
		return VGSE_Provider_Term::$instance;
	}

	function get_post_data_table_id_key($post_type = null) {
		if (!$post_type) {
			$post_type = VGSE()->helpers->get_provider_from_query_string();
		}

		$post_id_key = apply_filters('vgse_sheet_editor/provider/term/post_data_table_id_key', 'term_id', $post_type);
		if (!$post_id_key) {
			$post_id_key = 'term_id';
		}
		return $post_id_key;
	}

	function get_meta_table_post_id_key($post_type = null) {
		if (!$post_type) {
			$post_type = VGSE()->helpers->get_provider_from_query_string();
		}

		$post_id_key = apply_filters('vgse_sheet_editor/provider/term/meta_table_post_id_key', 'term_id', $post_type);
		if (!$post_id_key) {
			$post_id_key = 'term_id';
		}
		return $post_id_key;
	}

	function get_meta_table_name($post_type = null) {
		global $wpdb;
		if (!$post_type) {
			$post_type = VGSE()->helpers->get_provider_from_query_string();
		}

		$table_name = apply_filters('vgse_sheet_editor/provider/term/meta_table_name', $wpdb->termmeta, $post_type);
		if (!$table_name) {
			$table_name = $wpdb->termmeta;
		}
		return $table_name;
	}

	function prefetch_data($post_ids, $post_type, $spreadsheet_columns) {
		
	}

	function get_item_terms($id, $taxonomy) {
		return false;
	}

	function get_statuses() {
		return array();
	}

	function get_items($query_args) {
		$post_keys_to_remove = array(
			'post_status',
			'author',
			'tax_query',
		);
		foreach ($post_keys_to_remove as $post_key_to_remove) {
			if (isset($query_args[$post_key_to_remove])) {
				unset($query_args[$post_key_to_remove]);
			}
		}

		$taxonomy = $query_args['post_type'];
		$query_args['hide_empty'] = false;
		$query_args['update_term_meta_cache'] = false;
		if (isset($query_args['post_type'])) {
			$query_args['taxonomy'] = $query_args['post_type'];
		}
		if (isset($query_args['posts_per_page'])) {
			$query_args['number'] = $per_page = $query_args['posts_per_page'];
		}
		if (isset($query_args['paged']) && isset($query_args['number'])) {
			$query_args['offset'] = $start = ( $query_args['paged'] - 1 ) * $query_args['number'];
		}

		if (isset($query_args['post__in'])) {
			$query_args['include'] = $query_args['post__in'];
		}
		if (isset($query_args['post__not_in'])) {
			$query_args['exclude_tree'] = $query_args['post__not_in'];
		}
		if (!empty($query_args['s'])) {
			$query_args['search'] = $query_args['s'];
		}
		if (!empty($query_args['post__in'])) {
			$per_page = count($query_args['post__in']);
		}

		if (is_taxonomy_hierarchical($query_args['taxonomy'])) {
			// We'll need the full set of terms then.
			$query_args['number'] = $query_args['offset'] = 0;
		}

		$terms = get_terms($query_args);

		if (is_taxonomy_hierarchical($query_args['taxonomy'])) {
			$total_terms = count($terms);
		}

		// Get total count for pagination
		if (empty($total_terms)) {
			$query_args['number'] = '';
			$query_args['fields'] = 'ids';
			$total_terms = count(get_terms($query_args));
		}

		// If the query has include parameter, it means it was a specific search
		// so we activate the search flag so prepare_terms_list won't remove our search results
		if (!empty($query_args['include'])) {
			$query_args['search'] = true;
		}
		if (is_taxonomy_hierarchical($taxonomy) && (empty($query_args['fields']) || $query_args['fields'] !== 'ids')) {
			if (!empty($query_args['search']) || !empty($query_args['wpse_term_parents'])) {// Ignore children on searches.
				$children = array();
			} else {
				$children = _get_term_hierarchy($taxonomy);
			}

			$count = 0;
			$terms_with_levels = $this->prepare_terms_list($taxonomy, $terms, $children, $start, $per_page, $count, $query_args);
			$this->terms_with_levels = array_combine(wp_list_pluck($terms_with_levels, 'term_id'), $terms_with_levels);
			$terms = wp_list_pluck($this->terms_with_levels, 'term');
			add_filter('vg_sheet_editor/load_rows/full_output', array($this, 'append_terms_with_levels'), 10, 2);
		}

		$out = (object) array();
		$out->found_posts = $total_terms;
		$out->posts = array();
		if (!empty($terms)) {
			foreach ($terms as $term) {
				if (is_object($term)) {
					$term = $this->_standarize_item($term);
					$out->posts[] = $term;
				} else {
					$out->posts[] = $term;
				}
			}
		}
		return $out;
	}

	function append_terms_with_levels($out, $wp_query_args) {
		if (taxonomy_exists($wp_query_args['post_type']) && is_taxonomy_hierarchical($wp_query_args['post_type'])) {
			$out['terms_with_levels'] = $this->terms_with_levels;
		}
		return $out;
	}

	function prepare_terms_list($taxonomy, $terms, &$children, $start, $per_page, &$count, $query_args, $parent = 0, $level = 0) {

		$end = $start + $per_page;
		$new_terms = array();
		foreach ($terms as $key => $term) {

			if ($count >= $end) {
				break;
			}

			if ($term->parent != $parent && empty($query_args['search']) && empty($query_args['wpse_term_parents'])) {
				continue;
			}

			// If the page starts in a subtree, print the parents.
			if ($count == $start && $term->parent > 0 && empty($query_args['search']) && empty($query_args['wpse_term_parents'])) {
				$my_parents = $parent_ids = array();
				$p = $term->parent;
				while ($p) {
					$my_parent = get_term($p, $taxonomy);
					$my_parents[] = $my_parent;
					$p = $my_parent->parent;
					if (in_array($p, $parent_ids)) { // Prevent parent loops.
						break;
					}
					$parent_ids[] = $p;
				}
				unset($parent_ids);

				$num_parents = count($my_parents);
				while ($my_parent = array_pop($my_parents)) {
					$new_terms[] = array(
						'term' => $my_parent,
						'level' => $level - $num_parents,
						'term_id' => $my_parent->term_id
					);
					$num_parents--;
				}
			}

			if ($count >= $start) {
				$new_terms[] = array(
					'term' => $term,
					'level' => $level,
					'term_id' => $term->term_id
				);
			}

			++$count;

			unset($terms[$key]);

			if (isset($children[$term->term_id]) && empty($query_args['search']) && empty($query_args['wpse_term_parents'])) {
				$new_terms = array_merge($new_terms, $this->prepare_terms_list($taxonomy, $terms, $children, $start, $per_page, $count, $query_args, $term->term_id, $level + 1));
			}
		}
		return $new_terms;
	}

	function _standarize_item($item, $context = 'read') {
		if ($context === 'read') {
			$item->post_type = $item->taxonomy;
			$item->ID = $item->term_id;
			$item->post_title = $item->name;
			$item->post_name = $item->slug;
			$item->wpse_term_levels = isset($this->terms_with_levels[$item->term_id]) ? $this->terms_with_levels[$item->term_id]['level'] : '';
		} elseif ($context === 'save') {
			if (isset($item['post_title'])) {
				$item['name'] = $item['post_title'];
				unset($item['post_title']);
			}
			if (isset($item['post_name'])) {
				$item['slug'] = $item['post_name'];
				unset($item['post_name']);
			}
			if (isset($item['post_parent'])) {
				$item['parent'] = $item['post_parent'];
				unset($item['post_parent']);
			}
			if (isset($item['post_description'])) {
				$item['description'] = $item['post_description'];
				unset($item['post_description']);
			}
		}
		return $item;
	}

	function get_item($id, $format = null) {
		$term = get_term_by('term_id', $id, VGSE()->helpers->get_provider_from_query_string());

		if (!empty($term)) {
			$term = $this->_standarize_item($term);
		}
		if ($format == ARRAY_A) {
			$term = (array) $term;
		}
		return apply_filters('vg_sheet_editor/provider/term/get_item', $term, $id, $format);
	}

	function get_item_meta($id, $key, $single = true, $context = 'save') {
		return apply_filters('vg_sheet_editor/provider/term/get_item_meta', get_term_meta($id, $key, $single), $id, $key, $single, $context);
	}

	function get_item_data($id, $key) {
		$item = $this->get_item($id);
		if (isset($item->$key)) {
			$out = htmlspecialchars_decode(apply_filters('vg_sheet_editor/provider/term/get_item_data', $item->$key, $id, $key, true, 'read', $item));
		} else {
			$out = $this->get_item_meta($id, $key, true, 'read');
		}

		return $out;
	}

	function update_item_data($values, $wp_error = false) {
		global $wpdb;

		if (!empty($values['taxonomy'])) {
			$taxonomy = $values['taxonomy'];
		} else {
			$taxonomy = VGSE()->helpers->get_provider_from_query_string();
		}

		if (!empty($values['parent']) && !is_numeric($values['parent'])) {
			$parent_term = get_term_by('name', $values['parent'], $taxonomy);

			// If parent term doesn't exist, auto create it
			if (is_wp_error($parent_term) || !$parent_term) {
				wp_insert_term($values['parent'], $taxonomy);
				$parent_term = get_term_by('name', $values['parent'], $taxonomy);
			}
			$values['parent'] = $parent_term->term_id;
		}

		if ($values['ID'] === PHP_INT_MAX) {
			$values['ID'] = $this->create_item(array('post_type' => $taxonomy));
		}
		if (empty($values['ID'])) {
			return new WP_Error('wpse', __('The item id does not exist. Error #89827j', vgse_taxonomy_terms()->textname));
		}

		$values = $this->_standarize_item($values, 'save');
		$term_id = (int) $values['ID'];
		unset($values['ID']);
		$item = $this->get_item($term_id, ARRAY_A);

		$result = wp_update_term($term_id, $item['taxonomy'], $values);

		if (!empty($values['taxonomy']) && $values['taxonomy'] !== $item['taxonomy']) {
			$wpdb->update(
					$wpdb->prefix . 'term_taxonomy', array('taxonomy' => $values['taxonomy']), array('term_id' => $term_id), array('%s'), array('%d')
			);
		}

		if (!empty($values['wpse_status']) && $values['wpse_status'] === 'delete') {
			$delete_result = wp_delete_term($term_id, $item['taxonomy']);
			VGSE()->deleted_rows_ids[] = (int) $term_id;
		}

		if (!is_wp_error($result)) {
			$result = $term_id;
		}

		return $result;
	}

	function update_item_meta($id, $key, $value) {
		return update_term_meta($id, $key, $value);
	}

	function set_object_terms($post_id, $terms_saved, $key) {
		return;
	}

	function get_object_taxonomies($post_type = null) {
		return get_taxonomies(array(), 'objects');
	}

	function get_random_string($length, $spChars = false) {
		$alpha = 'abcdefghijklmnopqrstwvxyz';
		$alphaUp = strtoupper($alpha);
		$num = '12345678901234567890';
		$sp = '@/+.*-\$#!)[';
		$thread = $alpha . $alphaUp . $num;
		if ($spChars) {
			$thread .= $sp;
		}
		$str = '';
		for ($i = 0; $i < $length; $i++) {
			$str .= $thread[mt_rand(0, strlen($thread) - 1)];
		}
		return $str;
	}

	function create_item($values) {

		$random = $this->get_random_string(15);
		$result = wp_insert_term(
				'...', // the term 
				$values['post_type'], // the taxonomy
				array(
			'slug' => 'tmp-' . $random,
				)
		);
		$out = ( is_wp_error($result)) ? null : $result['term_id'];
		return $out;
	}

	function get_item_ids_by_keyword($keyword, $post_type, $operator = 'LIKE') {
		global $wpdb;
		$operator = ( $operator === 'LIKE') ? 'LIKE' : 'NOT LIKE';
		$joiner = ( $operator === 'LIKE') ? 'OR' : 'AND';

		$checks = array();
		$keywords = array_map('trim', explode(';', $keyword));
		foreach ($keywords as $single_keyword) {
			$checks[] = " name $operator '%" . esc_sql($single_keyword) . "%' ";
		}

		$sql = "SELECT t.*, tt.*
FROM $wpdb->terms AS t 
INNER JOIN $wpdb->term_taxonomy AS tt
ON t.term_id = tt.term_id
WHERE tt.taxonomy IN ('" . esc_sql($post_type) . "') AND ( " . implode(" $joiner ", $checks) . " ) 
ORDER BY t.name ASC ";
		$ids = $wpdb->get_col($sql);
		return $ids;
	}

	function get_meta_object_id_field($field_key, $column_settings) {
		$post_meta_post_id_key = $this->get_meta_table_post_id_key();
		return $post_meta_post_id_key;
	}

	function get_table_name_for_field($field_key, $column_settings) {
		global $wpdb;

		$terms_columns = wp_list_pluck($wpdb->get_results("SHOW COLUMNS FROM $wpdb->terms;"), 'Field');
		$term_taxonomy_columns = wp_list_pluck($wpdb->get_results("SHOW COLUMNS FROM $wpdb->term_taxonomy;"), 'Field');

		if (in_array($field_key, $terms_columns)) {
			$table_name = $wpdb->terms;
		} elseif (in_array($field_key, $term_taxonomy_columns)) {
			$table_name = $wpdb->term_taxonomy;
		} else {
			$table_name = $this->get_meta_table_name();
		}
		return $table_name;
	}

	function get_meta_field_unique_values($meta_key, $post_type) {
		global $wpdb;
		$meta_table = $this->get_meta_table_name($post_type);
		$sql = "SELECT tm.meta_value
FROM $wpdb->terms AS t 
INNER JOIN $wpdb->term_taxonomy AS tt
ON t.term_id = tt.term_id
INNER JOIN $wpdb->term_relationships AS tr
ON tr.term_taxonomy_id = tt.term_taxonomy_id
LEFT JOIN $meta_table AS tm
ON (t.term_id = tm.term_id) 
WHERE tt.taxonomy IN ('" . esc_sql($post_type) . "') AND  tm.meta_key = '" . esc_sql($meta_key) . "' GROUP BY tm.meta_value ORDER BY LENGTH(tm.meta_value) DESC LIMIT 4 ";

		$values = apply_filters('vg_sheet_editor/provider/term/meta_field_unique_values', $wpdb->get_col($sql), $meta_key, $post_type);
		return $values;
	}

	function get_all_meta_fields($post_type = null) {
		global $wpdb;
		$pre_value = apply_filters('vg_sheet_editor/provider/term/all_meta_fields_pre_value', null, $post_type);

		if (is_array($pre_value)) {
			return $pre_value;
		}

		$meta_table = $this->get_meta_table_name($post_type);
		$post_type_query = '';
		if (!empty($post_type)) {
			$post_type_query = " tt.taxonomy IN ('" . esc_sql($post_type) . "') AND  ";
		}

		$meta_keys_sql = "SELECT tm.meta_key
FROM $wpdb->terms AS t 
INNER JOIN $wpdb->term_taxonomy AS tt
ON t.term_id = tt.term_id
LEFT JOIN $meta_table AS tm
ON (t.term_id = tm.term_id) 
WHERE $post_type_query tm.meta_value NOT LIKE 'field_%' AND tm.meta_key NOT LIKE '_oembed%' 
GROUP BY tm.meta_key 
ORDER BY t.name ASC";
		$meta_keys = $wpdb->get_col($meta_keys_sql);
		return apply_filters('vg_sheet_editor/provider/term/all_meta_fields', $meta_keys, $post_type);
	}

}
