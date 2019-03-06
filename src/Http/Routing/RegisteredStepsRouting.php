<?php
namespace Joesama\Flower\Http\Routing;

use Illuminate\Http\Request;
use Joesama\Flower\Http\Processor\StepsManager;

/**
 * Manage All Flow Process
 *
 * @package joesama/flower
 * @author joharijumali@gmail.com
 **/
class RegisteredStepsRouting 
{


	public function __construct()
	{
		$this->manager = new StepsManager(request()->segment(4));
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function registeredStep(Request $request)
	{
		$flow = $this->manager->flowInfo();

		set_meta('title', trans('joesama/flower::menu.list') .' : '. $flow->jff_name .' (' . $flow->jff_code . ')');

		$steps = $this->manager->registeredStep($request);

		$exist = count($steps); 

		return view('joesama/flower::step.registered',compact('steps','exist','flow'));
	}

	/**
	 * New Step
	 *
	 * @return void
	 * @author 
	 **/
	public function newStep(Request $request)
	{
		set_meta('title', trans('joesama/flower::menu.new'));

		$step = $this->manager->stepInfo($request->segment(5));
		$parent = $this->manager->stepInfo($request->segment(6));
		$code = $this->manager->generateCode($request->segment(5));

		return view('joesama/flower::step.form',compact('step','code','parent'));
	}

	/**
	 * New Flow
	 *
	 * @return void
	 * @author 
	 **/
	public function saveStep(Request $request)
	{
		$this->manager->stepDataInput($request);

        return redirect_with_message(
                handles('joesama/flower::admin/flower/' . $request->segment(3) .'/'. $request->segment(4) ),
                trans('threef/entree::respond.data.success', [ 'form' => trans('joesama/flower::menu.list') ]),
                'success');

	}

	/**
	 * New Flow
	 *
	 * @return void
	 * @author 
	 **/
	public function deleteStep($code,$id,Request $request)
	{
		$this->manager->stepDataRemove($id);

        return redirect_with_message(
                handles('joesama/flower::admin/flower/' . $request->segment(3) .'/'. $request->segment(4) ),
                trans('threef/entree::respond.data.success', [ 'form' => trans('joesama/flower::menu.list') ]),
                'success');

	}


} // END class RegisteredFlowRouting 