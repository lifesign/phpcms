<?php
/**
 * 广告模板配置函数
 */
function get_types() {

	//如果没有读取到对应站点的广告模板缓存，则从配置文件取
	//如需增加模板统一在配置文件中添加，子站点则可以通过模板配置以及templates下对应的风格覆盖主站点的模板。
	$poster_cache_name = 'poster_template_'.get_siteid();

	$poster_template = getcache($poster_cache_name, 'commons');

	if (empty($poster_template)) {
		$poster_template = pc_base::load_config('poster');
		setcache($poster_cache_name, $poster_template, 'commons');
	}

	$TYPES = array();
	if (is_array($poster_template) && !empty($poster_template)){
		foreach ($poster_template as $k => $template) {
			$TYPES[$k] = $template['name'];
		}
	}

	return $TYPES;
}
