<?php
namespace Joesama\Flower\Http\Processor;

use Joesama\Flower\Data\Model\Flow;
use Joesama\Flower\Data\Model\Step;
use DB;

/**
 * Manage All Step
 *
 * @package joesama/flower
 * @author joharijumali@gmail.com
 **/
class StepsManager 
{


	public function __construct($flow)
	{
		$this->flow = Flow::where('jff_code',$flow)->first();
	}

	/**
	 * Listing All Registered Step
	 *
	 * @return void
	 * @author 
	 **/
	public function registeredStep()
	{	

		$steps = collect([]);

		if(!is_null($this->flow)):

		Step::whereNull('fk_jfs_step')
			->where('fk_jf_flow',$this->flow->id)
			->get()->each(function ($item, $key) use($steps){

			$matrix['item'] = $item;
			$matrix['child'] = $this->getChilds($item->id);

			$steps->put($item->jfs_code,$matrix);

		});

		endif;

		return $steps;
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function getChilds($parent)
	{	
		$collect = collect([]);

		$steps = Step::where('fk_jfs_step',$parent)->get();

		$steps->each(function ($item, $key) use($parent,$collect){
			
			$matrix['item'] = $item;
			$matrix['child'] = $this->getChilds($item->id);

			$collect->put($item->jfs_code,$matrix);
		
		});

		return $collect;

	}


	/**
	 * Get Flow Info
	 *
	 * @return void
	 * @author 
	 **/
	public function flowInfo()
	{
		return $this->flow;
	}

	/**
	 * Get Step Info
	 *
	 * @return void
	 * @author 
	 **/
	public function stepInfo($id)
	{
		return Step::find($id);
	}

	/**
	 * Generate Step Code
	 *
	 * @return void
	 * @author 
	 **/
	public function generateCode($id)
	{
		$step = $this->stepInfo($id);

		if(!$step):
			return $this->flow->jff_code . str_pad((Step::where('fk_jf_flow',$this->flow->id)->count() + 1) , 4 , 0 , STR_PAD_LEFT);
		endif;

		return $step->jfs_code;
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function stepDataInput($input)
	{
		DB::beginTransaction();

		$id = $input->get('id',FALSE);

        try{

        	$model = (is_numeric($id)) ? Step::find($id) : new Step ;
        	$model->fk_jf_flow = $this->flow->id;
        	if($input->get('current',FALSE)):
        	$model->fk_jfs_step = $input->get('current');
        	endif;
        	$model->jfs_code = $input->get('code');
        	$model->jfs_name = ucwords($input->get('next'));
        	$model->state = $input->get('state');
        	$model->save();

        }catch(Exception $e){

            DB::rollback();
            dd($e->getMessage());
        }

        DB::commit();
        	
	}

	/**
	 * Remove Steps
	 *
	 **/
	public function stepDataRemove($id)
	{
		DB::beginTransaction();

		$step = Step::find($id);

        try{

        	$this->stepChildRemove($step->id);
			$step->delete();

        }catch(Exception $e){

            DB::rollback();
            dd($e->getMessage());
        }

        DB::commit();
        	
	}

	/**
	 * Remove Child Related
	 *
	 **/
	public function stepChildRemove($id)
	{
		DB::beginTransaction();

        try{

		$steps = Step::where('fk_jfs_step',$id)->get();

		$steps->each(function ($item, $key) {
				
			$this->stepChildRemove($item->id);
			$item->delete();
		
		});


        }catch(Exception $e){

            DB::rollback();
            dd($e->getMessage());
        }

        DB::commit();
        	
	}




} // END class StepsManager 

