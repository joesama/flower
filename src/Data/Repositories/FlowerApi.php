<?php
namespace Joesama\Flower\Data\Repositories;

use Joesama\Flower\Data\Model\Flow;
use Joesama\Flower\Data\Model\Step;
use Joesama\Flower\Http\Processor\StepsManager;

/**
 * Data API for flower
 *
 * @package joesama/flower
 * @author joharijumali@gmail.com
 **/
class FlowerApi 
{

	/**
	 * Return All Flower Available
	 *
	 * @return void
	 * @author 
	 **/
	public function getFlowers()
	{
		return Flow::all();
	}

	/**
	 * Return All Flower Available
	 *
	 * @return void
	 * @author 
	 **/
	public function getFirstSteps($exclude = [])
	{
		return Step::whereNull('fk_jfs_step')->whereNotIn('id',$exclude)->get();
	}

	/**
	 * Return Flower First Step
	 *
	 * @return void
	 * @author 
	 **/
	public function getFlowFirstStep($flow)
	{
		return Step::where('fk_jf_flow',$flow)->whereNull('fk_jfs_step')->first();
	}


	/**
	 * Get All Steps For Specific Flow 
	 *
	 * @return void
	 * @author 
	 **/
	public function getFlowSteps($flowCode)
	{
		$manager = new StepsManager($flowCode);

		return $manager->registeredStep();

		return Step::where('fk_jf_flow',$flowId)->get();
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function getStepInfo($id)
	{
		return Step::with('flow')->find($id);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function getNextStepId($id)
	{
		return Step::where('fk_jfs_step',$id)->pluck('id');
	}

} // END class FlowerApi 
	
