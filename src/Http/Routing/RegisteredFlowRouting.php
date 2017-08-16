<?php
namespace Joesama\Flower\Http\Routing;

use Illuminate\Http\Request;
use Joesama\Flower\Http\Processor\FlowManager;

/**
 * Manage All Flow Process
 *
 * @package joesama/flower
 * @author joharijumali@gmail.com
 **/
class RegisteredFlowRouting 
{


	function __construct(FlowManager $manager)
	{
		$this->manager = $manager;
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function registeredFlow(Request $request)
	{
		set_meta('title', trans('joesama/flower::menu.list'));

		$flow = $this->manager->registeredFlow();

		return view('joesama/flower::flow/registered',compact('flow'));
	}

	/**
	 * New Flow
	 *
	 * @return void
	 * @author 
	 **/
	public function newFlow(Request $request)
	{
		set_meta('title', trans('joesama/flower::menu.new'));

		$flow = $this->manager->flowInfo($request->segment(4));

		return view('joesama/flower::flow/new',compact('flow'));
	}

	/**
	 * New Flow
	 *
	 * @return void
	 * @author 
	 **/
	public function saveFlowData(Request $request)
	{
		return $this->manager->flowDataInput($request);

	}


} // END class RegisteredFlowRouting 