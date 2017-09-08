<?php
namespace Joesama\Flower\Data\Repositories;

use Joesama\Flower\Data\Model\Flow;

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


} // END class FlowerApi 
	
