<?php
if (! function_exists('app_path')) {
	/**
	 * Get the path to the application folder.
	 *
	 * @param  string  $path
	 * @return string
	 */
	function app_path($path = '')
	{
		return app('path').($path ? DIRECTORY_SEPARATOR.$path : $path);
	}
}

return [
    'lumen_model_namespace'       			=> 'App\Models',
    'lumen_ctrl_namespace'       			=> 'App\Http\Controllers',
    'base_class_lumen_model_name' 			=> \Xiashaung\LumenGenerator\Model\MicroServiceExtendModel::class,
    'base_class_lumen_model_oracle_name' 	=> \Xiashaung\LumenGenerator\Model\MicroServiceExtendOracleModel::class,
    'base_class_lumen_ctrl_name' 			=> \Xiashaung\LumenGenerator\Controller\CrudExtendController::class,
    'lumen_model_output_path'     			=> app_path() . '/Models',
    'lumen_ctrl_output_path'      			=> app_path() . '/Http/Controllers',
    'base_class_angular_model_name' 		=> 'BaseModel',
    'base_class_angular_model_from' 		=> '../base-model',
    'no_timestamps'   						=> null,
    'date_format'     						=> null,
	'connection'      						=> null,
	'add_route'      						=> null,
	'add_cache'      						=> null,

];
