<?php
namespace Joesama\Flower\Http\Processor;

use Joesama\Flower\Data\Model\Flow;
use DB;

/**
 * Manage All Flow Transactions
 *
 * @package joesama/flower
 * @author joharijumali@gmail.com
 **/
class FlowManager 
{

	/**
	 * Listing All Registered Flow
	 *
	 * @return void
	 * @author 
	 **/
	public function registeredFlow()
	{
		return Flow::all();
	}
	/**
	 * Get Flow Info
	 *
	 * @return void
	 * @author 
	 **/
	public function flowInfo($id)
	{
		return Flow::find($id);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function flowDataInput($input)
	{
		DB::beginTransaction();

		$id = $input->get('id',FALSE);

        try{

        	$model = ($id) ? Flow::find($id) : new Flow ;
        	$model->jff_name = $input->get('name');
        	$model->jff_code = $input->get('code');
        	$model->jff_desc = $input->get('desc');
        	$model->save();

        }catch(Exception $e){

            DB::rollback();
            dd($e->getMessage());
        }

        DB::commit();

        return redirect_with_message(
                handles('joesama/flower::admin/flower/registered'),
                trans('threef/entree::respond.data.success', [ 'form' => trans('joesama/flower::menu.new') ]),
                'success');
        	
	}

} // END class FlowManager 

